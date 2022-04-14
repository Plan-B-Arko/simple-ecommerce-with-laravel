<?php
    use App\Http\Controllers\AnalysisController;
    $totaluser = AnalysisController::total_user();
    $orderplaced = AnalysisController::orderPlaced();
    $ontheway = AnalysisController::ontheway();
    $delivered = AnalysisController::delivered();
    $review = AnalysisController::review();
    $contactRequest = AnalysisController::contact_request();
?>

@extends('layouts.backend_layout.admin_backend_layout')

@section('admin_header_script')
@endsection



@section('admin_content')
    @if (session('success'))
        <div class="text text-success text-center">
            <h3>{{ session('success') }}</h3>
        </div>
    @endif
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <p class="mb-0">Your business dashboard template</p>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Layout</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Blank</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="ti-user text-primary border-primary"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Total Customer</div>
                            <div class="stat-digit">{{ $totaluser }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="ti-user text-info border-info"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Order Placed</div>
                            <div class="stat-digit">{{ $orderplaced }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="ti-user text-danger border-danger"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Not Receive</div>
                            <div class="stat-digit">{{ $ontheway }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="ti-user text-success border-success"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Deliverd</div>
                            <div class="stat-digit">{{ $delivered }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="ti-layout-grid4-alt text-success border-success"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Total Review</div>
                            <div class="stat-digit">{{ $review }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block">
                            <i class="ti-user text-pink border-pink"></i>
                        </div>
                        <div class="stat-content d-inline-block">
                            <div class="stat-text">Contact Request</div>
                            <div class="stat-digit">{{ $contactRequest }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('admin_footer_script')
@endsection
