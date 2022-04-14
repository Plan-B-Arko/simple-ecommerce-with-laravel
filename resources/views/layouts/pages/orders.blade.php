@extends('layouts.backend_layout.backend_layout')

@section('header_section')
@endsection


@section('content')
    <div class="site__body">
        <div class="page-header">
            <div class="page-header__container container">
                <div class="page-header__title">
                    <h1>Orders List</h1>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>

        </div>
        <div class="cart block">
            <div class="container">
                <table class="cart__table cart-table">
                    <thead class="cart-table__head">
                    <tr class="cart-table__row">
                        <th class="cart-table__column cart-table__column--image">Image</th>
                        <th class="cart-table__column cart-table__column--product">Product</th>
                        <th class="cart-table__column cart-table__column--quantity">Quantity</th>
                        <th class="cart-table__column cart-table__column--price"></th>
                        <th class="cart-table__column cart-table__column--total">Action</th>
                        <th class="cart-table__column cart-table__column--remove"></th>
                    </tr>
                    </thead>
                    <tbody class="cart-table__body">
                    @foreach($order_datas as $order_data)
                    <tr class="cart-table__row">
                        <td class="cart-table__column cart-table__column--image">
                            <a href="{{ url('dashboard/single/product/'.$order_data->cart->product->id) }}"><img src="{{ asset('admin/product/'.$order_data->cart->product->image) }}" alt=""></a>
                        </td>
                        <td class="cart-table__column cart-table__column--product"><a href="#" class="cart-table__product-name">{{ $order_data->cart->product->name }}</a>
                        </td>
                        <td class="cart-table__column cart-table__column--price" data-title="Price">{{ $order_data->cart->product_qty }}</td>
                        <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                        </td>
                        <td class="cart-table__column cart-table__column--total" data-title="Total">
                            @if($order_data->order_manage == 0)
                                <p class="text-danger">Not Confirm Yet</p>
                            @elseif($order_data->order_manage == 1)
                                <a href="{{ url('/product/delivered/'.$order_data->id) }}" class="btn btn-outline-success">
                                    Delivered
                                </a>
                            @elseif($order_data->order_manage == 2)
                                <p class="text-success">Delivered</p>
                            @endif
                        </td>
                        <td class="cart-table__column cart-table__column--remove">
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('footer_section')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script>

    </script>
@endsection
