@extends('layouts.main')


@section('title', 'Show Listings')



@section('content')

    <div class="card">
        <h3 class="card-header">{{ $ad->title }}</h3>

        <div class="card-block">
            <h4 class="card-title">{{ $ad->category->name }}</h4>

            <div class="card-text">
                <div class="row">
                    <div class="col-md-4">
                        <img src="/images/{{$ad->main_image}}.jpg">
                        <a href="#" class="btn btn-primary">Add</a>
                    </div>
                    <div class="col-md-8">
                        <h4>Item Description</h4>
                        <p>{{ $ad->description }}</p>  

                        <h4>Item Details</h4>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>Condition: </strong>{{ $ad->condition }}
                            </li>
                            <li class="list-group-item">
                                <strong>Price: </strong>{{ $ad->price }}
                            </li>
                        </ul>

                        <h4>Seller Details</h4>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>Location: </strong>{{ $ad->location }}
                            </li>
                            <li class="list-group-item">
                                <strong>Email: </strong>{{ $ad->email }}
                            </li>
                            <li class="list-group-item">
                                <strong>Phone: </strong>{{ $ad->phone }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>    
    
@stop
