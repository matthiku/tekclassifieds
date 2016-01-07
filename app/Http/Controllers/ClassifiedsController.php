<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\StoreClassifiedRequest;
use App\Http\Requests\UpdateClassifiedRequest;

use App\Http\Controllers\Controller;

use App\Commands\StoreClassifiedCommand;
use App\Commands\UpdateClassifiedCommand;

use App\Classified;
use App\Category;

use Auth;


class ClassifiedsController extends Controller
{


    public function __construct() {
        $this->middleware('auth');
        $this->middleware('auth', ['except' => ['index','show','search']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $classifieds = Classified::all();

        return view('index', compact('classifieds'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // get list of categories
        $categories = Category::all();
        $catList = [];
        foreach ($categories as $cat) {
            $catList[$cat->id] = $cat->name;
        }
        // create list of valid conditions
        $condList = [];
        $condList['Old']      = 'Old';
        $condList['New']      = 'New';
        $condList['Like New'] = 'Like New';
        $condList['Used']     = 'Bad';
        $condList['Broken']   = 'Broken';

        return view('create', compact('catList', 'condList'));
    }




    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClassifiedRequest $request)
    {
        // get all fields from the request
        $title       = $request->input('title');
        $category_id = $request->input('category_id');
        $description = $request->input('description');
        $price       = $request->input('price');
        $condition   = $request->input('condition');
        $main_image  = $request->file('main_image');
        $location    = $request->input('location');
        $email       = $request->input('email');
        $phone       = $request->input('phone');
        $owner_id    = Auth::user()->id;

        // get the real filename and move the file to it's destiny
        if($main_image) {
            $main_image_filename = $main_image->getClientOriginalName();
            $main_image->move( public_path('images'), $main_image_filename );
        } else {
            $main_image_filename = 'noimage.jpg';
        }

        // create the new record in the table
        $command = new StoreClassifiedCommand($title, $category_id, $description, $price, $condition, $main_image_filename, $location, $email, $phone, $owner_id);
        $this->dispatch($command);

        return redirect('classifieds')
            ->with('status', 'New listing created.');
    }










    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get this item
        $ad = Classified::find($id);
        return view('show', compact('ad'));
    }






    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get this item
        $ad = Classified::find($id);

        // get list of categories
        $categories = Category::all();
        $catList = [];
        foreach ($categories as $cat) {
            $catList[$cat->id] = $cat->name;
        }
        // create list of valid conditions
        $condList = [];
        $condList['Old']      = 'Old';
        $condList['New']      = 'New';
        $condList['Like New'] = 'Like New';
        $condList['Used']     = 'Bad';
        $condList['Broken']   = 'Broken';

        return view('edit', compact('ad','catList', 'condList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClassifiedRequest $request, $id)
    {
        // get all fields from the request
        $title       = $request->input('title');
        $category_id = $request->input('category_id');
        $description = $request->input('description');
        $price       = $request->input('price');
        $condition   = $request->input('condition');
        $main_image  = $request->file('main_image');
        $location    = $request->input('location');
        $email       = $request->input('email');
        $phone       = $request->input('phone');

        // get current filename
        $current_image_filename = Classified::find($id)->main_image;
        // get the real filename and move the file to it's destiny
        if($main_image) {
            $main_image_filename = $main_image->getClientOriginalName();
            $main_image->move( public_path('images'), $main_image_filename );
        } else {
            $main_image_filename = $current_image_filename;
        }

        // create the new record in the table
        $command = new UpdateClassifiedCommand($id, $title, $category_id, $description, $price, $condition, $main_image_filename, $location, $email, $phone);
        $this->dispatch($command);

        return redirect('classifieds')
            ->with('status', 'Listing updated.');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
