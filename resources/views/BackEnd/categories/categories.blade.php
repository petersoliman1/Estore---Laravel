@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Categories
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
        <div class="card card-statistics h-100">

            <!-- Redirecting With Flashed Session Data -->
            <!-- Add -->
            @if (session('Success'))
                <div class="alert alert-success m-1 alert-block">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{{ session('Success') }}</strong>
                </div>
            @endif
            <!-- Update -->
            @if (session('Info'))
            <div class="alert alert-info m-2">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{{ session('Info') }}</strong>
            </div>
            @endif
            <!-- Delete -->
            @if (session('Danger'))
                <div class="alert alert-danger m-2">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>{{ session('Danger') }}</strong>
                </div>
            @endif

            <!-- Card Title -->
            <div class="card-header bg-dark">

                <!-- Count Categories -->
                <div class="float-left m-1">
                    <h5 class="text-center text-white">
                        {{ trans('categories_trans.Count') }}
                        <span class="badge bg-success">
                            {{$modelCategories->count()}}
                        </span>
                    </h5>
                </div>

                <!-- Add Categories  -->
                <a href="{{route('categories.create')}}" class="button x-small float-right text-white">
                    {{ trans('categories_trans.Add_Categories') }}
                </a>
            </div>

            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">

                    <!-- Start The Table -->
                    <table id="datatable" class="table table-striped table-bordered p-0">
                    <!-- If count is greater than zero, return the table data -->
                    @if ($modelCategories->count() > 0)
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
                            @foreach ( $modelCategories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->title}}</td>
                                    <td>{{$category->description}}</td>

                                    <td>
                                        <a target='_blank' href="{{ asset('images/categories/' . $category->image) }}">
                                        <img height="50" width="50" class="img-thumbnail" src="{{ asset('images/categories/' . $category->image) }}" alt="Image-Categories"></a>
                                    </td>

                                    <td>
                                        @if ($category->status == 0)
                                            <h5>
                                                <span class="p-2 badge badge-danger">
                                                    {{ trans('categories_trans.Hidden') }}
                                                </span>
                                            </h5>
                                        @else
                                            <h5>
                                                <span class="p-2 badge badge-primary">
                                                    {{ trans('categories_trans.Visible') }}
                                                </span>
                                            </h5>
                                        @endif
                                    </td>

                                    <td  style="display: inline-flex;">
                                        <!-- Show -->
                                        <a class="btn btn-info m-1" href="{{route('categories.show' , $category->id)}}" data-toggle="tooltip" data-placement="top" title="{{ trans('categories_trans.Show_Category') }}"><i class="fa fa-eye"></i>
                                        </a>

                                        <!-- Edit -->
                                        <a class="btn btn-success m-1" href="{{ route('categories.edit' , $category->id) }}"  data-toggle="tooltip" data-placement="top" title="{{ trans('categories_trans.Edit_Categories') }}"><i class="fa fa-edit"></i>
                                        </a>

                                        <!-- Delete -->
                                        <button type="submit"  class="btn btn-danger m-1 servideletebtn" data-toggle="modal"
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
                                                            <input id="id" type="text" name="id" class="form-control" value="{{ $category->title }}" disabled>
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
                            @endforeach
                            <!-- If count is less than zero, return this message to me instead of the table data -->
                            @else
                            <tr>
                                <div class="alert alert-danger m-1" role="alert">
                                    <h5>{{ trans('categories_trans.Warning_Message') }}</h5>
                                </div>
                            </tr>
                        </tbody>
                        <!-- This if is responsible for count, is there data or not? -->
                        @endif
                    </table>
                    <!-- End The Table -->
                </div>
            </div>
            <!-- End Card Bady -->

        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
