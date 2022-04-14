@extends('layouts.backend_layout.backend_layout')

@section('header_section')
@endsection


@section('content')
        <div class="checkout block">
            <div class="container">
                <form action="{{ route('product_checkout') }}" method="post" id="checkout">
                    @csrf
                    <div class="row">
                    <div class="col-12 col-lg-6 col-xl-7">
                        <div class="card mb-lg-0">
                            <div class="card-body">
                                <h3 class="card-title">Billing details</h3>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="checkout-first-name">First Name</label>
                                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="f_name" placeholder="First Name" name="first_name">
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="checkout-last-name">Last Name</label>
                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" placeholder="Last Name" name="last_name">
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="checkout-company-name">Phone number</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Phone Number" name="phone">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="checkout-company-name">Full Address</label>
                                    <textarea id="address" class="form-control @error('address') is-invalid @enderror" rows="4" name="address"
                                              placeholder="Enter House no, Post Code, City"></textarea>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="payment-methods">
                                    <ul class="payment-methods__list">
                                        <li class="payment-methods__item">
                                            <label class="payment-methods__item-header"><span class="payment-methods__item-radio input-radio"><span class="input-radio__body"><input class="input-radio__input @error('cash') is-invalid @enderror" id="cash" name="cash" value="Cash" type="radio"> <span class="input-radio__circle"></span> </span>
													</span><span class="payment-methods__item-title">Cash on delivery</span></label>
                                            @error('cash')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-5 mt-4 mt-lg-0">
                        <div class="card mb-0">
                            <div class="card-body">
                                <div class="pb-4">
                                    <a href="{{ route('dashboard_cart') }}" class="btn btn-secondary btn-block">Go to Cart</a>
                                </div>
                                <h3 class="card-title">Your Order</h3>
                                <table class="checkout__totals">
                                    <thead class="checkout__totals-header">

                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody class="checkout__totals-products">
                                    @foreach($cartProducts as $cartProduct)
                                    <tr>
                                        <td>{{$cartProduct->product->name}} × {{ $cartProduct->product_qty }}</td>
                                        <td>
                                            @if($cartProduct->product->productDiscount->amount != 0)
                                                <strong>৳</strong>{{ number_format(($cartProduct->product->price - $cartProduct->product->productDiscount->amount) * $cartProduct->product_qty, 2)  }}
                                            @else
                                                <strong>৳</strong>{{ number_format($cartProduct->product->price * $cartProduct->product_qty, 2) }}
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <tbody class="checkout__totals-subtotals">
                                    <tr>
                                        <th>Subtotal</th>
                                        <?php
                                        $subtotal = 0
                                        ?>
                                        @foreach($cartProducts as $cartProduct)
                                            <?php number_format($subtotal = $subtotal + (($cartProduct->product->price - $cartProduct->product->productDiscount->amount ) * $cartProduct->product_qty), 2) ?>
{{--                                                <input type="hidden" name="cart_id[]" value="{{ $cartProduct->id }}">--}}
                                        @endforeach
                                        <td>{{ number_format($subtotal, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td><strong>৳</strong>{{ number_format($shipping_cost = 25.00, 2) }}</td>
                                    </tr>
                                    </tbody>
                                    <tfoot class="checkout__totals-footer">
                                    <tr>
                                        <th>Total</th>
                                        <td><strong>৳</strong>{{ number_format(($subtotal + $shipping_cost), 2) }}</td>
                                    </tr>
                                    </tfoot>

                                </table>
                                <button type="submit" class="btn btn-primary btn-xl btn-block">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
@endsection

@section('footer_section')
    <script src="{{ asset('js/jquery.validate.js') }}"></script>
    <script type="text/javascript">
        var form = $("#checkouttest");
        var validator = form.validate();
    </script>
@endsection
