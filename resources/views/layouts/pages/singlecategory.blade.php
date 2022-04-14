@extends('layouts.backend_layout.backend_layout')

@section('header_section')
@endsection

@section('slider')
@endsection

@section('block_feature')
@endsection

@section('content')
    <div class="container mydiv">
        <div class="row pb-5">
            <div class="col-md-4">
                <form class="form-inline" action="{{ route('dashboard_search') }}" method="post">
                    @csrf
                    <input type="hidden" name="cat_id" value="{{ $search_category->id }}">
                    <input type="hidden" name="cat_name" value="{{ $search_category->name }}">
                    <label for="min" style="padding: 7px">Min: </label>
                    <input type="text" class="text-center" id="min" name="min" value="0" style="width: 65px">
                    <label for="max" style="padding: 7px">Max: </label>
                    <input type="text" class="text-center" id="max" name="max" value="0" style="width: 65px">
                    <div style="padding-left: 8px">
                        <button class="btn btn-primary" value="submit" type="submit">Search</button>
                    </div>
                </form>
            </div>

            <div class="col-md-4">
                <h3 class="text-center text-dark feature-product text-center" style="text-decoration-color:
                 orange">{{ $search_category->name}}</h3>
            </div>
            <div class="col-md-4"></div>
        </div>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <!-- bbb_deals -->
                    <div class="bbb_deals">
                        <div class="bbb_deals_title text-center">{{ $product->name }}</div>
                        <div class="bbb_deals_slider_container">
                            <div class=" bbb_deals_item">
                                <div class="bbb_deals_image"><a href="{{ url('dashboard/single/product/'.$product->id) }}"><img src="{{ asset('admin/product/'.$product->image) }}" alt=""></a></div>
                                <div class="bbb_deals_content">
                                    <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                        <div class="bbb_deals_item_category"><a href="#">{{ $product->ProductCategory->name }}</a></div>
                                        @if($product->productDiscount->amount != 0)
                                            <div class="bbb_deals_item_price_a ml-auto"><strike>৳{{ $product->price }}</strike></div>
                                        @endif
                                    </div>
                                    <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                        <div class="bbb_deals_item_name"><a style="font-size: 18px" href="{{ url('dashboard/single/product/'.$product->id) }}" >Details</a></div>
                                        <div class="bbb_deals_item_price ml-auto"><b>৳</b>{{ number_format($product->price - $product->productDiscount->amount, 2) }}</div>
                                    </div>
                                    <div class="available">
                                        <div class="available_line d-flex flex-row justify-content-start">
                                            <div class="available_title">Available: <span>
                                                    @if($product->quantity !=0)
                                                        <strong style="color: green">( In stock )</strong>
                                                    @else
                                                        <strong style="color: red">Out of stock</strong>
                                                    @endif

                                                </span></div>
                                        </div>
                                        <div class="available_bar"><span style="width:17%"></span></div>
                                    </div>
                                    <div class="pt-3">
                                        <form action="{{ route('cart') }}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{$product->id}}" name="product_id">
                                            <input type="hidden" value="1" name="product_qty">
                                            <button class="btn btn-primary btn-block">Add to Cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('footer_section')

@endsection
