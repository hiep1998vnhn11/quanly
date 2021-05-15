@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="/">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            Toàn bộ thương hiệu
        </li>
    </ol>
    <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header flex-sb">
            <i class="fa fa-table"></i>
            Toàn bộ thương hiệu

            <a href="{{ route('category.create') }}" class="btn_1 gray delete wishlist_close">
                <i class="fa fa-fw fa-times-circle-o"></i>
                Tạo thương hiệu mới
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Tên thương hiệu</th>
                            <th>Mã thương hiệu(Nếu có)</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    @if (count($categories) > 5)
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Tên thương hiệu</th>
                                <th>Mã thương hiệu(Nếu có)</th>
                                <th>Hành động</th>
                            </tr>
                        </tfoot>
                    @endif
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->code }}</td>
                                <td>
                                    <a href="{{ route('category.show', ['category' => $category->id]) }}"
                                        class="btn_1 gray">
                                        <i class="fa fa-fw fa-user"></i>
                                        Xem
                                    </a>
                                    <a href="{{ route('category.edit', ['category' => $category->id]) }}"
                                        class="btn_1 gray">
                                        <i class="fa fa-fw fa-user"></i>
                                        Sửa
                                    </a>
                                    <a data-id="{{ route('category.edit', ['category' => $category->id]) }}"
                                        class="btn_1 gray btn-delete-category">
                                        <i class="fa fa-fw fa-user"></i>
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

    <script>
        $('.btn-delete-category').on('click', function() {
            console.log($(this).data('id'))
        });

    </script>
@endsection
