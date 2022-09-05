<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>


    @include('includes.FrontEnd.head')

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}


</head>
<body>
    <div id="app">

        @include('includes.FrontEnd.navbar')




        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @include('includes.FrontEnd.footer')

    @include('includes.FrontEnd.footer-scripts')
</body>
</html>
