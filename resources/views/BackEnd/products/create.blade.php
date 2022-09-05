@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Product Control
@stop
@endsection

@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('products_trans.Add_Product') }}
@stop
<!-- breadcrumb -->
@endsection

@section('content')
<!-- row -->
<div class="container contact-form">

    <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!-- Left Form -->
            <div class="col-md-6">

                <!-- Name_EN -->
                <div class="form-group">
                    <label class="text-success">{{ trans('products_trans.Name_EN') }} *</label>
                    <input type="text" name="name_en" class="form-control" />
                    {{-- Validation and Error Message --}}
                    @error('name_en')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description_EN -->
                <div class="form-group">
                    <label class="text-success">{{ trans('products_trans.Description_EN') }} *</label>
                    <textarea type="text" name="description_en" class="form-control" rows="5" ></textarea>
                    {{-- Validation and Error Message --}}
                    @error('description_en')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Image -->
                <div class="form-group">
                    <label class="text-success">{{ trans('products_trans.Image') }} *</label>
                    <input class="form-control" name="image" type="file" id="formFile">
                    {{-- Validation and Error Message --}}
                    @error('image')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Old_Price -->
                <div class="form-group">
                    <label class="text-success">{{ trans('products_trans.Old_Price') }} *</label>
                    <input type="text" name="old_price" class="form-control" />
                    {{-- Validation and Error Message --}}
                    @error('old_price')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- status -->
                <div class="input-group mb-3">
                    <label class="input-group-text text-success" for="inputGroupSelect01">{{ trans('products_trans.Status') }} * </label>
                    <select name="status" class="form-select form-control" id="inputGroupSelect01" style="width: 50%; height: 50px;">
                        <option readonly>{{ trans('products_trans.Choose_Status') }}</option>
                        <option value="0">{{ trans('products_trans.Hidden') }}</option>
                        <option value="1">{{ trans('products_trans.Visible') }}</option>
                    </select>
                    {{-- Validation and Error Message --}}
                    @error('status')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Amount -->
                <div class="form-group">
                    <label class="text-success">{{ trans('products_trans.Amount') }} *</label>
                    <input type="text" name="amount" class="form-control" />
                    {{-- Validation and Error Message --}}
                    @error('amount')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- <div class="form-group">
                    <label class="text-success">{{ trans('products_trans.Status') }} * </label>
                    <input type="radio" name="status" value="0" checked> {{ trans('products_trans.Hidden') }}
                    <input type="radio" name="status" value="1"> {{ trans('products_trans.Visible') }}
                </div> --}}
            </div>

            <!-- Right Form -->
            <div class="col-md-6">

                <!-- Name_AR -->
                <label class="text-success">{{ trans('products_trans.Name_AR') }} *</label>
                <div class="form-group">
                    <input type="text" name="name_ar" class="form-control" />
                    {{-- Validation and Error Message --}}
                    @error('name_ar')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description_AR -->
                <div class="form-group">
                    <label class="text-success">{{ trans('products_trans.Description_AR') }} *</label>
                    <textarea type="text" name="description_ar" class="form-control" rows="5"></textarea>
                    {{-- Validation and Error Message --}}
                    @error('description_ar')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Sub-Image -->
                <div class="form-group">
                    <label class="text-success" for="formFile">{{ trans('products_trans.Sub_Image') }} *</label>
                    <input class="form-control" name="sub_image" type="file" id="formFile">
                    {{-- Validation and Error Message --}}
                    @error('sub_image')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- current_price -->
                <div class="form-group">
                    <label class="text-success">{{ trans('products_trans.Current_Price') }} *</label>
                    <input type="text" name="current_price" class="form-control" />
                    {{-- Validation and Error Message --}}
                    @error('current_price')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- input Category_ID -->
                <div class="input-group mb-3">
                    <label class="input-group-text text-success" for="inputGroupSelect01">{{ trans('products_trans.Category_id') }} * </label>
                    <select name="category_id" class="form-select form-control" id="inputGroupSelect01" style="width: 50%; height: 50px;">
                        @foreach ( $modelCategories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                    {{-- Validation and Error Message --}}
                    @error('category_id')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Form -->
                <div class="form-group">
                    <input type="submit" class="btnContact" value="{{ trans('products_trans.submit') }}" />
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
