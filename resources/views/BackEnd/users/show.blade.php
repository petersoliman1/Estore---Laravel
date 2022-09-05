@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Show User
@stop
@endsection

@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('users_trans.Users') }}
@stop
<!-- breadcrumb -->
@endsection

@section('content')

<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <!-- Start The Card -->
        <div class="card card-statistics h-100">

            <!-- Redirecting With Flashed Session Data -->
            <!-- Add -->
            @if (session('Success'))
                <div class="alert alert-success m-2">
                    {{ session('Success') }}
                </div>
            @endif
            <!-- Update -->
            @if (session('Info'))
                <div class="alert alert-info m-2">
                    {{ session('Info') }}
                </div>
            @endif
            <!-- Delete -->
            @if (session('Danger'))
                <div class="alert alert-danger m-2">
                    {{ session('Danger') }}
                </div>
            @endif

            <!-- Card Title -->
            <div class="card-header bg-dark">
                <div class="float-left m-1">
                    <h5 class="text-center text-white">{{ trans('users_trans.Count') }} <span class="badge bg-success">{{$user->count()}}</span></h5>
                </div>

            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <!-- Start The Table -->
                    <table id="datatable" class="table table-striped table-bordered p-0 text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('users_trans.Username') }}</th>
                                <th>{{ trans('users_trans.Email') }}</th>
                                <th>{{ trans('users_trans.Role') }}</th>
                                <th>{{ trans('users_trans.Image') }}</th>
                                <th>{{ trans('users_trans.Processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <th>{{$user->id}}</th>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role}}</td>

                                    <td >
                                        <a target='_blank' href="{{ asset('images/users/' . $user->avatar) }}">
                                            <img height="85" width="85" class="rounded" src="{{ asset('images/users/' . $user->avatar) }}" alt="Avatar">
                                        </a>
                                    </td>

                                    <td>
                                        <!-- Update -->
                                        <a class="btn btn-success m-1 btn-lg" href="{{route('users.edit' , $user->id)}}" data-toggle="tooltip" data-placement="top" title="{{ trans('users_trans.Edit_User') }}"><i class="fa fa-edit"></i>
                                        </a>

                                        <!-- Delete -->
                                        <button type="submit"  class="btn btn-danger m-1 btn-lg servideletebtn" data-toggle="modal"
                                        data-target="#delete{{ $user->id }}" data-placement="top" title="{{ trans('products_trans.Delete_Products') }}">
                                            <i class="fa fa-trash"></i>
                                        </button>

                                        <!-- Start Delete Modal Comment -->
                                        <div class="modal fade" id="delete{{ $user->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                            id="exampleModalLabel">
                                                            {{ trans('users_trans.Delete_User') }}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('users.delete' , $user->id)}}" method="get">
                                                            @method('PUT')
                                                            @csrf
                                                            {{ trans('users_trans.Warning_users') }}
                                                            <input id="id" type="text" name="id" class="form-control" value="{{ $user->username }}" disabled>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                                        {{ trans('users_trans.Close') }}
                                                                    </button>
                                                                    <button type="submit" class="btn btn-danger">
                                                                        {{ trans('users_trans.Delete_User') }}
                                                                    </button>
                                                                </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Delete Modal Comment -->

                                    </td>
                                </tr>
                        </tbody>
                    </table>
                    <!-- End The Table -->
                </div>
            </div>
            <!-- End Card Bady -->
        </div>
        <!-- End The Card -->
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render

@endsection
