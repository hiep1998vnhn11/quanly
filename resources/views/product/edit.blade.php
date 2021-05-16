@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/">Trang chủ</a>
        </li>
        <li class="breadcrumb-item">
            <a href="/product">Toàn bộ sản phẩm</a>
        </li>
        <li class="breadcrumb-item active">Tạo mới</li>
    </ol>
    <div class="box_general padding_bottom">
        <form method="POST" action="{{ route('product.store') }}">
            @csrf
            <div class="header_box version_2">
                <h2>
                    <i class="fa fa-file"></i>
                    Sửa Phụ tùng
                </h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tên phụ tùng</label>
                        <input type="text" name="name" value="{{ $product->name }}" class="form-control"
                            placeholder="Tên phụ tùng">
                    </div>
                    @error('name')
                        <div class="alert alert-danger">
                            Hãy nhập tên thương hiệu lớn hơn 3 ký tự
                        </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Năm sản xuất</label>
                        <input type="number" name="year" value="{{ $product->year }}" class="form-control"
                            placeholder="Năm sản xuất phụ tùng">
                    </div>
                    @error('year')
                        <div class="alert alert-danger">
                            Hãy nhập tên thương hiệu lớn hơn 3 ký tự
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Mã phụ tùng</label>
                        <input type="text" name="code" value="{{ $product->code }}" class="form-control"
                            placeholder="Tên phụ tùng">
                    </div>
                    @error('code')
                        <div class="alert alert-danger">
                            Hãy nhập code nhỏ hơn 20 ký tự
                        </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tên nhà cung cấp(Nếu chưa có, hãy tạo mới hãng trước)</label>
                        <select class="form-control" name="provider_id" value="{{ $product->provider_id }}">
                            @foreach ($providers as $provider)
                                <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                            @endforeach
                        </select>
                        @error('provider_id')
                            <div class="alert alert-danger">
                                Hãy chọn tên nhà cung cấp
                            </div>
                        @enderror
                    </div>
                </div>

            </div>
            <!-- /row-->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Giá xịn</label>
                        <input type="number" value="{{ $product->good_price }}" name="good_price" class="form-control"
                            placeholder="Giá hàng xịn">
                    </div>
                    @error('good_price')
                        <div class="alert alert-danger">
                            Hãy nhập giá hàng xịn của sản phẩm
                        </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Giá tàu</label>
                        <input type="number" name="bad_price" value="{{ $product->bad_price }}" class="form-control"
                            placeholder="Giá hàng tàu">
                    </div>
                    @error('bad_price')
                        <div class="alert alert-danger">
                            Hãy nhập giá hàng tàu của sản phẩm
                        </div>
                    @enderror
                </div>
            </div>
            <!-- /row-->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tên hãng(Nếu chưa có, hãy tạo mới hãng trước)</label>
                        <select class="form-control" name="category_id" value="{{ $product->category_id }}">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger">
                                Hãy nhập tên thương hiệu lớn hơn 3 ký tự
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tên xe(Nếu chưa có, hãy tạo mới trước)</label>
                        <select class="form-control" name="sub_id" value="{{ $product->sub_id }}">
                            @foreach ($subs as $sub)
                                <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                            @endforeach
                        </select>
                        @error('sub_id')
                            <div class="alert alert-danger">
                                Hãy nhập tên thương hiệu lớn hơn 3 ký tự
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- /row-->
            <p><button type="submit" class="btn_1 medium">Tạo mới</button></p>
        </form>
    </div>
    <!-- /box_general-->
@endsection
