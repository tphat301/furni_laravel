@extends('admin.index')

@section('title', 'Đăng ký nhận tin')

@section('content')
  <section class="content-header text-sm">
    <div class="container-fluid">
      <div class="row">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item">
            <a href="{{ url('admin/dashboard') }}" title="{{ config('admin.dashboard.name') }}">
              {{ config('admin.dashboard.name') }}
            </a>
          </li>
          <li class="breadcrumb-item active">
            Đăng ký nhận tin
          </li>
        </ol>
      </div>
    </div>
  </section>

  <section class="content">
    {!! Form::open(['name' => 'form-newsletter-list', 'class' => ['form-product-list']]) !!}
      <div class="card-footer text-sm sticky-top">
        <a class="btn btn-sm bg-gradient-success text-white" id="send-email" title="Gửi email">
          <i class="fas fa-paper-plane mr-2"></i>Gửi email
        </a>
        <a class="btn btn-sm bg-gradient-primary text-white" href="#" title="Thêm mới">
          <i class="fas fa-plus mr-2"></i>Thêm mới
        </a>
        <a data-url="#" class="btn btn-sm bg-gradient-danger text-white delete-all" id="delete-all">
          <i class="far fa-trash-alt mr-2"></i>Xóa tất cả
        </a>
        <div class="form-inline form-search d-inline-block align-middle ml-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar text-sm keyword" type="text" placeholder="Tìm kiếm" name="keyword" value=""/>
            <div class="input-group-append bg-primary rounded-right">
              <button class="btn btn-navbar text-white" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="card card-primary card-outline text-sm mb-0">
        <div class="card-header">
          <h3 class="card-title">
            Danh sách Đăng ký nhận tin
          </h3>
          <p class="d-block text-secondary w-100 float-left mb-0 mt-1">
            Chọn email sau đó kéo xuống dưới cùng danh sách này để có thể thiết lập nội dung email muốn gửi đi.
          </p>
        </div>
        <div class="card-body table-responsive p-0">
          <table class="table table-hover">
            <thead>
              <tr>
                <th class="align-middle" width="5%">
                  <div class="custom-control custom-checkbox my-checkbox">
                    <input type="checkbox" class="checkall custom-control-input" id="selectall-checkbox"/>
                    <label for="selectall-checkbox" class="custom-control-label"></label>
                  </div>
                </th>
                <th class="align-middle text-center" width="10%">STT</th>
                <th class="align-middle">Họ tên</th>
                <th class="align-middle">Email</th>
                <th class="align-middle">Điện thoại</th>
                <th class="align-middle">Download</th>
                <th class="align-middle">Ngày tạo</th>
                <th class="align-middle">Tình trạng</th>
                <th class="align-middle text-center">Thao tác</th>
              </tr>
            </thead>
            <tbody>
              @if ($rows->total() > 0)
                @foreach ($rows as $k => $row)
                  <tr>
                    <td class="align-middle">
                      <div class="custom-control custom-checkbox my-checkbox">
                        <input type="checkbox" name="checkitem[]" class="checkitem custom-control-input select-checkbox" id="select-checkbox-{{ $row->id }}" value="{{ $row->id }}"/>
                        <input type="hidden" name="hashes[]" value="{{ $row->hash }}"/>
                        <label for="select-checkbox-{{ $row->id }}" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td class="align-middle">
                      <input type="number" class="update-num form-control form-control-mini m-auto" min="0" value="{{ $row->num }}" data-id="{{ $row->id }}" data-url="{{ route('admin.news.update_number') }}"/>
                    </td>
                    <td class="align-middle">
                      <a href="" class="text-dark text-break" title="Đỗ Lâm Thành Phát">
                        Đỗ Lâm Thành Phát
                      </a>
                    </td>
                    <td class="align-middle">
                      <a href="" class="text-dark text-break" title="dolamthanhphat@gmail.com">
                        dolamthanhphat@gmail.com
                      </a>
                    </td>
                    <td class="align-middle">
                      0704138356
                    </td>
                    <td class="align-middle">
                      <a href="" class="bg-gradient-secondary text-white d-inline-block p-1 rounded" title="Tập tin trống">
                        <i class="fas fa-download mr-2"></i>
                        Tập tin trống
                      </a>
                      {{-- <a class="btn btn-sm bg-gradient-primary text-white d-inline-block p-1 rounded" href="../upload/file/tong-on-ngu-phap-tieng-anh-2904.pdf" title="Download tập tin"><i class="fas fa-download mr-2"></i>Download tập tin</a> --}}
                    </td>
                    <td class="align-middle">
                      09:32:56 PM - 25/03/2024
                    </td>
                    <td class="align-middle">
                      Đang chờ duyệt...
                    </td>
                    <td class="align-middle text-center text-md text-nowrap">
                      <a class="text-primary mr-2" href="{{ route('admin.news.show', [$row->id]) }}" title="Chỉnh sửa">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a class="text-danger delete-row" data-url="{{route('admin.news.delete', ['id' => $row->id])}}" title="Xóa" style="cursor: pointer">
                        <i class="fas fa-trash-alt"></i>
                      </a>
                    </td>
                  </tr>
                @endforeach
              @else
              <tr>
                <td colspan="12"><span class="text-danger">Danh sách đăng ký nhận tin trống</span></td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    {!! Form::close() !!}
    <div class="card card-primary card-outline text-sm mb-0 mt-3">
      {!! Form::open(['name' => 'form-sendmail-list', 'class' => ['form-sendmail-list']]) !!}
        <div class="card-header">
          <h3 class="card-title">
            Gửi email đến danh sách được chọn
          </h3>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="subject">
              Tiêu đề:
            </label>
            <input type="text" name="subject" id="subject" placeholder="Tiêu đề"/>
          </div>
          <div class="form-group">
            <label class="d-inline-block align-middle mb-1 mr-2">
              Upload tập tin:
            </label>
            <strong class="d-block mt-2 mb-2 text-sm">
              .doc|.docx|.pdf|.rar|.zip|.ppt|.pptx|.xls|.xlsx|.jpg|.png|.gif
            </strong>
            <div class="custom-file my-custom-file">
              <input type="file" class="custom-file-input" name="file" id="file"/>
              <label for="file" class="custom-file-label">
                Chọn file
              </label>
            </div>
            <div class="form-group">
              <label for="content">
                Nội dung thông tin:
              </label>
              <textarea class="form-control" name="content" id="content" rows="5" placeholder="Nội dung thông tin"></textarea>
            </div>
          </div>
        </div>
      {!! Form::close() !!}
    </div>
  </section>
@endsection
