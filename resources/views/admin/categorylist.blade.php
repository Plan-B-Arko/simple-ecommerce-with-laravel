@extends('layouts.backend_layout.admin_backend_layout')

@section('admin_header_script')
@endsection



@section('admin_content')
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Category List</h4>
                <p class="mb-0">Your Category List</p>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
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
                <div class="table-responsive">
                    <table class="table table-responsive-sm text-dark">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Sub Category</th>
                                <th>Main Category</th>
                                <th>Discount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <th>{{ $category->id }}</th>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->maincategory }}   </td>
                                <td>
                                    @if($category->status == 0)
                                    <a href="" class="btn btn-outline-primary" id="cat_active"  cat-id="{{ $category->id }}">
                                        Active
                                    </a>
                                    @else
                                        <a href="" class="btn btn-outline-primary" cat-id="{{ $category->id }}" id="cat_inactive">
                                            Inactive
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('/admin/edit/category/'. $category->id ) }}" class="btn btn-outline-primary">
                                        <img src="https://img.icons8.com/external-becris-lineal-becris/20/000000/external-edit-mintab-for-ios-becris-lineal-becris.png"/>
                                    </a>
                                    <a href="{{ url('/admin/category/delete/'. $category->id ) }}" class="btn btn-outline-danger">
                                        <img src="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/20/000000/external-delete-miscellaneous-kiranshastry-lineal-kiranshastry.png"/>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="loading"></div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('admin_footer_script')
    <script>
        $(document.body).on('click', '#cat_active', function(e) {
            e.preventDefault();
            let cat_id = $(this).attr('cat-id');
            $(".loading").show();
            setTimeout(function () {
                // $( ".loading" ).hide();
                $.ajax({
                    method: "post",
                    url: '{{route('category_inactive')}}',
                    data: {id:cat_id, _token: '{{ csrf_token() }}'},
                    dataType: "json",
                    success: function(res) {
                        if(res.data){
                            $( ".loading" ).hide();
                            $('.card-body').prepend('<div id="custom-message" class="alert alert-success">' + res.message + '</div>');
                        }
                    },
                })
            }, 2000);
        });

        $(document.body).on('click', '#cat_inactive', function(e) {
            e.preventDefault();
            let cat_id = $(this).attr('cat-id');
            $(".loading").show();
            setTimeout(function () {
                $.ajax({
                    method: "post",
                    url: '{{route('category_active')}}',
                    data: {'id':cat_id, _token: '{{ csrf_token() }}'},
                    dataType: "json",
                    success: function(res) {
                        if(res.data){
                            $( ".loading" ).hide();
                            $('.card-body').prepend('<div id="custom-message" class="alert alert-success">' + res.message + '</div>');
                        }
                    },
                })
            }, 1500);
        });

    </script>
@endsection
