@extends('layouts.app')

@section('content')

<!------------------------------
------ Start Login Form --------
-------------------------------->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-Transparent">
                <div class="card-header">
                    <img src="{{ URL::asset('FrontEnd/images/avatar.svg') }}" alt="Avatar" class="avatar">
                    <h6 class="d-none d-sm-block mt-3">{{ trans('logRes_trans.Heading') }}</h6>
                    <p class="d-sm-none .d-xl-block text-white mt-2">{{ trans('logRes_trans.Heading') }}</p>
                </div>

                <div class="card-body">
                    <form method="POST" class="animate" action="{{ route('login') }}">
                        @csrf

                        {{-- Email --}}
                        <div class="input-div one">
                            <div class="icon-form">
                                <i class="fa fa-at"></i>
                            </div>
                            <div class="div">
                                <h5>{{ trans('logRes_trans.EMailAddress') }}</h5>
                                <input id="email" type="email" placeholder="{{ trans('logRes_trans.placeholderEmail') }}" class="form-control input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}


                        {{-- Password --}}
                        <div class="input-div pass">
                            <div class="icon-form">
                                <i class="fa fa-lock"></i>
                            </div>
                            <div class="div">
                                <h5>{{ trans('logRes_trans.Password') }}</h5>
                                <input type="password" class="form-control input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ trans('logRes_trans.placeholderPassword') }}" id="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        {{-- <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" >

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="row RememberForgot my-3 text-light">
                            {{-- Remember Me --}}
                            <div class="col-sm-12 col-md-6 col-lg-3">
                                <div class="form-group form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ trans('logRes_trans.RememberMe') }}
                                    </label>
                                </div>
                            </div>

                            {{-- <div class="form-group mt-3 row Remember">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ trans('logRes_trans.RememberMe') }}
                                        </label>
                                    </div>
                                </div>
                            </div> --}}

                            {{-- btn ForgotPassword --}}
                            <div class="col-sm-12 col-md-6 col-lg-3 ">
                                @if (Route::has('password.request'))
                                    <a class="text-capitalize  ForgotPassword" href="{{ route('password.request') }}">
                                        {{ trans('logRes_trans.ForgotPassword') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        {{-- btn Login --}}
                        <div class="my-3">
                            <button type="submit" class="btn btn-block btn-lg">
                                <i class="fa fa-user pr-2"></i> {{ trans('logRes_trans.Login') }}
                            </button>
                        </div>

                        {{-- btn Login --}}
                        {{-- <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-card">
                                    {{ trans('logRes_trans.Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link ForgotPassword" href="{{ route('password.request') }}">
                                        {{ trans('logRes_trans.ForgotPassword') }}
                                    </a>
                                @endif
                            </div>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Login Form -->
@endsection
