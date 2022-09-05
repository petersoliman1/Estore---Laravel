<!-- Favicon -->
<link rel="shortcut icon" href="{{ URL::asset('BackEnd/images/favicon.ico') }}" type="image/x-icon" />

<!-- Font -->
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">
@yield('css')

<!-- Title -->
<title>@yield('title')</title>

<!--- Style css -->
@if (App::getLocale() == 'en')
    <link href="{{ URL::asset('BackEnd/css/ltr.css') }}" rel="stylesheet">
@else
    <link href="{{ URL::asset('BackEnd/css/rtl.css') }}" rel="stylesheet">
@endif

<!--- My Style css -->
<link href="{{ asset('BackEnd/css/style.css') }}" rel="stylesheet">
