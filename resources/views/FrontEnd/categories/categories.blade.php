{{-- Extend file from lyaouts->app.blade.php --}}
@extends('layouts.app')

{{-- Title the page name --}}
@section('title' , 'Categories Page')

{{-- Write here my content --}}
@section('content')

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>All Categories</h2>
                <div class="row">
                    @foreach ( $categories as $category)
                        <div class="col-md-3 mb-3">
                            <a href="{{route('viewCategories.show' , $category->id)}}">
                                <div class="card text-left">
                                    <img height="200" width="200" class="card-img-top" src="{{ asset('images/categories/' . $category->image) }}" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$category->title}}</h5>
                                        <p class="card-text">{{$category->description}}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')

@endsection
