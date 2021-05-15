@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            Toàn bộ nhà cung cấp
        </li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header flex-sb">
            <i class="fa fa-table"></i>
            Toàn bộ nhà cung cấp

            <a href="{{ route('provider.create') }}" class="btn_1 gray delete wishlist_close">
                <i class="fa fa-fw fa-times-circle-o"></i>
                Tạo nhà cung cấp mới
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Tên nhà cung cấp</th>
                            <th>Địa chỉ</th>
                            <th>Mã nhà cung cấp(Nếu có)</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    @if (count($providers) > 5)
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Tên nhà cung cấp</th>
                                <th>Địa chỉ</th>
                                <th>Mã nhà cung cấp(Nếu có)</th>
                                <th>Hành động</th>
                            </tr>
                        </tfoot>
                    @endif
                    <tbody>
                        @foreach ($providers as $provider)
                            <tr class="provider-row" data-id="{{ $provider->id }}">
                                <td>{{ $provider->id }}</td>
                                <td>{{ $provider->name }}</td>
                                <td>{{ $provider->address }}</td>
                                <td>{{ $provider->code }}</td>
                                <td>
                                    <a href="{{ route('provider.show', ['provider' => $provider->id]) }}"
                                        class="btn_1 gray">
                                        <i class="fa fa-fw fa-eye"></i>
                                        Xem
                                    </a>
                                    <a href="{{ route('provider.edit', ['provider' => $provider->id]) }}"
                                        class="btn_1 gray">
                                        <i class="fa fa-fw fa-pencil"></i>
                                        Sửa
                                    </a>
                                    <a data-id="{{ $provider->id }}" class="btn_1 gray delete btn-delete-provider">
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
            $('.btn-delete-provider').on('click', function() {
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
                            url: `/provider/${id}`,
                            method: 'DELETE',
                            data: {
                                "_token": "{{ csrf_token() }}",
                            },
                            success() {
                                $('.provider-row').each(function() {
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
