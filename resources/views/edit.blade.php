@extends('layouts.main')


@section('title', 'Edit Listing')



@section('content')

    <div class="card">
      <div class="card-header">
        <h3>Edit a Listing</h3>
      </div>
      <div class="card-block">
            {!! Form::model($classified, array('route' => array('classifieds.store', $classified->id))) !!}
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', $classified->title) !!}
                {!! Form::label('email', 'E-Mail Address') !!}
                {!! Form::text('email', $classified->email) !!}
            {!! Form::close() !!}
      </div>
    </div>
    
@stop
