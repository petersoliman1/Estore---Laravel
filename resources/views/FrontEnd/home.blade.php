{{-- Extend file from lyaouts->app.blade.php --}}
@extends('layouts.app')

{{-- Title the page name --}}
@section('title' , 'E-store for Electronics')

{{-- Write here my content --}}
@section('content')

<!-- --------------------------------------------------
------------- Start Header and carousel ---------------
--------------------------------------------------- -->
<header id="header" class="vh-100 carousel slide" data-ride="carousel" style="padding-top: 104px;">
    <div class="container h-100 d-flex align-items-center carousel-inner">
        {{-- Start Carousel words --}}
        {{-- Start Carousel Slid one --}}
        <div class="text-center carousel-item active">
            <h2 class="text-captialize text-white">{{ trans('home_trans.Header-1') }}</h2>
            <h1 class="text-uppercase py-2 fw-bold text-white">{{ trans('home_trans.Text-1') }}</h1>
            <a href="#" class="btn mt-3 text-uppercase">{{ trans('home_trans.Button-1') }}</a>
        </div>

        {{-- Start Carousel Slide two --}}
        <div class="text-center carousel-item">
            <h2 class="text-captialize text-white">{{ trans('home_trans.Header-2') }}</h2>
            <h1 class="text-uppercase py-2 fw-bold text-white">{{ trans('home_trans.Text-2') }}</h1>
            <a href="#" class="btn mt-3 text-uppercase">{{ trans('home_trans.Button-2') }}</a>
        </div>
        {{-- End Carousel words --}}
    </div>

    {{-- button carousel control next & prev --}}
    <button class="carousel-control-prev" type="button" data-target="#header" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#header" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </button>
</header>
{{-- End Header and carousel --}}



<!-- -----------------------------------------
------------- Start Categories ---------------
------------------------------------------ -->
<section id="categories" class="py-5">
    <div class="container">
        {{-- Start Title Section --}}
        <div class="title text-center">
            <h2 class="position-relative d-inline-block">{{ trans('home_trans.Categories') }}</h2>
        </div>

        {{-- Start Button Section categories --}}
        <div class="row row1 g-0">
            <div class="d-flex flex-wrap justify-content-center mt-5">
                <button type="button" class="btn m-2 text-dark active-filter-btn">{{ trans('home_trans.All') }}</button>
                @foreach ( $categories as $category)
                <a href="{{route('viewCategories.show' , $category->id)}}">
                    <button type="button" class="btn m-2 text-dark" value="{{$category->id}}">{{$category->title}}</button>
                </a>
                @endforeach
            </div>

            {{-- Start Section card --}}
            <div class="categories-list mt-4 row gx-0 gy-3">
                @foreach ( $categories as $category)
                <div class="col-md-6 col-lg-4 col-xl-3 p-2 mb-3">
                    <a href="{{route('viewCategories.show' , $category->id)}}">
                        <div class="categories-img">
                            <img src="{{ asset('images/categories/' . $category->image) }}" class="card-img-top" alt="Categories">
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
                            <p class="font-weight-bold text-capitalize text-dark my-1">{{$category->title}}</p>
                            <span class="overflow-auto text-dark">{{$category->description}}</span>
                        </div>
                    </a>
                </div>

                @endforeach

            </div>
        </div>
    </div>
</section>
{{-- End Categories --}}




<!-- -----------------------------------------------
------------- Start Carousel Product ---------------
------------------------------------------------ -->
<div id="carouselExampleControls" class="carousel slide py-5" data-ride="carousel">
    <div class="carousel-inner">
        <!-- Slider 1 -->
        <div class="carousel-item active">
            <div class="row">
                <div class="col-3">
                    <img src="{{ URL::asset('FrontEnd/images/carousel/01.png') }}" class="d-block w-100" alt="carousel-Products ">
                </div>

                <div class="col-3">
                    <img src="{{ URL::asset('FrontEnd/images/carousel/02.png') }}" class="d-block w-100" alt="carousel-Products ">
                </div>

                <div class="col-3">
                    <img src="{{ URL::asset('FrontEnd/images/carousel/03.png') }}" class="d-block w-100" alt="carousel-Products ">
                </div>

                <div class="col-3">
                    <img src="{{ URL::asset('FrontEnd/images/carousel/04.png') }}" class="d-block w-100" alt="carousel-Products ">
                </div>
            </div>
        </div>
        <!-- Slider 2 -->
        <div class="carousel-item">
            <div class="row">
                <div class="col-3">
                    <img src="{{ URL::asset('FrontEnd/images/carousel/05.png') }}" class="d-block w-100" alt="carousel-Products ">
                </div>

                <div class="col-3">
                    <img src="{{ URL::asset('FrontEnd/images/carousel/06.png') }}" class="d-block w-100" alt="carousel-Products ">
                </div>

                <div class="col-3">
                    <img src="{{ URL::asset('FrontEnd/images/carousel/07.png') }}" class="d-block w-100" alt="carousel-Products ">
                </div>
                <div class="col-3">
                    <img src="{{ URL::asset('FrontEnd/images/carousel/08.png') }}" class="d-block w-100" alt="carousel-Products ">
                </div>
            </div>
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
{{-- End of Carousel Product --}}



<!-- -----------------------------------------------
------------------ Start Bloger --------------------
------------------------------------------------ -->
<div class="container py-5">
    <div class="row row-head mt-5">
        <!-- Text -->
        <div class="col-md-6">
            <h1 class="text-warning font-weight-bold">{{ trans('home_trans.Text-Bloger') }}</h1>
            <p class="mt-3 text-dark lead">{{ trans('home_trans.Par-Bloger') }}</p>
            <a href="" class="btn btn-warning mt-2 mb-2">{{ trans('home_trans.btn-Bloger') }} &#x2794;</a>
        </div>
        <!-- Photo -->
        <div class="col-md-5 m-2">
            <img src="{{ URL::asset('FrontEnd/images/Laptop.png') }}" class="img-fluid" alt="Laptop">
        </div>
    </div>
</div>
{{-- End of Bloger --}}



<!-- -----------------------------------------
---------------- Start offers -----------------
------------------------------------------ -->
<section id="offers" class="py-5">
    <div class="container">
        <div class="row d-flex align-items-center text-center justify-content-center justify-content-lg-start">
            <div class="offers-content">
                <span class="text-white">{{ trans('home_trans.offers-span') }}</span>
                <h2 class="mt-2 mb-4 text-white">{{ trans('home_trans.offers-Heding') }}</h2>
                <a href="#" class="btn">{{ trans('home_trans.offers-btn') }}</a>
            </div>
        </div>
    </div>
</section>
{{-- End of offers --}}



<!-- ---------------------------------------------
------------- Start Section Photos ---------------
---------------------------------------------- -->
<div class="container py-5">
    <div class="small-container">
        <div class="row">
            <div class="col-md-4 col-ms-12">
                <img src="{{ URL::asset('FrontEnd/images/Section Photos-1.jpeg') }}" class="img-fluid" alt="Laptop">
            </div>
            <div class="col-md-4 col-ms-12">
                <img src="{{ URL::asset('FrontEnd/images/Section Photos-2.jpeg') }}" class="img-fluid" alt="Laptop">
            </div>
            <div class="col-md-4 col-ms-12">
                <img src="{{ URL::asset('FrontEnd/images/Section Photos-3.jpeg') }}" class="img-fluid" alt="Laptop">
            </div>
        </div>
    </div>
</div>
{{-- End of Section Photos --}}






























<!-- -----------------------------------------------
------------- Start Header and photo ---------------
------------------------------------------------ -->
{{-- <div class="container">

    <div class="row row-head mt-5">
        <!-- Text -->
        <div class="col-md-6">
            <h1 class="text-warning font-weight-bold">{{ trans('home_trans.Text-Header') }}</h1>
            <p class="mt-3 text-dark lead">{{ trans('home_trans.Par-Header') }}</p>
            <a href="" class="btn btn-warning mt-2 mb-2">{{ trans('home_trans.btn-Header') }} &#x2794;</a>
        </div>
        <!-- Photo -->
        <div class="col-md-5 m-2">
            <img src="{{ URL::asset('FrontEnd/images/Laptop.png') }}" class="img-fluid" alt="Laptop">
        </div>
    </div>
</div> --}}




{{-- <div class="container mt-5">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <!-- Slider 1 -->
            <div class="carousel-item active">
                <div class="row">
                    <div class="col-3">
                        <img src="{{ URL::asset('FrontEnd/images/carousel/01.png') }}" class="d-block w-100" alt="carousel-Products ">
                    </div>

                    <div class="col-3">
                        <img src="{{ URL::asset('FrontEnd/images/carousel/02.png') }}" class="d-block w-100" alt="carousel-Products ">
                    </div>

                    <div class="col-3">
                        <img src="{{ URL::asset('FrontEnd/images/carousel/03.png') }}" class="d-block w-100" alt="carousel-Products ">
                    </div>

                    <div class="col-3">
                        <img src="{{ URL::asset('FrontEnd/images/carousel/04.png') }}" class="d-block w-100" alt="carousel-Products ">
                    </div>
                </div>
            </div>
            <!-- Slider 2 -->
            <div class="carousel-item">
                <div class="row">
                    <div class="col-3">
                        <img src="{{ URL::asset('FrontEnd/images/carousel/05.png') }}" class="d-block w-100" alt="carousel-Products ">
                    </div>

                    <div class="col-3">
                        <img src="{{ URL::asset('FrontEnd/images/carousel/06.png') }}" class="d-block w-100" alt="carousel-Products ">
                    </div>

                    <div class="col-3">
                        <img src="{{ URL::asset('FrontEnd/images/carousel/07.png') }}" class="d-block w-100" alt="carousel-Products ">
                    </div>
                    <div class="col-3">
                        <img src="{{ URL::asset('FrontEnd/images/carousel/08.png') }}" class="d-block w-100" alt="carousel-Products ">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}























@endsection
