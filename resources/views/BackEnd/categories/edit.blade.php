@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Category Control
@stop
@endsection

@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('categories_trans.Edit_Categories') }}
@stop
<!-- breadcrumb -->
@endsection

@section('content')
<!-- row -->
<div class="container contact-form">
    <form method="post" action="{{route('categories.update' , $category->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <!-- Left -->
            <div class="col-md-6">
                <label class="text-success">{{ trans('categories_trans.Title_EN') }} *</label>
                <div class="form-group">
                    <input value="{{$category->title_en}}" type="text" name="title_en" class="form-control" />
                    {{-- Validation and Error Message --}}
                    @error('title_en')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="text-success">{{ trans('categories_trans.Description_EN') }} *</label>
                    <textarea type="text" name="description_en" class="form-control" rows="5" >{{$category->description_en}}</textarea>
                    {{-- Validation and Error Message --}}
                    @error('description_en')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text text-success" for="inputGroupSelect01">{{ trans('categories_trans.Status') }} * </label>
                    <select name="status" class="form-select form-control" id="inputGroupSelect01" style="width: 50%; height: 50px;">
                        <option readonly>{{ trans('categories_trans.Choose_Status') }}</option>

                        <option
                            @if ($category->status === 0)
                                selected
                            @endif
                            value="0">{{ trans('categories_trans.Hidden') }}
                        </option>

                        <option
                        @if ($category->status === 1)
                            selected
                        @endif
                            value="1">{{ trans('categories_trans.Visible') }}
                        </option>
                    </select>
                    {{-- Validation and Error Message --}}
                    @error('status')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="submit" class="btnContact" value="{{ trans('categories_trans.submit') }}" />
                </div>

            </div>

            <!-- Right -->
            <div class="col-md-6">
                <label class="text-success">{{ trans('categories_trans.Title_AR') }} *</label>
                <div class="form-group">
                    <input value="{{$category->title_ar}}" type="text" name="title_ar" class="form-control" />
                    {{-- Validation and Error Message --}}
                    @error('title_ar')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="text-success">{{ trans('categories_trans.Description_AR') }} *</label>
                    <textarea type="text" name="description_ar" class="form-control" rows="5">{{$category->description_ar}}</textarea>
                    {{-- Validation and Error Message --}}
                    @error('description_ar')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="text-success">{{ trans('categories_trans.Image') }} *</label>
                    <input class="form-control" name="image" type="file" id="formFile">
                    <a target='_blank' href="{{ asset('images/categories/' . $category->image) }}">
                        <img height="75" width="75" class="img-fluid img-thumbnail" src="{{ asset('images/categories/' . $category->image) }}" alt="Image-Categories">
                    </a>
                    {{-- Validation and Error Message --}}
                    @error('image')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
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
