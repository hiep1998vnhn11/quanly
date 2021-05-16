@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">Bookings</li>
    </ol>
    <div class="box_general">
        <div class="header_box">
            <h2 class="d-inline-block">Bookings List</h2>
            <div class="filter">
                <select name="orderby" class="selectbox">
                    <option value="Any status">Any status</option>
                    <option value="Approved">Approved</option>
                    <option value="Pending">Pending</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>
        </div>
        <div class="list_general">
            @if (count($products) == 0)
                Không có phụ tùng nào phù hợp
            @else
                <ul>
                    @foreach ($products as $product)
                        <li class="product-row" data-id="{{ $product->id }}">
                            <figure><img src="img/avatar1.jpg" alt=""></figure>
                            Tên phụ tùng:
                            <h4>{{ $product->name }} <i class="pending">Mới</i></h4>
                            <ul class="booking_details">
                                <li>Mã phụ tùng: <strong>{{ $product->code }}</strong></li>
                                <li>NĂm sản xuất:<strong>{{ $product->year }}</strong></li>
                                <li>Loại xe:
                                    <strong>
                                        <a href="{{ route('sub.show', ['sub' => $product->sub_id]) }}">
                                            {{ $product->sub_name }}
                                        </a>
                                    </strong>
                                </li>
                                <li>Thương hiệu:
                                    <strong>
                                        <a href="{{ route('category.show', ['category' => $product->category_id]) }}">
                                            {{ $product->category_name }}
                                        </a>
                                    </strong>
                                </li>
                                <li>Nhà cung cấp:
                                    <strong>
                                        <a href="{{ route('provider.show', ['provider' => $product->provider_id]) }}">
                                            {{ $product->provider_name }}
                                        </a>
                                    </strong>
                                </li>
                                <li>Địa chỉ Nhà cung cấp:
                                    <strong>
                                        {{ $product->provider_address }}
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
                                    <a href="{{ route('product.show', ['product' => $product->id]) }}"
                                        class="btn_1 gray approve">
                                        <i class="fa fa-fw fa-check-circle-o"></i>
                                        Xem chi tiết
                                    </a>
                                </li>
                                <li>
                                    <a class="btn_1 gray delete btn-delete-product" data-id="{{ $product->id }}">
                                        <i class="fa fa-fw fa-times-circle-o"></i>
                                        Xoá bỏ
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endforeach
                </ul>
                {{ $products->links('pagination::bootstrap-4') }}
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.btn-delete-product').on('click', function() {
                const id = $(this).data('id')
                Swal.fire({
                    title: 'Bạn chắc chưa??',
                    text: 'Xoá vĩnh viễn phụ tùng này này đi và sẽ không thể đảo ngược',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ok, hãy xoá đi',
                    cancelButtonText: 'Không, huỷ bỏ'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `/product/${id}`,
                            method: 'DELETE',
                            data: {
                                "_token": "{{ csrf_token() }}",
                            },
                            success() {
                                $('.product-row').each(function() {
                                    if ($(this).data('id') == id) {
                                        $(this).remove()
                                        return
                                    }
                                })
                                Swal.fire(
                                    'Thành công',
                                    'Đã xoá Phụ tùng này!',
                                    'success'
                                )
                            },
                            error() {
                                Swal.fire(
                                    'Thất bại',
                                    'Xoá phụ tùng thất bại!',
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
