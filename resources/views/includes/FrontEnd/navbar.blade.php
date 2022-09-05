<!-- Start Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <div class="container">
        {{-- logo & Home Page --}}
        <a class="navbar-brand d-flex justify-content-between align-items-center order-lg-0" href="{{ url('/home') }}">
            <img src="{{ URL::asset('FrontEnd/images/online-shopping.png') }}" alt="Logo-Shopping">
            <span class="text-uppercase ml-1 font-weight-lighter">{{trans('main_trans.ELECTRONICS')}}</span>
        </a>

        {{-- language --}}
        <div class="order-lg-1"> {{-- col-md-3 ml-auto --}}
            {{-- /**** Start Package Mcamara ****/ --}}
            <div class="btn-group m-1">
                <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if (App::getLocale() == 'ar')
                    {{ LaravelLocalization::getCurrentLocaleName() }}
                    <img src="{{ URL::asset('BackEnd/images/flags/EG.png') }}" alt="EG">
                    @else
                    {{ LaravelLocalization::getCurrentLocaleName() }}
                    <img src="{{ URL::asset('BackEnd/images/flags/US.png') }}" alt="US">
                    @endif
                </button>
                <div class="dropdown-menu">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                    @endforeach
                </div>
            </div>
            {{-- /**** End Package Mcamara ****/ --}}
        </div>

        {{-- Menu --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-lg-2" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ trans('home_trans.Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ trans('home_trans.Register') }}</a>
                        </li>
                    @endif
                @else
            </ul>

            {{-- Icons --}}
            <ul class="navbar-nav ml-auto lg-auto text-center order-lg-3 nav-btns">
                <li class="nav-item">
                    {{-- Icon Shopping --}}
                    <button type="button" class="btn position-relative mr-2">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <span class="position-absolute top-0 badge text-white bg-danger">5</span>
                    </button>

                    {{-- Icon heart --}}
                    <button type="button" class="btn position-relative mr-2">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                        <span class="position-absolute top-0 badge text-white bg-danger">2</span>
                    </button>

                    {{-- Icon search --}}
                    <button type="button" class="btn position-relative mr-2">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>

                    {{-- Full Screen --}}
                    <button type="button" class="btn position-relative">
                        <i id="btnFullscreen" class="ti-fullscreen" aria-hidden="true"></i>
                        {{-- <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a> --}}
                    </button>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav mr-auto lg-auto text-center">

                <!-- Links -->
                <li class="nav-item px-2 py-2">
                    <a class="nav-link text-uppercase" href="{{ url('/home') }}">{{ trans('home_trans.Home') }}</a>
                </li>

                <li class="nav-item px-2 py-2">
                    <a class="nav-link text-uppercase" href="{{ url('viewProducts') }}">{{ trans('products_trans.Products') }}</a>
                </li>

                    <li class="nav-item dropdown px-2 py-2 border-0">

                        <a id="navbarDropdown" class="nav-link text-uppercase dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->username }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdown">

                            {{-- I will make a condition if the user makes a login that hides the Dashboard (controlpanel) from the navbar --}}
                            @if (Auth::user()->role === "admin")
                                <a class="dropdown-item text-uppercase" href="{{ route('dashboard') }}">
                                    {{trans('main_trans.Dashboard')}}
                                </a>
                            @elseif (Auth::user()->role === "moderator")
                                <a class="dropdown-item" href="{{ route('dashboard') }}">
                                    {{trans('main_trans.Dashboard')}}
                                </a>
                            @endif

                            <a class="dropdown-item border-0 text-uppercase" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{trans('home_trans.logout')}}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>


    </div>
</nav>
<!-- End of Navbar -->
