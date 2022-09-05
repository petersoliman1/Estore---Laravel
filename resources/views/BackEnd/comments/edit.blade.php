@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Comment Control
@stop
@endsection

@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('comments_trans.Edit_Comment') }}
@stop
<!-- breadcrumb -->
@endsection

@section('content')
<!-- row -->
<div class="container contact-form">

    <form method="post" action="{{route('comments.update' , $comment->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <!-- Left Form -->
            <div class="col-md-6">

                <!-- Comment -->
                <div class="form-group">
                    <label class="text-success">{{ trans('comments_trans.Comment') }} *</label>
                    <textarea type="text" name="comment" class="form-control" rows="5" >{{$comment->comment}}</textarea>
                    {{-- Validation and Error Message --}}
                    @error('comment')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- input Product_ID -->
                <div class="input-group mb-3">
                    <label class="input-group-text text-success" for="inputGroupSelect01">{{ trans('comments_trans.Product_id') }} * </label>
                    <select name="product_id" class="form-select form-control" id="inputGroupSelect01" style="width: 50%; height: 50px;">
                        @foreach ( $products as $product)
                            <option
                                @if ($comment->product_id  == $product->id)
                                    selected
                                @endif

                                value="{{$product->id}}">
                                {{$product->name}}
                            </option>
                        @endforeach
                    </select>
                    {{-- Validation and Error Message --}}
                    @error('product_id')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- status -->
                <div class="form-group">
                    <label class="input-group-text text-success d-inline-block w-15" for="inputGroupSelect01">{{ trans('comments_trans.Status') }} * </label>
                    <input
                        @if ($comment->status === 0)
                            checked
                        @endif
                    type="radio" class="m-2" name="status" value="0">{{ trans('comments_trans.Hidden') }}

                    <input
                        @if ($comment->status === 1)
                            checked
                        @endif

                        type="radio" class="m-2" name="status" value="1">{{ trans('comments_trans.Visible') }}
                    {{-- Validation and Error Message --}}
                    @error('status')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <!-- Right Form -->
            <div class="col-md-6">

                <!-- input User_ID -->
                <div class="input-group mb-3">
                    <label class="input-group-text text-success" for="inputGroupSelect01">{{ trans('comments_trans.User_id') }} * </label>
                    <select name="user_id" class="form-select form-control" id="inputGroupSelect01" style="width: 50%; height: 50px;" {{-- disabled --}}>
                        {{-- @foreach ( $users as $user) --}}
                        <option @if ($comment->user_id  == Auth::user()->id)
                                    selected
                                @endif
                        value="{{Auth::user()->id}}">{{Auth::user()->username}}</option>
                            {{-- <option
                                @if ($comment->user_id  == $user->id)
                                    selected
                                @endif
                            value="{{$user->id}}">
                                {{$user->username}}
                            </option> --}}
                        {{-- @endforeach --}}
                    </select>
                    {{-- Validation and Error Message --}}
                    @error('user_id')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Form -->
                <div class="form-group">
                    <input type="submit" class="btnContact" value="{{ trans('comments_trans.submit') }}" />
                </div>

            </div>
        </div>
    </form>
</div>
<!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
