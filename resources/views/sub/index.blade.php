@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/">Trang chủ</a>
        </li>
        <li class="breadcrumb-item active">
            Toàn bộ Loại xe
        </li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header flex-sb">
            <i class="fa fa-table"></i>
            Toàn bộ loại xe

            <a href="{{ route('sub.create') }}" class="btn_1 gray delete wishlist_close">
                <i class="fa fa-fw fa-times-circle-o"></i>
                Tạo xe mới
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Tên xe</th>
                            <th>Tên thương hiệu</th>
                            <th>Mã xe(Nếu có)</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    @if (count($subs) > 5)
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Tên xe</th>
                                <th>Tên thương hiệu</th>
                                <th>Mã xe(Nếu có)</th>
                                <th>Hành động</th>
                            </tr>
                        </tfoot>
                    @endif
                    <tbody>
                        @foreach ($subs as $sub)
                            <tr class="sub-row" data-id="{{ $sub->id }}">
                                <td>{{ $sub->id }}</td>
                                <td>{{ $sub->name }}</td>
                                <td>{{ $sub->category_name }}</td>
                                <td>{{ $sub->code }}</td>
                                <td>
                                    <a href="{{ route('sub.show', ['sub' => $sub->id]) }}" class="btn_1 gray">
                                        <i class="fa fa-fw fa-eye"></i>
                                        Xem
                                    </a>
                                    <a href="{{ route('product.search') . '?sub=' . $sub->id }}" class="btn_1 gray">
                                        <i class="fa fa-fw fa-eye"></i>
                                        Xem sản phẩm
                                    </a>
                                    <a href="{{ route('sub.edit', ['sub' => $sub->id]) }}" class="btn_1 gray">
                                        <i class="fa fa-fw fa-pencil"></i>
                                        Sửa
                                    </a>
                                    <a data-id="{{ $sub->id }}" class="btn_1 gray delete btn-delete-sub">
                                        <i class="fa fa-fw fa-trash"></i>
                                        Xoá
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.btn-delete-sub').on('click', function() {
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
                            url: `/sub/${id}`,
                            method: 'DELETE',
                            data: {
                                "_token": "{{ csrf_token() }}",
                            },
                            success() {
                                $('.sub-row').each(function() {
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
