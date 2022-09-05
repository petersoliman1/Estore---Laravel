@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Products Control
@stop
@endsection

@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('products_trans.Edit_Products') }}
@stop
<!-- breadcrumb -->
@endsection

@section('content')
<!-- row -->
<div class="container contact-form">
    <form method="post" action="{{route('products.update' , $product->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <!-- Left -->
            <div class="col-md-6">

                <!-- Name_EN -->
                <div class="form-group">
                    <label class="text-success">{{ trans('products_trans.Name_EN') }} *</label>
                    <input value="{{$product->name_en}}" type="text" name="name_en" class="form-control" />
                    {{-- Validation and Error Message --}}
                    @error('name_en')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description_EN -->
                <div class="form-group">
                    <label class="text-success">{{ trans('products_trans.Description_EN') }} *</label>
                    <textarea type="text" name="description_en" class="form-control" rows="5" >{{$product->description_en}}</textarea>
                    {{-- Validation and Error Message --}}
                    @error('description_en')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Image -->
                <div class="form-group">
                    <label class="text-success">{{ trans('products_trans.Image') }} *</label>
                    <input class="form-control" name="image" type="file" id="formFile">
                    <a target='_blank' href="{{ asset('images/products/' . $product->image) }}">
                        <img height="75" width="75" class="img-fluid img-thumbnail" src="{{ asset('images/products/' . $product->image) }}" alt="Image-Categories">
                    </a>
                    {{-- Validation and Error Message --}}
                    @error('image')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Old_Price -->
                <div class="form-group">
                    <label class="text-success">{{ trans('products_trans.Old_Price') }} *</label>
                    <input value="{{$product->old_price}}" type="text" name="old_price" class="form-control" />
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
                        <option
                            @if ($product->status === 0)
                                selected
                            @endif
                            value="0">{{ trans('products_trans.Hidden') }}
                        </option>
                        <option
                            @if ($product->status === 1)
                                selected
                            @endif
                            value="1">{{ trans('products_trans.Visible') }}
                        </option>
                    </select>
                    {{-- Validation and Error Message --}}
                    @error('status')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Amount -->
                <div class="form-group">
                    <label class="text-success">{{ trans('products_trans.Amount') }} *</label>
                    <input value="{{$product->amount}}" type="text" name="amount" class="form-control" />
                    {{-- Validation and Error Message --}}
                    @error('amount')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Right -->
            <div class="col-md-6">

                <!-- Name_AR -->
                <label class="text-success">{{ trans('products_trans.Name_AR') }} *</label>
                <div class="form-group">
                    <input value="{{$product->name_ar}}" type="text" name="name_ar" class="form-control" />
                    {{-- Validation and Error Message --}}
                    @error('name_ar')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Description_AR -->
                <div class="form-group">
                    <label class="text-success">{{ trans('products_trans.Description_AR') }} *</label>
                    <textarea type="text" name="description_ar" class="form-control" rows="5">{{$product->description_ar}}</textarea>
                    {{-- Validation and Error Message --}}
                    @error('description_ar')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Sub-Image -->
                <div class="form-group">
                    <label class="text-success">{{ trans('products_trans.Sub_Image') }} *</label>
                    <input class="form-control" name="sub_image" type="file" id="formFile">
                        <a target='_blank' href="{{ asset('images/products/MultiImages/' . $product->sub_image) }}">
                            <img height="75" width="75" class="img-thumbnail" src="{{ asset('images/products/MultiImages/' . $product->sub_image) }}" alt="Sub_Image-Products">
                        </a>
                    {{-- Validation and Error Message --}}
                    @error('sub_image')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- current_price -->
                <div class="form-group">
                    <label class="text-success">{{ trans('products_trans.Current_Price') }} *</label>
                    <input  value="{{$product->current_price}}" type="text" name="current_price" class="form-control" />
                    {{-- Validation and Error Message --}}
                    @error('current_price')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- input Category_ID -->
                <div class="input-group mb-3">
                    <label class="input-group-text text-success" for="inputGroupSelect01">{{ trans('products_trans.Category_id') }} * </label>
                    <select name="category_id" class="form-select form-control" id="inputGroupSelect01" style="width: 50%; height: 50px;">
                        @foreach ( $category as $category)
                        <option
                            @if ($product->category_id == $category->id)
                                selected
                            @endif
                            value="{{$category->id}}">{{$category->title}}
                        </option>
                        @endforeach
                    </select>
                    {{-- Validation and Error Message --}}
                    @error('category_id')
                        <div class="text-danger m-1 p-1">{{ $message }}</div>
                    @enderror
                </div>

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
