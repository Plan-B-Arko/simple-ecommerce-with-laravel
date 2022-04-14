@extends('layouts.front_layouts.front_layout')

@section('header_section')
    <style>
        .checked {
            color: orange;
        }
    </style>
@endsection

@section('slider')
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        </ol>
        <div class="carousel-inner">
            @foreach($slider as $key => $s)
                <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                    <a href="{{ url('/single/product/'.$s->id) }}"><img src="{{asset('admin/product/'.$s->image)}}" class="d-block w-100"  alt="..."></a>
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="text-secondary">{{ $s->name }}</h2>
                        <h4 class="text-secondary">{{ \Illuminate\Support\Str::limit($s->description, 100, $end='...') }}</h4>
                        <a href="{{ url('/single/product/'.$s->id) }}" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button"  data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true">     </span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
@endsection

@section('block_feature')
    <div class="container pt-5">
        <div class="block-features__list">
            <div class="block-features__item">
                <div class="block-features__icon">
                    <svg width="48px" height="48px">
                        <use xlink:href="images/sprite.svg#fi-free-delivery-48"></use>
                    </svg>
                </div>
                <div class="block-features__content">
                    <div class="block-features__title">Safely Shipping</div>
                    <div class="block-features__subtitle">Only ৳25.00 shipping charge</div>
                </div>
            </div>
            <div class="block-features__divider"></div>
            <div class="block-features__item">
                <div class="block-features__icon">
                    <svg width="48px" height="48px">
                        <use xlink:href="images/sprite.svg#fi-24-hours-48"></use>
                    </svg>
                </div>
                <div class="block-features__content">
                    <div class="block-features__title">Support 24/7</div>
                    <div class="block-features__subtitle">Call us anytime</div>
                </div>
            </div>
            <div class="block-features__divider"></div>
            <div class="block-features__item">
                <div class="block-features__icon">
                    <svg width="48px" height="48px">
                        <use xlink:href="images/sprite.svg#fi-payment-security-48"></use>
                    </svg>
                </div>
                <div class="block-features__content">
                    <div class="block-features__title">100% Safety</div>
                    <div class="block-features__subtitle">Only secure payments</div>
                </div>
            </div>
            <div class="block-features__divider"></div>
            <div class="block-features__item">
                <div class="block-features__icon">
                    <svg width="48px" height="48px">
                        <use xlink:href="images/sprite.svg#fi-tag-48"></use>
                    </svg>
                </div>
                <div class="block-features__content">
                    <div class="block-features__title">Hot Offers</div>
                    <div class="block-features__subtitle">Discounted food also available</div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- .block-features / end -->

    <div class="container mydiv">
        <h3 class="text-center text-dark feature-product" style="text-decoration-color: orange">Featured Foods</h3>
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-4" >
                <!-- bbb_deals -->
                <div class="bbb_deals">
                    <div class="bbb_deals_title text-center">{{ $product->name }}</div>
                    <div class="bbb_deals_slider_container">
                        <div class=" bbb_deals_item">
                            <div class="bbb_deals_image"><a href="{{ url('/single/product/'.$product->id) }}"><img src="{{ asset('admin/product/'.$product->image) }}" alt=""></a></div>
                            <div class="bbb_deals_content">
                                <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                    <div class="bbb_deals_item_category">Category: {{ $product->ProductCategory->name }}</div>
                                    @if($product->productDiscount->amount != 0)
                                    <div class="bbb_deals_item_price_a ml-auto"><strike>৳{{ $product->price }}</strike></div>
                                    @endif
                                </div>
                                <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                    <div class="bbb_deals_item_name"><a style="font-size: 18px" href="{{ url('/single/product/'.$product->id) }}" >Details</a></div>
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
                                        <div class="sold_stars ml-auto"></div>
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

    <!-- .block-product-columns -->
    <div class="block block-product-columns d-lg-block d-none">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4 class="text-center pb-3" style="text-decoration: underline; text-decoration-color: orange">Top Rated Food</h4>
                    @foreach($reviews as $review)
                        <div class="col-md-12 pt-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="{{ url('/single/product/'.$review->id) }}"><img src="{{asset('/admin/product/'.$review->image)}}" height="100%" width="100%" alt=""></a>
                                </div>
                                <div class="col-md-8 pt-2">
                                    <p style="line-height: 1">{{ $review->name }}</p>
                                    @if($review->productDiscount->amount != 0)
                                        <p style="line-height: 1">Regular Price: <strike style="color: red">৳{{ $review->price }}</strike></p>
                                        <p style="line-height: 0">Discount Price: ৳{{ number_format($review->price - $review->productDiscount->amount, 2) }}</p>
                                    @else
                                        <p style="line-height: 1">Price: ৳{{ $review->price }} </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-4" style="border-left: 3px solid orange">
                    <h4 class="text-center pb-3" style="text-decoration: underline; text-decoration-color: orange">Special Offers</h4>
                    @foreach($special_offers as $special_offer)
                        @if(!empty($special_offer))
                            <div class="col-md-12 pt-3">
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="{{ url('/single/product/'.$special_offer->id) }}"><img src="{{asset('/admin/product/'.$special_offer->image)}}" height="100%" width="100%" alt=""></a>
                                    </div>
                                    <div class="col-md-8 pt-2">
                                        <p style="line-height: 1">{{ $special_offer->name }}</p>
                                        @if($special_offer->productDiscount->amount != 0)
                                            <p style="line-height: 1">Regular Price: <strike style="color: red">৳{{ $special_offer->price }}</strike></p>
                                            <p style="line-height: 0">Discount Price: ৳{{ number_format($special_offer->price - $special_offer->productDiscount->amount, 2) }}</p>
                                        @else
                                            <p style="line-height: 1">Price: ৳{{ $special_offer->price }} </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-4" style="border-left: 3px solid orange">
                    <h4 class="text-center pb-3" style="text-decoration: underline; text-decoration-color: orange">Best Selling Food</h4>
                    @foreach($bsfs as $bsf)
                    <div class="col-md-12 pt-3">
                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{ url('/single/product/'.$bsf->id) }}"><img src="{{asset('/admin/product/'.$bsf->image)}}" height="100%" width="100%" alt=""></a>
                            </div>
                            <div class="col-md-8 pt-2">
                                <p style="line-height: 1">{{ $bsf->name }}</p>
                                @if($bsf->productDiscount->amount != 0)
                                    <p style="line-height: 1">Regular Price: <strike style="color: red">৳{{ $bsf->price }}</strike></p>
                                    <p style="line-height: 0">Discount Price: ৳{{ number_format($bsf->price - $bsf->productDiscount->amount, 2) }}</p>
                                @else
                                    <p style="line-height: 1">Price: ৳{{ $bsf->price }} </p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- .block-product-columns / end -->
@endsection

@section('footer_section')
@endsection
