@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Show category
@stop
@endsection

@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('categories_trans.Categories') }}
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
                <div class="alert alert-success m-1">
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
                    <h5 class="text-center text-white">{{ trans('users_trans.Count') }} <span class="badge bg-success">{{$category->count()}}</span></h5>
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
                                <th>{{ trans('categories_trans.Title') }}</th>
                                <th>{{ trans('categories_trans.Description') }}</th>
                                <th>{{ trans('categories_trans.Image') }}</th>
                                <th>{{ trans('categories_trans.Status') }}</th>
                                <th>{{ trans('categories_trans.Processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <th>{{$category->id}}</th>
                                    <td>
                                        @if (app()->getLocale() == "en")
                                        {{$category->title_en}}
                                        @else
                                        {{$category->title_ar}}
                                        @endif
                                    </td>

                                    <td>
                                        @if (app()->getLocale() == "en")
                                        {{$category->description_en}}
                                        @else
                                        {{$category->description_ar}}
                                        @endif
                                    </td>

                                    <td>
                                        <a target='_blank' href="{{ asset('images/categories/' . $category->image) }}">
                                        <img height="85" width="85" class="img-thumbnail" src="{{ asset('images/categories/' . $category->image) }}" alt="Image-Categories"></a>
                                    </td>

                                    <td>
                                        @if ($category->status == 0)
                                            <h4>
                                                <span class="p-2 badge badge-danger">
                                                    {{ trans('categories_trans.Hidden') }}
                                                </span>
                                            </h4>
                                        @else
                                            <h4>
                                                <span class="p-2 badge badge-primary">
                                                    {{ trans('categories_trans.Visible') }}
                                                </span>
                                            </h4>
                                        @endif
                                    </td>

                                    <td style="display: inline-flex;">
                                        <!-- Edit -->
                                        <a class="btn btn-success m-1 btn-lg" href="{{route('categories.edit' , $category->id)}}" data-toggle="tooltip" data-placement="top" title="{{ trans('users_trans.Edit_User') }}"><i class="fa fa-edit"></i>
                                        </a>

                                        <!-- Delete -->
                                        <button type="submit"  class="btn btn-danger m-1 btn-lg servideletebtn" data-toggle="modal"
                                        data-target="#delete{{ $category->id }}" data-placement="top" title="{{ trans('categories_trans.Delete_Categories') }}">
                                            <i class="fa fa-trash"></i>
                                        </button>

                                        <!-- Start Delete Modal Comment -->
                                        <div class="modal fade" id="delete{{ $category->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                            id="exampleModalLabel">
                                                            {{ trans('categories_trans.Delete_Categories') }}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('categories.destroy' , $category->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            {{ trans('categories_trans.Warning_Categories') }}
                                                            <input id="id" type="text" name="id" class="form-control" value="@if (app()->getLocale() == "en")
                                                            {{$category->title_en}}
                                                            @else
                                                            {{$category->title_ar}}
                                                            @endif" disabled>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                                        {{ trans('categories_trans.Close') }}
                                                                    </button>
                                                                    <button type="submit" class="btn btn-danger">
                                                                        {{ trans('categories_trans.Delete_Categories') }}
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
