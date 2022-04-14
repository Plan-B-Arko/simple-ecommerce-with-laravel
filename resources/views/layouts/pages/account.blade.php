@extends('layouts.front_layouts.front_layout')

@section('header_section')
@endsection

@section('content')
    <div class="site__body">
        <div class="page-header">
            <div class="page-header__container container">
                <div class="page-header__title">
                    <h1>My Account</h1></div>
            </div>
        </div>
        <div class="block">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d-flex">
                        <div class="card flex-grow-1 mb-md-0">
                            <div class="card-body">
                                <h3 class="card-title">Login</h3>
                                @if (session('logindanger'))
                                    <div class="alert alert-danger">
                                        {{ session('logindanger') }}
                                    </div>
                                @endif
                                <form action="{{ route('login') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" class="form-control" placeholder="Enter email" name="email" id="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Password" name="password" id="password" required> <small class="form-text text-muted"><a href="#">Forgotten Password</a></small></div>
                                    <div class="form-group">
                                        <div class="form-check"><span class="form-check-input input-check"><span class="input-check__body"><input class="input-check__input" type="checkbox" id="login-remember"> <span class="input-check__box"></span>
												<svg class="input-check__icon" width="9px" height="7px">
													<use xlink:href="images/sprite.svg#check-9x7"></use>
												</svg>
												</span>
												</span>
                                            <label class="form-check-label" for="login-remember">Remember Me</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex mt-4 mt-md-0">
                        <div class="card flex-grow-1 mb-0">
                            <div class="card-body">
                                <h3 class="card-title">Register</h3>
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
                                <form action="{{ route('register') }}" method="post" id="registration">
                                    @csrf
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" class="form-control" placeholder="Enter email" required name="email" id="email">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Password" required name="password" id="password">
                                    </div>
                                    <div class="form-group">
                                        <label>Repeat Password</label>
                                        <input type="password" class="form-control" placeholder="Password" required name="repeat_pass" id="repeat_pass">
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4" value="submit">Register</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_section')
    <script>
        var form = $("#registration");
        var validator = form.validate();
    </script>

@endsection
