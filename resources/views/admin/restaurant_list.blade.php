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
                            <th>Restaurant Name</th>
                            <th>Rating</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($restaurants as $restaurant)
                            <tr>
                                <td>{{ $restaurant->id }}</td>
                                <td>{{ $restaurant->restaurant_name }}</td>
                                <td>{{ $restaurant->rating }}</td>
                                <td>
                                    <a href="{{ url('/admin/delete/restaurant', $restaurant->id) }}" class="btn btn-outline-danger">Delete</a>
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

    </script>
@endsection
