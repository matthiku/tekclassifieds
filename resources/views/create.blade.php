@extends('layouts.main')


@section('title', 'Create New Listing')



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
      <h3>Add a new listing</h3>
    </div>


    <div class="card-block">

      {!! Form::open( array('action' => 'ClassifiedsController@store', 'files' => 'true') ) !!}

        <div class="row">

          <div class="col-md-6">

            <h5>Product Details</h5>

            <div class="row form-group">
              <div class="col-md-2">
                {!! Form::label( 'title', 'Title' ) !!} </div>
              <div class="col-md-10">
                {!! Form::text(  'title', null, array('required' => 'YES', 'class' => 'form-control') ) !!} </div>
            </div>
          
            <div class="row form-group">
              <div class="col-md-2">
                {!! Form::label( 'condition', 'Condition' ) !!} </div>
              <div class="col-md-10">
                {!! Form::select(  'condition', $condList, null, array('required' => 'YES', 'class' => 'form-control') ) !!} </div>
            </div>
          
            <div class="row form-group">
              <div class="col-md-2">
                {!! Form::label( 'price', 'Price' ) !!} </div>
              <div class="col-md-4">
                {!! Form::number('price', 0.05, ['step'=>"0.05", 'min'=>"0.05", 'class'=>"form-control", 'required' => 'YES'] ) !!} </div>
              <div class="col-md-2">
                {!! Form::label( 'category_id', 'Category' ) !!} </div>
              <div class="col-md-4">
                {!! Form::select('category_id', $catList, null, ['placeholder' => 'Pick ...', 'required' => 'YES', 'class' => 'form-control'] ) !!} </div>
            </div>

            <h5>Seller Contact Info</h5>

            <div class="row form-group">
              <div class="col-md-2">
                {!! Form::label( 'email', 'E-Mail' ) !!} </div>
              <div class="col-md-10">
                {!! Form::text(  'email', null, array('required' => 'YES', 'class' => 'form-control') ) !!} </div>
            </div>
          
            <div class="row form-group">
              <div class="col-md-2">
                {!! Form::label( 'location', 'Location' ) !!} </div>
              <div class="col-md-10">
                {!! Form::text(  'location', null, array('required' => 'YES', 'class' => 'form-control') ) !!} </div>
            </div>

            <div class="row form-group">
              <div class="col-md-2">
                {!! Form::label( 'phone', 'Phone' ) !!} </div>
              <div class="col-md-10">
                {!! Form::text(  'phone', null, array('required' => 'YES', 'class' => 'form-control') ) !!} </div>
            </div>

          </div>

          <div class="col-md-6">
            <div class="form-group">
              {!! Form::label( 'description', 'Description' ) !!}
              {!! Form::textarea('description', null, array('required' => 'YES', 'class' => 'form-control') ) !!}
            </div>
            <div class="form-group">
              {!! Form::label( 'main_image', 'Upload an image', ['class'=>'file'] ) !!}
              {!! Form::file('main_image', null, array('required' => 'YES', 'class' => 'btn btn-default') ) !!}
            </div>
          </div>

        </div>

        <div class="pull-right">
          {!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
        </div>

      {!! Form::close() !!}

    </div>
  </div><!-- card -->

@stop
