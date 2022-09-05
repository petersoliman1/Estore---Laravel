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
    {{ trans('categories_trans.Add_Categories') }}
@stop
<!-- breadcrumb -->
@endsection

@section('content')
<!-- row -->
<div class="container contact-form">

    <form method="post" action="{{route('categories.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!-- Left -->
            <div class="col-md-6">

                <div class="form-group">
                    <label class="text-success">{{ trans('categories_trans.Title_EN') }} *</label>
                    <input type="text" name="title_en" class="form-control" />
                    {{-- Validation and Error Message --}}
                    @error('title_en')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="text-success">{{ trans('categories_trans.Description_EN') }} *</label>
                    <textarea type="text" name="description_en" class="form-control" rows="5" ></textarea>
                    {{-- Validation and Error Message --}}
                    @error('description_en')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text text-success" for="inputGroupSelect01">{{ trans('categories_trans.Status') }} * </label>
                    <select name="status" class="form-select form-control" id="inputGroupSelect01" style="width: 50%; height: 50px;">
                        <option readonly>{{ trans('categories_trans.Choose_Status') }}</option>
                        <option value="0">{{ trans('categories_trans.Hidden') }}</option>
                        <option value="1">{{ trans('categories_trans.Visible') }}</option>
                    </select>
                    {{-- Validation and Error Message --}}
                    @error('status')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="submit" class="btnContact" value="{{ trans('categories_trans.submit') }}" />
                </div>

                {{-- <div class="form-group">
                    <label class="text-success">{{ trans('categories_trans.Status') }} * </label>
                    <input type="radio" name="status" value="0" checked> {{ trans('categories_trans.Hidden') }}
                    <input type="radio" name="status" value="1"> {{ trans('categories_trans.Visible') }}
                </div> --}}
            </div>

            <!-- Right -->
            <div class="col-md-6">
                <label class="text-success">{{ trans('categories_trans.Title_AR') }} *</label>
                <div class="form-group">
                    <input type="text" name="title_ar" class="form-control" />
                    {{-- Validation and Error Message --}}
                    @error('title_ar')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="text-success">{{ trans('categories_trans.Description_AR') }} *</label>
                    <textarea type="text" name="description_ar" class="form-control" rows="5"></textarea>
                    {{-- Validation and Error Message --}}
                    @error('description_ar')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="text-success">{{ trans('categories_trans.Image') }} *</label>
                    <input class="form-control" name="image" type="file" id="formFile">
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
