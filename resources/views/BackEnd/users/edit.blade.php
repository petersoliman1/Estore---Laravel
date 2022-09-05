@extends('layouts.master')
@section('css')

@section('title')
    User Control
@stop
@endsection

@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('Users_trans.Edit_User') }}
@stop
<!-- breadcrumb -->
@endsection

@section('content')
<!-- row -->
<div class="container contact-form">
    <form method="post" action="{{route('users.update' , $user->id)}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!-- Left -->
            <div class="col-md-6">
                <label class="text-success">{{ trans('Users_trans.Username') }} *</label>
                <div class="form-group">
                    <input value="{{$user->username}}" type="text" name="username" class="form-control" />
                    {{-- Validation and Error Message --}}
                    @error('username')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="text-success">{{ trans('Users_trans.Email') }} *</label>
                    <input value="{{$user->email}}" type="text" name="email" class="form-control" />
                    {{-- Validation and Error Message --}}
                    @error('email')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="text-success">{{ trans('Users_trans.Password') }} *</label>
                    <input type="password" name="password" class="form-control" />
                    {{-- Validation and Error Message --}}
                    @error('password')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Right -->
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <label class="input-group-text text-success" for="inputGroupSelect01">{{ trans('Users_trans.Role') }} *</label>
                    <select name="role" class="form-select form-control" id="inputGroupSelect01" style="width: 50%; height: 50px;">
                        <option readonly>{{ trans('Users_trans.Choose_Role') }}</option>

                        <option
                            @if ($user->role === "admin")
                                selected
                            @endif
                            value="admin">{{ trans('Users_trans.Admin') }}
                        </option>

                        <option
                            @if ($user->role === "moderator")
                                selected
                            @endif
                            value="moderator">{{ trans('Users_trans.Moderator') }}
                        </option>

                        <option
                        @if ($user->role === "user")
                            selected
                        @endif
                            value="user">{{ trans('Users_trans.User') }}
                        </option>
                        {{-- Validation and Error Message --}}
                        @error('role')
                            <div class="text-danger m-1 p-1">{{ $message }}</div>
                        @enderror
                    </select>
                </div>

                <div class="form-group">
                    <label class="text-success">{{ trans('Users_trans.Image') }} *</label>
                    <input class="form-control" name="avatar" type="file" id="formFile">
                    <a target='_blank' href="{{ asset('images/users/' . $user->avatar) }}">
                        <img height="75" width="75" class="img-fluid img-thumbnail" src="{{ asset('images/users/' . $user->avatar) }}" alt="Avatar">
                    </a>
                    {{-- Validation and Error Message --}}
                    @error('avatar')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="submit" name="save-user" class="btnContact" value="{{ trans('Users_trans.submit') }}" />
                </div>
            </div>
        </div>
    </form>
</div>
<!-- row closed -->
@endsection
@section('js')


@endsection
