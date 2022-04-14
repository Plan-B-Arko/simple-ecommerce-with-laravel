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
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($discount as $dis)
                            <tr>
                                <th>{{ $dis->id }}</th>
                                <td>{{ $dis->name }}</td>
                                <td>{{ $dis->amount }}   </td>
                                <td>{{ $dis->discount_option }}</td>
                                <td>
                                    <a href="{{ url('/admin/edit/discount/'.$dis->id) }}" class="btn btn-outline-primary">
                                        <img src="https://img.icons8.com/external-becris-lineal-becris/20/000000/external-edit-mintab-for-ios-becris-lineal-becris.png"/>
                                    </a>
                                    <a href="{{url('/admin/discount/delete/'.$dis->id)}}" class="btn btn-outline-danger" id="dis-delete">
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
        $(document.body).on('click', '#dis-delete', function(e) {
            $(".loading").show();
            setTimeout(function () {
                $( ".loading" ).hide();
            }, 5000);
        });
    </script>
@endsection
