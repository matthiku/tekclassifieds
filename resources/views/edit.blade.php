@extends('layouts.main')


@section('title', 'Edit Listing')



@section('content')

  @if(Session::has('errors'))
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  @endif

  <div class="card">


    <div class="card-header">
      <h3>Edit a listing</h3>
    </div>


    <div class="card-block">

      {!! Form::open( array('method' => 'PATCH', 'url' => 'classifieds/'.$ad->id, 'files' => 'true') ) !!}

        <div class="row">

          <div class="col-md-6">

            <h5>Product Details</h5>

            <div class="row form-group">
              <div class="col-md-2">
                {!! Form::label( 'title', 'Title' ) !!} </div>
              <div class="col-md-10">
                {!! Form::text(  'title', $ad->title, array('required' => 'YES', 'class' => 'form-control') ) !!} </div>
            </div>
          
            <div class="row form-group">
              <div class="col-md-2">
                {!! Form::label( 'condition', 'Condition' ) !!} </div>
              <div class="col-md-10">
                {!! Form::select(  'condition', $condList, $ad->condition, array('required' => 'YES', 'class' => 'form-control') ) !!} </div>
            </div>
          
            <div class="row form-group">
              <div class="col-md-2">
                {!! Form::label( 'price', 'Price' ) !!} </div>
              <div class="col-md-4">
                {!! Form::number('price', $ad->price, ['step'=>"0.01", 'min'=>"0.05", 'class'=>"form-control", 'required' => 'YES'] ) !!} </div>
              <div class="col-md-2">
                {!! Form::label( 'category_id', 'Category' ) !!} </div>
              <div class="col-md-4">
                {!! Form::select('category_id', $catList, $ad->category_id, ['required' => 'YES', 'class' => 'form-control'] ) !!} </div>
            </div>

            <h5>Seller Contact Info</h5>

            <div class="row form-group">
              <div class="col-md-2">
                {!! Form::label( 'email', 'E-Mail' ) !!} </div>
              <div class="col-md-10">
                {!! Form::text(  'email', $ad->email, array('required' => 'YES', 'class' => 'form-control') ) !!} </div>
            </div>
          
            <div class="row form-group">
              <div class="col-md-2">
                {!! Form::label( 'location', 'Location' ) !!} </div>
              <div class="col-md-10">
                {!! Form::text(  'location', $ad->location, array('required' => 'YES', 'class' => 'form-control') ) !!} </div>
            </div>

            <div class="row form-group">
              <div class="col-md-2">
                {!! Form::label( 'phone', 'Phone' ) !!} </div>
              <div class="col-md-10">
                {!! Form::text(  'phone', $ad->phone, array('required' => 'YES', 'class' => 'form-control') ) !!} </div>
            </div>

          </div>

          <div class="col-md-6">
            <img src="/images/{{ $ad->main_image }}">
            <div class="form-group">
              {!! Form::label( 'main_image', 'Change the image', ['class'=>'file'] ) !!}
              {!! Form::file('main_image', null, array('required' => 'YES', 'class' => 'btn btn-default') ) !!}
            </div>
          </div>

        </div>

        <div class="row">
          <div class="form-group">
            {!! Form::label( 'description', 'Description' ) !!}
            {!! Form::textarea('description', $ad->description, array('required' => 'YES', 'class' => 'form-control', 'rows' => '4') ) !!}
          </div>

          {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
          <a class="btn btn-secondary-outline" href="/classifieds">Cancel</a>
        </div>

      {!! Form::close() !!}

    </div><!-- card-block -->
  </div><!-- card -->
    
@stop
