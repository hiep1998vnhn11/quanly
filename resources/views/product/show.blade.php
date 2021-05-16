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
                        @if (isset($images[0]))
                            <img src="{{ '/' . 'storage/' . $images[0]->folder . '/' . $images[0]->name }}" alt="">
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
                            <strong>{{ $product->good_price }} đ</strong>
                        </li>
                        <li>Giá hàng tàu:<strong>{{ $product->bad_price }} đ</strong></li>
                        <li>Ngày tạo:<strong>{{ $product->created_at }}</strong></li>
                        <li>Ngày sửa:<strong>{{ $product->updated_at }}</strong></li>
                    </ul>

                </li>
            </ul>
        </div>

        <div class="row">
            @foreach ($images as $image)
                <div class="col-md-3 text-center image-row" data-id="{{ $image->id }}">
                    <a data-id="{{ $image->id }}" class="btn_1 gray delete btn-delete-image mb-3">
                        <i class="fa fa-fw fa-trash"></i>
                        Xoá ảnh này (bên dưới)
                    </a>
                    {{ $image->name }}
                    <img src="{{ '/' . 'storage/' . $image->folder . '/' . $image->name }}" class="image-product">
                </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Thêm ảnh vào sản phẩm (Lưu ý là chỉ thêm vào ảnh, và các ảnh trong cùng 1 phụ tùng tên phải khác
                        nhau)</label>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('.btn-delete-image').on('click', function() {
                const id = $(this).data('id')
                Swal.fire({
                    title: 'Bạn chắc chưa??',
                    text: 'Xoá vĩnh viễn ảnh này đi và sẽ không thể đảo ngược',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ok, hãy xoá đi',
                    cancelButtonText: 'Không, huỷ bỏ'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/image/${id}`,
                            method: 'DELETE',
                            data: {
                                "_token": "{{ csrf_token() }}",
                            },
                            success() {
                                $('.image-row').each(function() {
                                    if ($(this).data('id') == id) {
                                        $(this).remove()
                                        return
                                    }

                                })
                                Swal.fire(
                                    'Thành công',
                                    'Đã xoá ảnh này!',
                                    'success'
                                )
                            },
                            error() {
                                Swal.fire(
                                    'Thất bại',
                                    'Đã xoá thương hiệu này!',
                                    'error'
                                )
                            }
                        });
                    }
                });
            });
        });

    </script>
@endsection
