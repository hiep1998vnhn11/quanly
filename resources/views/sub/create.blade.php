@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/">Trang chủ</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('sub.index') }}">Toàn bộ loại xe</a>
        </li>
        <li class="breadcrumb-item active">Tạo mới</li>
    </ol>

    <form method="POST" action="{{ route('sub.store') }}">
        @csrf
        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-file"></i>Tạo mới loại xe</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tên</label>
                        <input id="name" name="name" type="text" class="form-control" placeholder="Tên loại  xe">
                    </div>
                    @error('name')
                        <div class="alert alert-danger">
                            Hãy nhập tên xe lớn hơn 3 ký tự
                        </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Mã xe(nếu có - Tối đa 20 ký tự)</label>
                        <input id="code" name="code" type="text" class="form-control" placeholder="Mã xe">
                    </div>
                    @error('code')
                        <div class="alert alert-danger">
                            Mã xe phải nhỏ hơn 20 ký tự
                        </div>
                    @enderror
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
            </div>
            <button type="submit" class="btn_1 medium">Tạo mới</button>
            <!-- /row-->
        </div>
    </form>

@endsection
