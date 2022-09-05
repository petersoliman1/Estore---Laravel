@extends('layouts.app')

@section('content')

<!------------------------------
------ Start Register Form --------
-------------------------------->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-Transparent">
                <div class="card-header">
                    <img src="{{ URL::asset('FrontEnd/images/avatar.svg') }}" alt="Avatar" class="avatar">
                    <h6 class="d-none d-sm-block mt-3">{{ trans('logRes_trans.HeadingRes') }}</h6>
                    <p class="d-sm-none .d-xl-block text-white mt-2">{{ trans('logRes_trans.HeadingRes') }}</p>
                </div>

                <div class="card-body">
                    <form method="POST" class="animate" action="{{ route('register') }}">
                        @csrf

                        {{-- Username --}}
                        <div class="input-div one">
                            <div class="icon-form">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="div">
                                <h5>{{ trans('logRes_trans.Username') }}</h5>
                                <input id="username" type="text" placeholder="{{ trans('logRes_trans.placeholderUsername') }}" class="form-control input @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        {{-- Password Confirm --}}
                        <div class="input-div pass">
                            <div class="icon-form">
                                <i class="fa fa-lock"></i>
                            </div>
                            <div class="div">
                                <h5>{{ trans('logRes_trans.ConfirmPassword') }}</h5>
                                <input type="password" class="form-control input" name="password_confirmation" required autocomplete="new-password" placeholder="{{ trans('logRes_trans.placeholderConPassword') }}" id="password-confirm">
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> --}}

                        {{-- btn Login --}}
                        <div class="form-group mt-3 mb-0">
                            <button type="submit" class="btn btn-block btn-lg">
                                <i class="fa fa-user-circle pr-2"></i> {{ trans('logRes_trans.Login') }}
                            </button>
                            </div>
                        </div>

                        {{-- <div class="form-group row mt-3 mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-block btn-lg">
                                    <i class="fa fa-user-circle pr-2"></i> {{ trans('logRes_trans.Login') }}
                                </button>
                            </div>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
