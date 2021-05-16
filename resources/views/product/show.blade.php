@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">
            Phụ tùng: {{ $product->name }}
        </li>
    </ol>
    <div class="box_general">
        <div class="header_box flex-sb">
            <h2 class="d-inline-block">{{ $product->name }}</h2>

        </div>
        <div class="list_general">
            <ul>
                <li>
                    <figure>
                        @if ($images)
                            <img src="{{ '/' . $images[0]->folder . '/' . $images[0]->name }}" alt="">
                        @endif
                    </figure>
                    <h4>Thông tin chi tiết</h4>
                    <ul class="booking_details">
                        <li>Mã phụ tùng: <strong>{{ $product->code }}</strong></li>
                        <li>NĂm sản xuất:<strong>{{ $product->year }}</strong></li>
                        <li>Loại xe:
                            <strong>
                                <a href="{{ route('sub.show', ['sub' => $product->sub_id]) }}">
                                    {{ $sub->name }}
                                </a>
                            </strong>
                        </li>
                        <li>Thương hiệu:
                            <strong>
                                <a href="{{ route('category.show', ['category' => $product->category_id]) }}">
                                    {{ $category->name }}
                                </a>
                            </strong>
                        </li>
                        <li>Nhà cung cấp:
                            <strong>
                                <a href="{{ route('provider.show', ['provider' => $product->provider_id]) }}">
                                    {{ $provider->name }}
                                </a>
                            </strong>
                        </li>
                        <li>Địa chỉ Nhà cung cấp:
                            <strong>
                                {{ $provider->address }}
                            </strong>
                        </li>
                        <li>Giá hàng xịn:
                            <strong>{{ $product->good_price }}</strong>
                        </li>
                        <li>Giá hàng tàu:<strong>{{ $product->bad_price }}</strong></li>
                        <li>Ngày tạo:<strong>{{ $product->created_at }}</strong></li>
                        <li>Ngày sửa:<strong>{{ $product->updated_at }}</strong></li>
                    </ul>
                    <ul class="buttons">
                        <li>
                            <a href="#0" class="btn_1 gray approve"><i class="fa fa-fw fa-check-circle-o"></i>
                                Thêm ảnh
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="row">
            @foreach ($images as $image)
                <div class="col-md-3">
                    <img src="{{ '/' . $image->folder . '/' . $image->name }}" class="image-product">
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Thêm ảnh vào sản phẩm (Lưu ý là chỉ thêm vào ảnh)</label>
                    <form action="{{ route('product.upload', ['product' => $product->id]) }}" class="dropzone"
                        id="product-dropzone" enctype="multipart/form-data">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/dropzone.min.js') }}"></script>
@endsection
