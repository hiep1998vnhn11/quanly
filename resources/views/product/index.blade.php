@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">
            Toàn bộ phụ tùng
        </li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header flex-sb">
            <i class="fa fa-table"></i>
            Toàn bộ phụ tùng

            <a href="{{ route('product.create') }}" class="btn_1 gray delete wishlist_close">
                <i class="fa fa-fw fa-times-circle-o"></i>
                Tạo phụ tùng mới
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>mã</th>
                            <th>Tên phụ tùng</th>
                            <th>Tên loại xe</th>
                            <th>Tên thương hiệu</th>
                            <th>Tên Nhà cung cấp</th>
                            <th>Giá xịn</th>
                            <th>Giá tàu</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    @if (count($products) > 5)
                        <tfoot>
                            <tr>
                                <th>mã</th>
                                <th>Tên phụ tùng</th>
                                <th>Tên loại xe</th>
                                <th>Tên thương hiệu</th>
                                <th>Tên Nhà cung cấp</th>
                                <th>Giá xịn</th>
                                <th>Giá tàu</th>
                                <th>Hành động</th>
                            </tr>
                        </tfoot>
                    @endif
                    <tbody>
                        @foreach ($products as $product)
                            <tr class="product-row" data-id="{{ $product->id }}">
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->sub_name }}</td>
                                <td>{{ $product->category_name }}</td>
                                <td>{{ $product->provider_name }}</td>
                                <td>{{ $product->good_price }}</td>
                                <td>{{ $product->bad_price }}</td>
                                <td>
                                    <a href="{{ route('product.show', ['product' => $product->id]) }}" class="btn_1 gray">
                                        <i class="fa fa-fw fa-eye"></i>
                                        Xem
                                    </a>
                                    <a href="{{ route('product.edit', ['product' => $product->id]) }}"
                                        class="btn_1 gray">
                                        <i class="fa fa-fw fa-pencil"></i>
                                        Sửa
                                    </a>
                                    <a data-id="{{ $product->id }}" class="btn_1 gray delete btn-delete-product">
                                        <i class="fa fa-fw fa-trash"></i>
                                        Xoá
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    {{ $products->links() }}
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.btn-delete-product').on('click', function() {
                const id = $(this).data('id')
                Swal.fire({
                    title: 'Bạn chắc chưa??',
                    text: 'Xoá vĩnh viễn hãng xe này đi và sẽ không thể đảo ngược',
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
                                    'Đã xoá thương hiệu này!',
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
