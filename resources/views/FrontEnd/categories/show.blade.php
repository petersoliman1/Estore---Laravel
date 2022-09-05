{{-- Extend file from lyaouts->app.blade.php --}}
@extends('layouts.app')

{{-- Title the page name --}}
@section('title' , 'Category Show')

{{-- Write here my content --}}
@section('content')


<!-- ------------------------------------------------------------
-------------- Start Show Categories in Products ----------------
------------------------------------------------------------- -->
<section id="products">
    <div class="container">
        {{-- Start Title Section --}}
        <div class="title text-center">
            <h2 class="position-relative d-inline-block">
                @if (app()->getLocale() == "en")
                {{$category->title_en}}
                @else
                {{$category->title_ar}}
                @endif
            </h2>
        </div>

        <div class="row row1 g-0">

            {{-- Start Section card --}}
            <div class="categories-list mt-4 row gx-0 gy-3">
                @foreach ( $categoryProducts as $product)
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
                            <p class="font-weight-bold text-capitalize text-dark my-1">
                                @if (app()->getLocale() == "en")
                                    {{$product->name_en}}
                                @else
                                    {{$product->name_ar}}
                                @endif"
                            </p>
                        </div>
                    </a>
                </div>

                @endforeach

            </div>
        </div>
    </div>
</section>
<!-- ----------------------------------------------------------
-------------- End Show Categories in Products ----------------
----------------------------------------------------------- -->

@endsection
@section('js')

@endsection
