@extends('layouts.backend_layout.backend_layout')

@section('header_section')
@endsection


@section('content')
    <div class="container pb-4">
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-6">
                    <div class="col-md-12">
                        <img src="{{ asset('admin/product/'.$product->image) }}" height="100%" width="100%" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12">
                        <h3 class="pb-2">{{$product->name}}</h3>
                        <p>
                            {{$product->description}}
                        </p>
                        <ul class="list-inline">
                            <li class="list-inline-item text-muted">Availability: {{ $product->quantity }}
                                @if($product->quantity !=0)
                                    <strong style="color: green">( In stock )</strong>
                                @else
                                    <strong style="color: red">Out of stock</strong>
                                @endif
                            </li>
                            <li class="list-inline-item text-muted">Category: <strong>{{$product->ProductCategory->name}}</strong></li>
                        </ul>
                        @if($product->productDiscount->amount != 0)
                            <b style="color: red"><strike>৳{{ $product->price }}</strike></b>
                        @endif
                        <h3 class="pb-2" price="{{ number_format($product->price - $product->productDiscount->amount, 2) }}">৳{{ number_format($product->price - $product->productDiscount->amount, 2) }}</h3>
                        <div class="form-group product__option">
                            <label class="product__option-label" for="product-quantity">Quantity</label>
                            <form action="{{ route('cart') }}" method="post">
                                @csrf
                                <div class="product__actions">
                                    <input type="hidden" value="{{$product->id}}" name="product_id">
                                    <div class="product__actions-item">
                                        <div class="input-number product__quantity">
                                            <input id="product-quantity" name="product_qty" class="input-number__input form-control form-control-lg" type="number" min="1" value="1" >
                                            <div class="input-number__add"></div>
                                            <div class="input-number__sub"></div>
                                        </div>
                                    </div>

                                    <div class="product__actions-item product__actions-item--addtocart">
                                        @if($product->quantity != 0)
                                            <button class="btn btn-primary" id="add_to_cart" value="submit" type="submit">Add to Cart</button>
                                        @else
                                            <li class="list-inline-item"><button class="btn btn-primary disabled">Add to Cart</button></li>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('footer_section')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script>

    </script>
@endsection
