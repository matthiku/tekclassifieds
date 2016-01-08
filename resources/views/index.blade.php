@extends('layouts.main')


@section('title', 'Home')



@section('content')
    <div class="card text-xs-center">
        @if( isset($category) )
            <h3 class="card-header">{{ $category }} Listings</h3>
        @else
            <h3 class="card-header">All Listings</h3>
        @endif

        <div class="card-block">

            <div class="card-text">
                <div class="row">
                @foreach($classifieds as $ad)
                    <div class="col-md-4 offer">
                        <img src="/images/{{$ad->main_image}}">
                        <h5><a href="/classifieds/{{ $ad->id }}">{{ $ad->title }}</a></h5>
                        <h6>€ {{ $ad->price }}</h6>
                        <p class="desc">{{ $ad->description }}</p>  
                        <a href="#" class="btn btn-primary">Add</a>
                    </div>
                @endforeach
                </div>
            </div>

        </div>

    </div>
@stop
