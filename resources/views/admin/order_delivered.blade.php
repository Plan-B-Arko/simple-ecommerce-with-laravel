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
                            <th>Name</th>
                            <th>Address</th>
                            <th>Product</th>
                            <th>Product QTY</th>
                            <th>Single Price</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order_datas as $order_data)
                            <tr>
                                <th>{{ $order_data->id }}</th>
                                <td>{{ $order_data->first_name.' '.$order_data->last_name }}</td>
                                <td>Phone: {{ $order_data->phone}}<br>Address: {{ $order_data->address }}</td>
                                <td>{{ $order_data->cart->product->name }}</td>
                                <td>{{ $order_data->cart->product_qty }}</td>
                                <td>
                                    @if($order_data->cart->product->productDiscount->amount != 0)
                                        <b style="color: red"><strike>৳{{ number_format($order_data->cart->product->price, 2) }}</strike></b>
                                        <br>
                                        <strong>৳</strong>{{ number_format($order_data->cart->product->price - $order_data->cart->product->productDiscount->amount, 2)}}
                                    @else
                                        <strong>৳</strong>{{ number_format($order_data->cart->product->price, 2)}}
                                @endif
                                <td>
                                    @if($order_data->cart->product->productDiscount->amount != 0)
                                        <strong>৳</strong>{{ number_format(($order_data->cart->product->price - $order_data->cart->product->productDiscount->amount) * $order_data->cart->product_qty, 2)  }}
                                    @else
                                        <strong>৳</strong>{{ number_format($order_data->cart->product->price * $order_data->cart->product_qty, 2) }}
                                    @endif
                                </td>
                                <td>
                                    @if($order_data->order_manage == '1')
                                        <p class="text-danger">Customer not receive yet</p>
                                    @elseif($order_data->order_manage == '2')
                                        <p class="text-success">Deliverd</p>
                                    @endif
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
