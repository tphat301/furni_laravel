@extends('admin.index')

@section('title', "Thêm mới đăng ký nhận tin")

@section('content')
  <section class="content-header text-sm">
    <div class="container-fluid">
      <div class="row">
        <ol class="breadcrumb float-sm-left">
          <li class="breadcrumb-item">
            <a href="{{url('admin/dashboard')}}" title="{{ config('admin.dashboard.name') }}">
              {{ config('admin.dashboard.name') }}
            </a>
          </li>
          <li class="breadcrumb-item active">
            Thêm mới đăng ký nhận tin
          </li>
        </ol>
      </div>
    </div>
  </section>

  <section class="content">
    {!! Form::open(['name' => 'form-newsletter-detail', 'route' => ['admin.newsletter.save'], 'class' => ['form-product-detail'], 'files' => true, 'novalidate' => true]) !!}
      <div class="card-footer text-sm sticky-top">
        <button type="submit" name="save" class="btn btn-sm bg-gradient-primary submit-check">
          <i class="far fa-save mr-2"></i>Lưu
        </button>
        <a class="btn btn-sm bg-gradient-danger" href="{{ route('admin.newsletter.index') }}" title="Thoát">
          <i class="fas fa-sign-out-alt mr-2"></i>Thoát
        </a>
      </div>

      <div class="card card-primary card-outline text-sm">
        <div class="card-header">
          <h3 class="card-title">
            Thêm mới đăng ký nhận tin
          </h3>
        </div>
        <div class="card-body">
          <div class="form-group">
            <div class="upload-file mb-2">
              <p>
                Upload tập tin:
              </p>
              <label for="file_attach" class="upload-file-label mb-2">
                <div class="custom-file my-custom-file">
                  <input type="file" class="custom-file-input" name="file_attach" id="file_attach"/>
                  <label for="file_attach" class="custom-file-label mb-0" data-browse="Chọn">
                    Chọn file
                  </label>
                </div>
              </label>
              <strong class="d-block text-sm">
                {{config('admin.message.newsletter.file_upload')}}
              </strong>
              @error('file_attach')
                <small class="text-sm text-danger">
                  {{ $message }}
                </small>
              @enderror
            </div>
          </div>
          <div class="form-group-category row">
            <div class="form-group col-md-4">
              <label for="fullname">
                Họ tên:
              </label>
              <input type="text" class="form-control text-sm" name="fullname" id="fullname" placeholder="Họ tên"/>
            </div>
            <div class="form-group col-md-4">
              <label for="email">Email:</label>
              <input type="email" class="form-control text-sm" name="email" id="email" placeholder="Email"/>
              @error('email')
                <small class="text-sm text-danger">
                  {{ $message }}
                </small>
              @enderror
            </div>
            <div class="form-group col-md-4">
              <label for="phone">Điện thoại:</label>
              <input type="text" class="form-control text-sm" name="phone" id="phone" placeholder="Điện thoại"/>
              @error('phone')
                <small class="text-sm text-danger">
                  {{ $message }}
                </small>
              @enderror
            </div>
            <div class="form-group col-md-4">
              <label for="address">Địa chỉ:</label>
              <input type="text" class="form-control text-sm" name="address" id="address" placeholder="Địa chỉ"/>
            </div>
            <div class="form-group col-md-4">
              <label for="subject">Chủ đề:</label>
              <input type="text" class="form-control text-sm" name="subject" id="subject" placeholder="Chủ đề"/>
            </div>
            <div class="form-group col-md-4">
              <label for="confirm_status">Tình trạng:</label>
              <select name="confirm_status" id="confirm_status" class="form-select">
                <option value="0">Cập nhật tình trạng</option>
                <option value="1">Đã xem</option>
                <option value="2">Đã liên hệ</option>
                <option value="3">Đã thông báo</option>
              </select>
            </div>
            <div class="form-group">
              <label for="content">
                Nội dung:
              </label>
              <textarea name="content" id="content" class="form-control text-sm" rows="5" placeholder="Nội dung"></textarea>
            </div>
            <div class="form-group">
              <label for="notes">Ghi chú:</label>
              <textarea class="form-control text-sm" name="notes" id="notes" rows="5" placeholder="Ghi chú"></textarea>
            </div>
            <div class="form-group">
              <label for="num" class="d-inline-block align-middle mb-0 mr-2">Số thứ tự:</label>
              <input type="number" class="form-control form-control-mini d-inline-block align-middle" min="0" name="num" id="num" placeholder="Số thứ tự" value="1">
            </div>
          </div>
        </div>
      </div>
    {!! Form::close() !!}
  </section>
@endsection
