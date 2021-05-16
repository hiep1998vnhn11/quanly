@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/">Trang chủ</a>
        </li>
        <li class="breadcrumb-item">
            <a href="/product">Toàn bộ thương hiệu</a>
        </li>
        <li class="breadcrumb-item active">Sửa</li>
    </ol>

    <form method="POST" action="{{ route('sub.update', ['sub' => $sub->id]) }}">
        @csrf
        @method('put')
        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-file"></i>Sửa thương hiệu</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tên</label>
                        <input id="name" value="{{ $sub->name }}" name="name" type="text" class="form-control"
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
                        <input id="code" name="code" value="{{ $sub->code }}" type="text" class="form-control"
                            placeholder="Mã hãng">
                    </div>
                    @error('code')
                        <div class="alert alert-danger">
                            Mã thương hiệu phải nhỏ hơn 20 ký tự
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tên hãng(Nếu chưa có, hãy tạo mới hãng trước)</label>
                    <select class="form-control" name="category_id">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="alert alert-danger">
                            Hãy chọn thương hiệu
                        </div>
                    @enderror
                </div>
            </div>
            <!-- /row-->
            <button type="submit" class="btn_1 medium">Lưu</button>

        </div>
    </form>

@endsection
