<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Favicon -->
<link rel="shortcut icon" href="{{ URL::asset('FrontEnd/images/online-shopping.png') }}" type="image/x-icon" />

<!-- Font -->
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">
@yield('css')

<!-- Title -->
<title>@yield('title')</title>

<!--- Style B -->
@if (App::getLocale() == 'en')
<link href="{{ URL::asset('FrontEnd/css/ltr.css') }}" rel="stylesheet">
@else
<link href="{{ URL::asset('FrontEnd/css/rtl.css') }}" rel="stylesheet">
@endif

<!-- My Style css -->
<link href="{{ asset('FrontEnd/css/style.css') }}" rel="stylesheet">
