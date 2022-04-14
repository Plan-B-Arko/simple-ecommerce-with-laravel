@extends('layouts.backend_layout.backend_layout')

@section('header_section')
@endsection


@section('content')
    <div class="site__body">
        <div class="page-header">
            <div class="page-header__container container">
                <div class="page-header__title">
                    <h1>Shopping Cart</h1>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('danger'))
                        <div class="alert alert-danger">
                            {{ session('danger') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="cart block">
            <div class="container">
                <form action="{{ route('cart_update') }}" method="post">
                    @csrf
                    <table class="cart__table cart-table">
                        <thead class="cart-table__head">
                        <tr class="cart-table__row">
                            <th class="cart-table__column cart-table__column--image">Image</th>
                            <th class="cart-table__column cart-table__column--product">Product</th>
                            <th class="cart-table__column cart-table__column--price">Price</th>
                            <th class="cart-table__column cart-table__column--quantity">Quantity</th>
                            <th class="cart-table__column cart-table__column--total">Total</th>
                            <th class="cart-table__column cart-table__column--remove"></th>
                        </tr>
                        </thead>
                        <tbody class="cart-table__body">
                        @foreach($cartProducts as $cartProduct)
                            <input type="hidden" name="cart_id[]" value="{{ $cartProduct->id }}">
                            <tr class="cart-table__row">
                                <td class="cart-table__column cart-table__column--image">
                                    <img src="{{ asset('admin/product/'.$cartProduct->product->image) }}" alt="">
                                </td>
                                <td class="cart-table__column cart-table__column--product"><a href="" class="cart-table__product-name">{{$cartProduct->product->name}}</a>
                                </td>
                                <td class="cart-table__column cart-table__column--price" data-title="Price">
                                    @if($cartProduct->product->productDiscount->amount != 0)
                                        <b style="color: red"><strike>৳{{ number_format($cartProduct->product->price, 2) }}</strike></b>
                                        <br>
                                        <strong>৳</strong>{{ number_format($cartProduct->product->price - $cartProduct->product->productDiscount->amount, 2)}}
                                    @else
                                        <strong>৳</strong>{{ number_format($cartProduct->product->price, 2)}}
                                    @endif

                                </td>
                                <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                                    <div class="input-number">
                                        <input class="form-control input-number__input" name="product_qty[]" type="number" min="1" value="{{$cartProduct->product_qty}}">
                                        <div class="input-number__add"></div>
                                        <div class="input-number__sub"></div>
                                    </div>
                                </td>
                                <td class="cart-table__column cart-table__column--total" data-title="Total">
                                    @if($cartProduct->product->productDiscount->amount != 0)
                                        <strong>৳</strong>{{ number_format(($cartProduct->product->price - $cartProduct->product->productDiscount->amount) * $cartProduct->product_qty, 2)  }}
                                    @else
                                        <strong>৳</strong>{{ number_format($cartProduct->product->price * $cartProduct->product_qty, 2) }}
                                    @endif
                                </td>
                                <td class="cart-table__column cart-table__column--remove">
                                    <a href="{{ url('/cart/item/delete/'.$cartProduct->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="cart__actions">
                        <div class="cart__buttons ml-auto">
                            <a href="{{ route('dashboard') }}" class="btn btn-light">Continue Shopping</a>
                            <button class="btn btn-primary" value="submit" type="submit">Update Cart</button>
                        </div>
                    </div>
                </form>
                <div class="row justify-content-end pt-5">
                    <div class="col-12 col-md-7 col-lg-6 col-xl-5">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Cart Totals</h3>
                                <table class="cart__totals">
                                    <thead class="cart__totals-header">
                                    <tr>
                                        <th>Subtotal</th>
                                        <?php
                                            $subtotal = 0
                                        ?>
                                        @foreach($cartProducts as $cartProduct)
                                            <?php number_format($subtotal = $subtotal + (($cartProduct->product->price - $cartProduct->product->productDiscount->amount ) * $cartProduct->product_qty), 2) ?>
                                        @endforeach
                                        <td><strong>৳</strong>{{ number_format($subtotal, 2) }}</td>
                                    </tr>
                                    </thead>
                                    <tbody class="cart__totals-body">
                                    <tr>
                                        <th>Shipping</th>
                                        <td> <strong>৳</strong>{{ number_format($shipping_cost = 25.00, 2) }}
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tfoot class="cart__totals-footer">
                                    <tr>
                                        <th>Total</th>
                                        <td><strong>৳</strong>{{ number_format(($subtotal + $shipping_cost), 2) }}</td>
                                    </tr>
                                    </tfoot>
                                </table>
                                <a href="{{ route('checkout') }}">
                                    <button type="submit" value="submit" class="btn btn-primary btn-xl btn-block cart__checkout-button">
                                        Proceed to checkout
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
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
