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
                    @foreach($discount as $disct)
                    <form id="subcategory" class="text-dark" action="{{ url('/admin/edit/discount/process/'.$disct->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Discount Title</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$disct->name}}" placeholder="Enter Discount Name" required >
                        </div>
                        <div class="form-group">
                            <label for="amount"> Discount Amount</label>
                            <input type="text" class="form-control" id="amount" name="amount"  value="{{$disct->amount}}" placeholder="Enter Discount Amount" required >
                        </div>
                        <div class="form-group">
                            <label for="discount_option">Select Discount Type</label>
                            <select class="form-control" id="discount_option" name="discount_option" required >
                                <option value="{{$disct->discount_option}}" selected="selected">{{$disct->discount_option}}</option>
                                <option value="">Select...</option>
                                <option value="flat">Flat</option>
                                <option value="percentage">Percentage</option>
                            </select>
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
        var form = $("#subcategory");
        var validator = form.validate();
    </script>
@endsection
