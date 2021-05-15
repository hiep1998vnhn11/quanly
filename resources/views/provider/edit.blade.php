@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="/provider">Toàn bộ nhà cung cấp</a>
        </li>
        <li class="breadcrumb-item active">Sửa</li>
    </ol>

    <form method="POST" action="{{ route('provider.update', ['provider' => $provider->id]) }}">
        @csrf
        @method('put')
        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-file"></i>Sửa nhà cung cấp</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tên</label>
                        <input id="name" value="{{ $provider->name }}" name="name" type="text" class="form-control"
                            placeholder="Tên nhà cung cấp">
                    </div>
                    @error('name')
                        <div class="alert alert-danger">
                            Hãy nhập tên nhà cung cấp lớn hơn 3 ký tự
                        </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Mã nhà cung cấp(nếu có - Tối đa 20 ký tự)</label>
                        <input id="code" name="code" value="{{ $provider->code }}" type="text" class="form-control"
                            placeholder="Mã nhà cung cấp">
                    </div>
                    @error('code')
                        <div class="alert alert-danger">
                            Mã nhà cung cấp phải nhỏ hơn 20 ký tự
                        </div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Mã nhà cung cấp(nếu có - Tối đa 20 ký tự)</label>
                        <input id="address" name="address" value="{{ $provider->code }}" type="text" class="form-control"
                            placeholder="Địa chỉ nhà cung cấp">
                    </div>
                    @error('address')
                        <div class="alert alert-danger">
                            Hãy nhập địa chỉ nhà cung cấp!
                        </div>
                    @enderror
                </div>
            </div>
            <!-- /row-->
            <button type="submit" class="btn_1 medium">Lưu</button>

        </div>
    </form>

@endsection
