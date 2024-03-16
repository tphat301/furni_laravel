@extends('admin.index')

@section('title', 'Sản phẩm')

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
            {{ config('admin.product.name') }}
          </li>
        </ol>
      </div>
    </div>
  </section>

  <section class="content">
    <form class="form-product-list" action="{{ route('admin.product.action') }}" method="GET">

      <div class="card-footer text-sm sticky-top">
        <a class="btn btn-sm bg-gradient-primary text-white" href="{{route('admin.product.create')}}" title="Thêm mới"><i class="fas fa-plus mr-2"></i>Thêm mới</a>

        <button type="submit" class="btn btn-sm bg-gradient-danger text-white delete-all" id="delete-all"><i class="far fa-trash-alt mr-2"></i>Xóa tất cả</button>


        {{-- <div class="form-inline form-search d-inline-block align-middle ml-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar text-sm keyword" type="text" placeholder="Tìm kiếm" aria-label="Tìm kiếm" value="" data-url="admin/product/index"/>
            <div class="input-group-append bg-primary rounded-right">
              <button onclick="onSearch('keyword')" class="btn btn-navbar text-white" type="button">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div> --}}
      </div>
      {{-- Tab category --}}
      @if (config('admin.product.category.active') === true)
        <div class="card-footer form-group-category text-sm bg-light row">
          <div class="form-group col-xl-2 col-lg-3 col-md-4 col-sm-4 mb-2">
            <select id="id_parent1" name="id_parent1" class="form-control filter-category-rendering select2 select2-hidden-accessible" data-field="id_parent1" tabindex="-1" data-url="admin/product/index" aria-hidden="true">
              <option>Danh mục cấp 1</option>
              <option value="68">Thời trang nổi bật nữ 2024</option>
              <option value="69">Thời trang nổi bật nam 2024</option>
            </select>
            {{-- <input type="hidden" name="_token_filter_category" value="1710333248"/> --}}
          </div>

          <div class="form-group col-xl-2 col-lg-3 col-md-4 col-sm-4 mb-2">
            <select id="id_parent2" name="id_parent2" class="form-control select2-hidden-accessible filter-category-rendering" data-url="admin/product/index" tabindex="-1" aria-hidden="true">
              <option>Danh mục cấp 2</option>
              <option value="70">Thời trang giá rẻ</option>
              <option value="71">Thời trang cao cấp dành cho nữ</option>
            </select>
          </div>
        </div>
      @endif

      {{-- Product item --}}
      <div class="card card-primary card-outline text-sm mb-0 rendering">
        <div class="card-header">
          <h3 class="card-title">
            Danh sách sản phẩm
          </h3>
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
                <th class="align-middle">Hình ảnh</th>
                <th class="align-middle" style="width:30%">Tiêu đề</th>
                @foreach (config('admin.product.status') as $key => $value)
                  <th class="align-middle text-center">{{$value}}</th>
                @endforeach
                <th class="align-middle text-center">Thao tác</th>
              </tr>
            </thead>
            <tbody>
              @if ($rows->total() > 0)
                @foreach ($rows as $key => $row)
                  <tr>
                    <td class="align-middle">
                      <div class="custom-control custom-checkbox my-checkbox">
                        <input type="checkbox" name="checkitem[]" class="checkitem custom-control-input select-checkbox" id="select-checkbox-{{ $row->id }}" value="{{ $row->id }}"/>
                        <input type="hidden" name="hashes[]" value="{{ $row->hash }}"/>
                        <label for="select-checkbox-{{ $row->id }}" class="custom-control-label"></label>
                      </div>
                    </td>
                    <td class="align-middle">
                      <input type="number" class="update-num-product form-control form-control-mini m-auto" min="0" value="{{ $row->num }}" data-id="{{ $row->id }}" data-table="{{ config('admin.product.table') }}"/>
                      {{-- <input name="_token_num" value="{{ time() }}" type="hidden"/> --}}
                    </td>
                    <td class="align-middle">
                      <a href="{{ route('admin.product.show', [$row->id]) }}" title="{{ $row->title }}">
                        @if (!empty($row->photo1))
                          <img class="rounded img-preview img-fluid" src="{{ url("public/upload/product/$row->photo1")  }}" alt="{{ $row->title }}" width="70" height="50" style="object-fit: contain;"/>
                        @else
                          <img class="rounded img-preview img-fluid" src="{{ url("resources/images/noimage.png")  }}" alt="{{ $row->title }}" width="70" height="50" style="object-fit: contain;"/>
                        @endif
                      </a>
                    </td>
                    <td class="align-middle">
                      <a class="text-dark text-break" href="{{ route('admin.product.show', [$row->id]) }}" title="{{ $row->title }}">
                        {{ $row->title }}
                      </a>
                    </td>
                    @foreach (config('admin.product.status') as $key => $value)
                      <td class="align-middle text-center">
                        <div class="custom-control custom-checkbox">
                          @php
                            $status = !empty($row->status) ? explode(",", $row->status) : [];
                          @endphp
                          <input type="checkbox" id="check-sst-product" class="check-sst-product custom-control-input" data-table="{{ config('admin.product.table') }}" name="{{ $key }}" data-id="{{ $row->id }}" {{ in_array($key, $status) ? 'checked' : '' }} />
                          <label for="check-sst-product" class="custom-control-label"></label>
                          <input name="_token" value="{{ time() }}" type="hidden"/>
                        </div>
                      </td>
                    @endforeach
                    <td class="align-middle text-center text-md text-nowrap">
                      <a class="text-primary mr-2" href="{{ route('admin.product.show', [$row->id]) }}" title="Chỉnh sửa">
                        <i class="fas fa-edit"></i>
                      </a>
                      <div class="dropdown d-inline-block align-middle">
                        <a id="dropdownCopy" href="{{ route('admin.product.copy', [$row->id]) }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link text-success p-0 pr-2" title="Copy">
                          <i class="far fa-clone"></i>
                        </a>
                      </div>
                      <a class="text-danger" data-url="{{route('admin.product.destroy', ['id' => $row->id, 'hash' => $row->hash])}}" id="delete-row" title="Xóa">
                        <i class="fas fa-trash-alt"></i>
                      </a>
                    </td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div>

      {{-- Phân trang --}}
    </form>
  </section>
@endsection
