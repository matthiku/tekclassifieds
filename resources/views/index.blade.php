@extends('layouts.main')


@section('title', 'Home')



@section('content')
    <div class="card text-xs-center">
        <h3 class="card-header">Latest Listings</h3>

        <div class="card-block">
            <h4 class="card-title">Special Offers</h4>

            <div class="card-text">
                <div class="row">
                @foreach($classifieds as $ad)
                    <div class="col-md-4 offer">
                        <img src="/images/{{$ad->main_image}}.jpg">
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
