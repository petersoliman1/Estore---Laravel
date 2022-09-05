@extends('layouts.master')
@section('css')
    @toastr_css

@section('title')
    Comments
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('comments_trans.Comments') }}
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
                <div class="float-left m-1">
                    <h5 class="text-center text-white">{{ trans('comments_trans.Count') }} <span class="badge bg-success">{{$comments->count()}}</span></h5>
                </div>

                <!-- Add Products  -->
                <a href="{{route('comments.create')}}" class="button x-small float-right text-white">
                    {{ trans('comments_trans.Add_Comment') }}
                </a>
            </div>

            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">

                    <!-- Start The Table -->
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <!-- If count is greater than zero, return the table data -->
                        @if ($comments->count() > 0)
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('comments_trans.Comment') }}</th>
                                <th>{{ trans('comments_trans.Status') }}</th>
                                <th>{{ trans('comments_trans.Product_id') }}</th>
                                <th>{{ trans('comments_trans.User_id') }}</th>
                                <th>{{ trans('comments_trans.Processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $comments as $comment)
                                <tr>
                                    <!-- This input For ConfirmDelete To Know ID -->
                                    {{-- <input type="hidden" class="serdelete_val_id" value="{{$comment->id}}"> --}}

                                    <td>{{$comment->id}}</td>
                                    <td>{{$comment->comment}}</td>
                                    <td>
                                        @if ($comment->status == 0)
                                            <h5>
                                                <span class="p-2 badge badge-danger">
                                                    {{ trans('comments_trans.Hidden') }}
                                                </span>
                                            </h5>
                                        @else
                                            <h5>
                                                <span class="p-2 badge badge-primary">
                                                    {{ trans('comments_trans.Visible') }}
                                                </span>
                                            </h5>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="text-primary" target='_blank' href="{{route('products.show', $comment->product->id)}}">
                                            @if (app()->getLocale() == "en")
                                            {{$comment->product->name_en}}
                                            @else
                                            {{$comment->product->name_ar}}
                                            @endif
                                        </a>
                                    </td>

                                    <td>
                                        <a class="text-primary" target='_blank' href="{{route('users.show', $comment->user->id)}}">
                                            {{$comment->user->username}}
                                        </a>
                                    </td>

                                    <td style="display: inline-flex;">
                                        <!-- Edit -->
                                        <a class="btn btn-success m-1 confirmDelete" href="{{ route('comments.edit' , $comment->id)}}"  data-toggle="tooltip" data-placement="top" title="{{ trans('comments_trans.Edit_Comment') }}"><i class="fa fa-edit"></i>
                                        </a>

                                        <!-- Delete -->
                                        <button type="submit"  class="btn btn-danger m-1 servideletebtn" data-toggle="modal"
                                        data-target="#delete{{ $comment->id }}" data-placement="top" title="{{ trans('comments_trans.Delete_Comment') }}">
                                            <i class="fa fa-trash"></i>
                                        </button>

                                        <!-- Start Delete Modal Comment -->
                                        <div class="modal fade" id="delete{{ $comment->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                            id="exampleModalLabel">
                                                            {{ trans('comments_trans.Delete_Comment') }}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('comments.destroy' , $comment->id)}}" method="post">
                                                            {{method_field('Delete')}}
                                                            @csrf
                                                            {{ trans('comments_trans.Warning_Comment') }}
                                                            <input id="id" type="text" name="id" class="form-control" value="{{ $comment->comment }}" disabled>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                                        {{ trans('comments_trans.Close') }}
                                                                    </button>
                                                                    <button type="submit" class="btn btn-danger">
                                                                        {{ trans('comments_trans.Delete_Comment') }}
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
                                    <h5>{{ trans('comments_trans.Warning_Message') }}</h5>
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


<!-- Start Script -->
@section('js')
    @toastr_js
    @toastr_render
@endsection
