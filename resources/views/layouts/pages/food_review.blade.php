@extends('layouts.backend_layout.backend_layout')

@section('header_section')
@endsection


@section('content')
    <div class="site__body">
        <div class="page-header">
            <div class="page-header__container container">
                <div class="page-header__title">
                    <h1>Review List</h1>
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
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col" class="text-center">Image</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Status</th>
                        <th class="text-center">Review</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody class="cart-table__body">
                    @foreach($order_datas as $order_data)
                        <tr>
                            <td class="align-middle text-center">
                                <a href="{{ url('dashboard/single/product/'.$order_data->cart->product_id) }}">
                                    <img src="{{ asset('admin/product/'.$order_data->cart->product->image) }}" width="80px" height="80px" alt="">
                                </a>
                            </td>
                            <td class="align-middle text-center">{{ $order_data->cart->product->name }}</td>
                            <td class="align-middle text-center">
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

                            <td class="align-middle text-center">
                                <form action="{{ url('food/review/') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $order_data->cart->product_id }}">
                                    <input type="hidden" name="cart_id" value="{{ $order_data->cart->id }}">
                                <div class="form-group">
                                    <select class="form-control" id="review" name="review">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                            </td>
                            <td class="align-middle text-center">
                                <button class="btn btn-outline-primary">Review</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @foreach($reviewed as $reviews)
                        <tr>
                            <td class="align-middle text-center">
                                <a href="{{ url('dashboard/single/product/'.$reviews->product_id) }}">
                                    <img src="{{ asset('admin/product/'.$reviews->reviewedProduct->image) }}" width="80px" height="80px" alt="">
                                </a>
                            </td>
                            <td class="align-middle text-center">{{ $reviews->reviewedProduct->name }}</td>
                            <td class="align-middle text-center text-success">Delivered</td>
                            <td class="align-middle text-center">{{ $reviews->star }}</td>
                            <td class="align-middle text-center text-success">Reviewed</td>
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
