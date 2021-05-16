@extends('layouts.app')

@section('content')

    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Trang chủ</li>
    </ol>
    <!-- Icon Cards-->
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card dashboard text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-envelope-open"></i>
                    </div>
                    <div class="mr-5">
                        <h5>{{ $productCount }} Sản phẩm</h5>
                    </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ route('product.search') }}">
                    <span class="float-left">Xem toàn bộ</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card dashboard text-white bg-warning o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-star"></i>
                    </div>
                    <div class="mr-5">
                        <h5>{{ $categoryCount }} Thương hiệu</h5>
                    </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ route('category.index') }}">
                    <span class="float-left">Xem toàn bộ</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card dashboard text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-calendar-check-o"></i>
                    </div>
                    <div class="mr-5">
                        <h5>{{ $subCount }} Loại xe</h5>
                    </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ route('sub.index') }}">
                    <span class="float-left">Xem toàn bộ</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card dashboard text-white bg-danger o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-heart"></i>
                    </div>
                    <div class="mr-5">
                        <h5>{{ $providerCount }} Nhà cung cấp</h5>
                    </div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ route('provider.index') }}">
                    <span class="float-left">Xem toàn bộ</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
    <!-- /cards -->
    <h2></h2>
    <div class="box_general padding_bottom">
        <div class="header_box version_2">
            <h2><i class="fa fa-bar-chart"></i>Statistic</h2>
        </div>
        <canvas id="myAreaChart" width="100%" height="30" style="margin:45px 0 15px 0;"></canvas>
    </div>
@endsection
