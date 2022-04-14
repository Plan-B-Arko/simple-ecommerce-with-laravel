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
                <div class="col-md-6">
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
                    <form id="subcategory" class="text-dark" action="{{ route('category_process') }}" method="post">
                       @csrf
                        <div class="form-group">
                            <label for="sub_category">Sub Category</label>
                            <input type="text" class="form-control" id="sub_category" name="sub_category" placeholder="Enter Sub Category" required >
                        </div>
                        <div class="form-group">
                            <label for="main_category">select Category</label>
                            <select class="form-control" id="main_category" name="main_category" required >
                                <option value="">Select...</option>
                                <option value="Baby">Baby</option>
                                <option value="Adult">Adult</option>
                                <option value="Aged">Aged</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" value="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection



@section('admin_footer_script')
    <script src="{{ asset('js/jquery.validate.js') }}"></script>
    <script>
        var form = $("#subcategory");
        var validator = form.validate();
    </script>
@endsection
