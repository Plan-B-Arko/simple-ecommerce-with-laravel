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
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Restaurant Name</th>
                        <th scope="col" class="text-center">Rating</th>
                    </tr>
                    </thead>
                    <tbody class="cart-table__body">
                    <?php
                        $i = 1;
                    ?>
                    @foreach($top_restaurants as $top_restaurant)
                        <tr>
                            <th scope="col" class="text-center"><?php echo $i++; ?></th>
                            <td class="align-middle text-center">{{ $top_restaurant->restaurant_name }}</td>
                            <td class="align-middle text-center">{{ $top_restaurant->rating }}</td>
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
