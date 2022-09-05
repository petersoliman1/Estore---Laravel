@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    Products
@stop
@endsection

@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('products_trans.Products') }}
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

                <!-- Count Products -->
                <div class="float-left m-1">
                    <h5 class="text-center text-white">
                        {{ trans('products_trans.Count') }}
                        <span class="badge bg-success">
                            {{$products->count()}}
                        </span>
                    </h5>
                </div>

                <!-- Add Products  -->
                <a href="{{route('products.create')}}" class="button x-small float-right text-white">
                    {{ trans('products_trans.Add_Product') }}
                </a>
            </div>

            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">

                    <!-- Start The Table -->
                    <table id="datatable" class="table table-striped table-bordered p-0">
                    <!-- If count is greater than zero, return the table data -->
                    @if ($products->count() > 0)
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('products_trans.Name') }}</th>
                                <th>{{ trans('products_trans.Description') }}</th>
                                <th>{{ trans('products_trans.Image') }}</th>
                                <th>{{ trans('products_trans.Sub_Image') }}</th>
                                <th>{{ trans('products_trans.Old_Price') }}</th>
                                <th>{{ trans('products_trans.Current_Price') }}</th>
                                <th>{{ trans('products_trans.Status') }}</th>
                                <th>{{ trans('products_trans.Amount') }}</th>
                                <th>{{ trans('products_trans.Category_id') }}</th>
                                <th>{{ trans('products_trans.Processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->description}}</td>

                                    <td>
                                        <a target='_blank' href="{{ asset('images/products/' . $product->image) }}">
                                        <img height="50" width="50" class="img-thumbnail" src="{{ asset('images/products/' . $product->image) }}" alt="Image-Products"></a>
                                    </td>

                                    <td>
                                        <a target='_blank' href="{{ asset('images/products/MultiImages/' . $product->sub_image) }}">
                                            <img height="50" width="50" class="img-thumbnail" src="{{ asset('images/products/MultiImages/' . $product->sub_image) }}" alt="Sub_Image-Products">
                                        </a>
                                    </td>

                                    <td>{{$product->old_price}}</td>
                                    <td>{{$product->current_price}}</td>

                                    <td>
                                        @if ($product->status == 0)
                                            <h5>
                                                <span class="p-2 badge badge-danger">
                                                {{ trans('products_trans.Hidden') }}
                                                </span>
                                            </h5>
                                        @else
                                            <h5>
                                                <span class="p-2 badge badge-primary">
                                                    {{ trans('products_trans.Visible') }}
                                                </span>
                                            </h5>
                                        @endif
                                    </td>

                                    <td>{{$product->amount}}</td>

                                    <td>
                                        <a class="text-primary" target='_blank' href="{{route('categories.show', $product->category->id)}}">
                                            @if (app()->getLocale() == "en")
                                            {{$product->category->title_en}}
                                            @else
                                            {{$product->category->title_ar}}
                                            @endif
                                        </a>
                                    </td>

                                    <td style="display: inline-flex;">
                                        <!-- Show -->
                                        <a class="btn btn-info m-1" href="{{route('products.show' , $product->id)}}" data-toggle="tooltip" data-placement="top" title="{{ trans('products_trans.Show_Product') }}"><i class="fa fa-eye"></i>
                                        </a>

                                        <!-- Edit -->
                                        <a class="btn btn-success m-1" href="{{ route('products.edit' , $product->id)}}" data-toggle="tooltip" data-placement="top" title="{{ trans('products_trans.Edit_Products') }}"><i class="fa fa-edit"></i>
                                        </a>

                                        <!-- Delete -->
                                        <button type="submit"  class="btn btn-danger m-1 servideletebtn" data-toggle="modal"
                                        data-target="#delete{{ $product->id }}" data-placement="top" title="{{ trans('products_trans.Delete_Products') }}">
                                            <i class="fa fa-trash"></i>
                                        </button>

                                        <!-- Start Delete Modal Comment -->
                                        <div class="modal fade" id="delete{{ $product->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                            id="exampleModalLabel">
                                                            {{ trans('products_trans.Delete_Products') }}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('products.destroy' , $product->id)}}" method="post">
                                                            {{method_field('Delete')}}
                                                            @csrf
                                                            {{ trans('products_trans.Warning_Products') }}
                                                            <input id="id" type="text" name="id" class="form-control" value="{{ $product->name }}" disabled>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                                        {{ trans('products_trans.Close') }}
                                                                    </button>
                                                                    <button type="submit" class="btn btn-danger">
                                                                        {{ trans('products_trans.Delete_Products') }}
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
                                    <h5>{{ trans('products_trans.Warning_Message') }}</h5>
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
