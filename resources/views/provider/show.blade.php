@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/">Trang chủ</a>
        </li>
        <li class="breadcrumb-item">
            <a href="/provider">Toàn bộ nhà cung cấp</a>
        </li>
        <li class="breadcrumb-item active">Sửa</li>
    </ol>

    <form method="POST" action="{{ route('provider.store') }}">
        @csrf
        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-file"></i>Sửa nhà cung cấp</h2>
                <a href="{{ route('product.search') . '?provider=' . $provider->id }}" class="btn_1 gray">
                    <i class="fa fa-fw fa-eye"></i>
                    Xem sản phẩm
                </a>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tên</label>
                        <input id="name" value="{{ $provider->name }}" name="name" type="text" class="form-control"
                            placeholder="Tên hãng sản xuất">
                    </div>
                    @error('name')
                        <div class="alert alert-danger">
                            Hãy nhập tên thương hiệu lớn hơn 3 ký tự
                        </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Mã thương hiệu(nếu có - Tối đa 20 ký tự)</label>
                        <input id="code" name="code" value="{{ $provider->code }}" type="text" class="form-control"
                            placeholder="Mã hãng">
                    </div>
                    @error('code')
                        <div class="alert alert-danger">
                            Mã thương hiệu phải nhỏ hơn 20 ký tự
                        </div>
                    @enderror
                </div>
            </div>
            <!-- /row-->
        </div>
        <button type="submit" class="btn_1 medium">Lưu</button>
    </form>

@endsection
