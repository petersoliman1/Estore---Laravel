{{-- Extend file from lyaouts->app.blade.php --}}
@extends('layouts.app')

{{-- Title the page name --}}
@section('title' , 'Product Page')

{{-- Write here my content --}}
@section('content')

<!-- -----------------------------------------
-------------- Start products ----------------
------------------------------------------ -->
<section id="products">
    <div class="container">
        {{-- Start Title Section --}}
        <div class="title text-center">
            <h2 class="position-relative d-inline-block">{{ trans('products_trans.Products') }}</h2>
        </div>

        {{-- Start Button Section categories --}}
        <div class="row row1 g-0">
            <div class="d-flex flex-wrap justify-content-center mt-5">
                <button type="button" class="btn m-2 text-dark active-filter-btn">{{ trans('home_trans.All') }}</button>
                @foreach ( $category as $category)
                <a href="{{route('viewCategories.show' , $category->id)}}">
                    <button type="button" class="btn m-2 text-dark" value="{{$category->id}}">{{$category->title}}</button>
                </a>
                {{-- <button type="button" class="btn m-2 text-dark">{{ trans('home_trans.camera') }}</button>
                <button type="button" class="btn m-2 text-dark">{{ trans('home_trans.Computers') }}</button>
                <button type="button" class="btn m-2 text-dark">{{ trans('home_trans.Mobile') }}</button>
                <button type="button" class="btn m-2 text-dark">{{ trans('home_trans.Tablet') }}</button> --}}
                @endforeach
            </div>

            {{-- Start Section card --}}
            <div class="categories-list mt-4 row gx-0 gy-3">
                @foreach ( $products as $product)
                <div class="col-md-6 col-lg-4 col-xl-3 p-2 mb-3">
                    <a href="{{route('viewProducts.show' , $product->id)}}">
                        <div class="Products-img">
                            <img src="{{ asset('images/products/' . $product->image) }}" class="card-img-top" alt="Products">
                            <span class="position-absolute Sale text-white d-flex align-items-center justify-content-center">Sale</span>
                        </div>
                        <div class="text-center">
                            <div class="rating mt-3">
                                <span class="star"><i class="fa fa-star"></i></span>
                                <span class="star"><i class="fa fa-star"></i></span>
                                <span class="star"><i class="fa fa-star"></i></span>
                                <span class="star"><i class="fa fa-star"></i></span>
                                <span class="star"><i class="fa fa-star"></i></span>
                            </div>
                            <p class="font-weight-bold text-capitalize text-dark my-1">{{$product->name}}</p>
                        </div>
                    </a>
                </div>

                @endforeach

            </div>
        </div>
    </div>
</section>

<!-- -----------------------------------------
-------------- End products ----------------
------------------------------------------ -->
@endsection
@section('js')

@endsection
