{{-- Extend file from lyaouts->app.blade.php --}}
@extends('layouts.app')

{{-- Title the page name --}}
@section('title' , 'Product Details')

{{-- Write here my content --}}
@section('content')

<!-- -----------------------------------------
---------- Start Product Details -------------
------------------------------------------ -->
<div class="container mt-5" style="padding-top: 40px;">
    <div class="row">
        <!-- carousel -->
        <div class="col-md-6">
            <div class="carouselShowProduct">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/products/' . $products->image) }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/products/MultiImages/' . $products->sub_image) }}" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <!-- Start paragraph -->
        <div class="col-md-5 m-1">

            <!-- Title -->
            <div class="row mt-4">
                <h5 class="card-title">
                    @if (app()->getLocale() == "en")
                        {{$products->name_en}}
                    @else
                        {{$products->name_ar}}
                    @endif
                </h5>
            </div>

            <!-- Old price -->
            <div class="row py-2">
                <h5 class="font-weight-bold text-capitalize text-dark my-1">{{ trans('home_trans.Old-Price') }}</h5> &nbsp; &nbsp;
                <h5 class="text-danger font-italic"><del>{{$products->old_price}}</del></h5>
            </div>

            <!-- New price -->
            <div class="row py-2">
                <h5 class="font-weight-bold text-capitalize text-dark my-1">{{ trans('home_trans.New-Price') }}</h5> &nbsp; &nbsp;
                <h5 class="text-primary">{{$products->current_price}}</h5>
            </div>

            <!-- description -->
            <div class="row py-2">
                <h5 class="font-weight-bold text-capitalize text-dark my-1">{{ trans('home_trans.About-Item') }}</h5>
                <p class="font-weight-normal">
                    @if (app()->getLocale() == "en")
                        {{$products->description_en}}
                    @else
                        {{$products->description_ar}}
                    @endif
                </p>
            </div>

            <!-- button -->
            <div class="row py-4">
                <button type="button" class="btn btn-warning">{{ trans('home_trans.Add-To-Cart') }}</button>
            </div>
        </div>
    </div>
</div>
<!-- End Show Products -->

<!-- Start Comments -->
{{-- <div class="container mt-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-8">
            <div class="d-flex flex-column comment-section">
                @foreach ( $commentProduct as $comment)
                <div class="bg-white p-2">
                    <div class="d-flex flex-row user-info">
                        <img class="rounded-circle" src="{{ asset('images/users/' . $comment->user->avatar) }}" alt="avatar" width="40">
                        <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name">{{$comment->user->username}}</span></div>
                    </div>
                    <div class="mt-2">
                        <p class="comment-text">{{$comment->comment}}</p>
                    </div>
                </div>
                @endforeach
                <span class="border-bottom border border-info"></span>
                <!-- Add Comments -->
                {{-- <form action="" method="post">
                    @csrf
                    <div class="bg-info p-2 text-dark bg-opacity-50 p-2">
                        <div class="d-flex flex-row align-items-start">
                            <img class="rounded-circle" src="{{ asset('images/users/' . Auth::user()->avatar) }}" alt="avatar" width="40">
                            <textarea class="form-control ml-1 shadow-none textarea"></textarea></div>
                        <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none" type="button">Post comment</button><button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="button">Cancel</button></div>
                    </div>
                </form> --}
            </div>
        </div>
    </div>
</div> --}}


@endsection
@section('js')

@endsection
