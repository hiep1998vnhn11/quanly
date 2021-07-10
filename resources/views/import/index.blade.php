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
<form action="/import" method="get">
  <div class="row mb-3">
    <div class="col-md-12 col-sm-12">
      <div class="form-group">
        <label>Tìm kiếm tất cả</label>
        <div class="input-group">
          <input class="form-control search-top" type="text" placeholder="Tìm kiếm phụ kiện hoặc mã" name="search"
            value="{{Request::get('search')}}">
          <span class="input-group-btn">
            <button class="btn btn-primary" type="submit">
              <i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-sm-12">
      <div class="form-group">
        <label>Tìm kiếm mã</label>
        <div class="input-group">
          <input class="form-control search-top" type="text" placeholder="Tìm kiếm phụ kiện hoặc mã" name="code"
            value="{{Request::get('code')}}">
          <span class="input-group-btn">
            <button class="btn btn-primary" type="submit">
              <i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-sm-12">
      <div class="form-group">
        <label>Tìm kiếm tên</label>
        <div class="input-group">
          <input class="form-control search-top" name="name" value="{{Request::get('name')}}" type="text"
            placeholder="Tìm kiếm phụ kiện hoặc mã">
          <span class="input-group-btn">
            <button class="btn btn-primary" type="submit">
              <i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-sm-12">
      <div class="form-group">
        <label>Tìm kiếm thông tin</label>
        <div class="input-group">
          <input class="form-control search-top" name="description" value="{{Request::get('description')}}" type="text"
            placeholder="Tìm kiếm phụ kiện hoặc mã">
          <span class="input-group-btn">
            <button class="btn btn-primary" type="submit">
              <i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-sm-12">
      <div class="form-group">
        <label>Tìm kiếm Alias</label>
        <div class="input-group">
          <input class="form-control search-top" name="alias" value="{{Request::get('alias')}}" type="text"
            placeholder="Tìm kiếm phụ kiện hoặc mã">
          <span class="input-group-btn">
            <button class="btn btn-primary" type="submit">
              <i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </div>
    </div>
  </div>
</form>
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
            <th>Tên</th>
            <th>Thông tin</th>
            <th>Alias</th>
            <th>Loại</th>
            <th>Đơn vị tính</th>
            <th>Giá nhập</th>
            <th>Giá bán lẻ</th>
            <th>Giá bán buôn</th>
            <th>DVT</th>
            <th style="width: 50px">#</th>
          </tr>
        </thead>
        @if (count($parts) > 5)
        <tfoot>
          <tr>
            <th>mã</th>
            <th>Tên</th>
            <th>Thông tin</th>
            <th>Alias</th>
            <th>Loại</th>
            <th>Đơn vị tính</th>
            <th>Giá nhập</th>
            <th>Giá bán lẻ</th>
            <th>Giá bán buôn</th>
            <th>DVT</th>
            <th>#</th>
          </tr>
        </tfoot>
        @endif
        <tbody>
          @foreach ($parts as $part)
          <tr class="product-row" data-id="{{ $part->id }}">
            <td>{{ $part->code }}</td>
            <td>{{ $part->name }}</td>
            <td>{{ $part->description }}</td>
            <td>{{ $part->alias }}</td>
            <td>{{ $part->category }}</td>
            <td>{{ $part->unit }}</td>
            <td>{{ $part->import_price }}</td>
            <td>{{ $part->retail_price }}</td>
            <td>{{ $part->sale_price }}</td>
            <td>{{ $part->DVT }}</td>
            <td>
              <a href="{{ route('product.show', ['product' => $part->id]) }}" class="btn_1 gray">
                <i class="fa fa-fw fa-eye"></i>
                Xem
              </a>
              <a href="{{ route('product.edit', ['product' => $part->id]) }}" class="btn_1 gray">
                <i class="fa fa-fw fa-pencil"></i>
                Sửa
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
        {{ $parts->links() }}
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