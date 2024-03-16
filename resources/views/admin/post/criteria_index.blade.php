@extends('admin.index')

@section('title', 'Tiêu chí')

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
            {{ config('admin.post.criteria.name') }}
          </li>
        </ol>
      </div>
    </div>
  </section>

  <section class="content">
    <form class="form-product-list" method="POST">
      {{-- Action --}}
      <div class="card-footer text-sm sticky-top">
        <a class="btn btn-sm bg-gradient-primary text-white" href="{{ route('admin.criteria.create') }}" title="Thêm mới">
          <i class="fas fa-plus mr-2"></i>Thêm mới
        </a>

        <a class="btn btn-sm bg-gradient-danger text-white delete-all" id="delete-all" href="javascript:void()" title="Xóa tất cả" data-url="http://localhost/euphoria_pdo/admin/product/delete_all">
          <i class="far fa-trash-alt mr-2"></i>Xóa tất cả
        </a>

        <div class="form-inline form-search d-inline-block align-middle ml-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar text-sm keyword" type="text" placeholder="Tìm kiếm" aria-label="Tìm kiếm" value="" data-url="admin/product/index"/>
            <div class="input-group-append bg-primary rounded-right">
              <button onclick="onSearch('keyword')" class="btn btn-navbar text-white" type="button">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="card card-primary card-outline text-sm mb-0 rendering">
        <div class="card-header">
          <h3 class="card-title">
            Danh sách tiêu chí
          </h3>
        </div>
        <div class="card-body table-responsive p-0">
          <table class="table table-hover">
            <thead>
              <tr>
                <th class="align-middle" width="5%">
                  <div class="custom-control custom-checkbox my-checkbox">
                    <input type="checkbox" class="checkall custom-control-input" id="selectall-checkbox">
                    <label for="selectall-checkbox" class="custom-control-label"></label>
                  </div>
                </th>
                <th class="align-middle text-center" width="10%">STT</th>
                <th class="align-middle">Hình ảnh</th>
                <th class="align-middle" style="width:30%">Tiêu đề</th>
                <th class="align-middle text-center">Bán chạy</th>
                <th class="align-middle text-center">Nổi bật</th>
                <th class="align-middle text-center">Hiển thị</th>
                <th class="align-middle text-center">Thao tác</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="align-middle">
                  <div class="custom-control custom-checkbox my-checkbox">
                    <input type="checkbox" name="checkitem[]" class="checkitem custom-control-input select-checkbox" id="select-checkbox-36" value="293"/>
                    <input type="hidden" name="hashes[]" value="s44k"/>
                    <label for="select-checkbox-36" class="custom-control-label"></label>
                  </div>
                </td>
                <td class="align-middle">
                  <input type="number" class="update-num-product form-control form-control-mini m-auto" min="0" value="1" data-id="293" data-table="products"/>
                  <input name="_token_num" value="1710333778" type="hidden"/>
                </td>
                <td class="align-middle">
                  <a href="http://localhost/euphoria_pdo/admin/product/show?id=293" title="Black Sweatshirt">
                    <img class="rounded img-preview img-fluid" src="http://localhost/euphoria_pdo/upload/product/Rectangle 25.png" alt="Black Sweatshirt" width="70" height="50" style="object-fit: contain;"/>
                  </a>
                </td>
                <td class="align-middle">
                  <a class="text-dark text-break" href="http://localhost/euphoria_pdo/admin/product/show?id=293" title="Black Sweatshirt">
                    Black Sweatshirt
                  </a>
                </td>
                <td class="align-middle text-center">
                  <div class="custom-control custom-checkbox my-checkbox">
                    <input type="checkbox" id="check-sst-product" class="check-sst-product custom-control-input show-checkbox" data-table="products" name="banchay" data-id="293" checked=""/>
                    <label for="check-sst-product" class="custom-control-label"></label>
                    <input name="_token" value="1710333778" type="hidden"/>
                  </div>
                </td>
                <td class="align-middle text-center">
                  <div class="custom-control custom-checkbox my-checkbox">
                    <input type="checkbox" id="check-sst-product" class="check-sst-product custom-control-input show-checkbox" data-table="products" name="noibat" data-id="293" checked=""/>
                    <label for="check-sst-product" class="custom-control-label"></label>
                    <input name="_token" value="1710333778" type="hidden"/>
                  </div>
                </td>
                <td class="align-middle text-center">
                  <div class="custom-control custom-checkbox my-checkbox">
                    <input type="checkbox" id="check-sst-product" class="check-sst-product custom-control-input show-checkbox" data-table="products" name="hienthi" data-id="293" checked=""/>
                    <label for="check-sst-product" class="custom-control-label"></label>
                    <input name="_token" value="1710333778" type="hidden"/>
                  </div>
                </td>
                <td class="align-middle text-center text-md text-nowrap">
                  <a class="text-primary mr-2" href="http://localhost/euphoria_pdo/admin/product/show?id=293" title="Chỉnh sửa">
                    <i class="fas fa-edit"></i>
                  </a>
                  <div class="dropdown d-inline-block align-middle">
                    <a id="dropdownCopy" href="http://localhost/euphoria_pdo/admin/product/duplicate?id=293" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link text-success p-0 pr-2" title="Copy">
                      <i class="far fa-clone"></i>
                    </a>
                  </div>
                  <a href="javascript:void()" class="text-danger" data-url="http://localhost/euphoria_pdo/admin/product/delete?id=293&amp;hash=s44k" id="delete-item" title="Xóa vĩnh viễn">
                    <i class="fas fa-trash-alt"></i>
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </form>
  </section>
@endsection
