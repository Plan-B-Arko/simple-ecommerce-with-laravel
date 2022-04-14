@extends('layouts.backend_layout.admin_backend_layout')

@section('admin_header_script')
    <style>
        .error{
            color: red;
            display: block;
        }
    </style>
@endsection



@section('admin_content')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Add Category</h4>
                <p class="mb-0">Your Category List</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">

        </div>
        <div class="col-md-6">

        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="col-md-12">
                    @if (session('danger'))
                        <div class="alert alert-danger">
                            {{ session('danger') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @foreach($products as $product)
                    <form id="product" class="text-dark" action="{{ url('/admin/edit/product/process/'.$product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Product Title</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" placeholder="Enter Discount Name" required >
                                </div>
                                <div class="form-group">
                                    <label for="description">Product Description</label>
                                    <textarea class="form-control" rows="4" placeholder="Enter Product Description" name="description" id="description" required>{{ $product->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="price"> Product Price</label>
                                    <input type="text" class="form-control" id="price" name="price" placeholder="Enter Product Price" value="{{ $product->price }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="quantity"> Product Quantity</label>
                                    <input type="text" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}" placeholder="Enter Product Quantity" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Upload Image</label>
                                    <input type="file" class="form-control-file" id="image" name="image" required>
                                    <img class="pt-1" src="{{ asset('admin/product/'.$product->image) }}" width="100px" height="100px" alt="">
                                </div>
                                <div class="form-group">
                                    <label for="discount_option">Select Category Type</label>
                                    <select class="form-control" id="category" name="category" required >
                                        <option value="{{$product->ProductCategory->name}}" selected="selected">{{$product->ProductCategory->name}}</option>
                                        <option value="">Select...</option>
                                        @foreach($category as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}} - {{$cat->maincategory}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="discount_option">Select Discount Type</labe l>
                                    <select class="form-control" id="discount_option" name="discount_option" required >
                                        <option value="{{$product->productDiscount->name}}" selected="selected">{{$product->productDiscount->name}}</option>
                                        <option value="">Select...</option>
                                        @foreach($discount as $dis)
                                            <option value="{{$dis->id}}">{{$dis->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" value="submit">Submit</button>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection



@section('admin_footer_script')
    <script src="{{ asset('js/jquery.validate.js') }}"></script>
    <script>
        var form = $("#product");
        var validator = form.validate();
    </script>
@endsection
