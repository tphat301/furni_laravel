@extends('admin.index')

@section('title', 'Chi tiết sản phẩm')

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
            Chi tiết sản phẩm
          </li>
        </ol>
      </div>
    </div>
  </section>

  <section class="content">
    {!! Form::open(['name' => 'form-product-detail', 'route' => ['admin.product.update', $row->id], 'class' => ['form-product-detail'], 'files' => true]) !!}
    @method('PUT')
      <div class="card-footer text-sm sticky-top">
        <button type="submit" name="save" class="btn btn-sm bg-gradient-primary submit-check">
          <i class="far fa-save mr-2"></i>Lưu
        </button>
        <a class="btn btn-sm bg-gradient-danger" href="{{ route('admin.product') }}" title="Thoát">
          <i class="fas fa-sign-out-alt mr-2"></i>Thoát
        </a>
      </div>

      <div class="row">
        <div class="col-xl-8">
          {{-- Slug --}}
          <div class="card card-primary card-outline text-sm">
            <div class="card-header">
              <h3 class="card-title">
                Đường dẫn
              </h3>
              <span class="pl-2 text-danger">
                (Vui lòng không nhập trùng tiêu đề)
              </span>
            </div>
            <div class="card-body card-slug">
              <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                  <ul class="nav nav-tabs" id="custom-tabs-three-tab-lang" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active">Tiếng Việt</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                  <div class="tab-content" id="custom-tabs-three-tabContent-lang">
                    <div class="tab-pane fade show active" id="tabs-sluglang-vi" role="tabpanel" aria-labelledby="tabs-lang">
                      <div class="form-gourp mb-0">
                        <label class="d-block">
                          Đường dẫn mẫu:<span class="pl-2 font-weight-normal" id="slugurlpreviewvi"><strong class="text-info"></strong></span>
                        </label>
                        <input type="text" class="slug-seo form-control slug-input text-sm" name="slug" id="slug" value="{{ $row->slug }}" placeholder="Đường dẫn mẫu"/>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card card-primary card-outline text-sm">
            <div class="card-header">
              <h3 class="card-title">Nội dung</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                  <ul class="nav nav-tabs" id="custom-tabs-three-tab-lang" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active">
                        Tiếng Việt
                      </a>
                    </li>
                  </ul>
                </div>

                <div class="card-body card-article">
                  <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-lang-vi" role="tabpanel" aria-labelledby="tabs-lang">

                      <div class="form-group">
                        <label for="title">Tiêu đề:</label>
                        <input type="text" class="for-seo form-control text-sm" name="title" id="title" value="{{ $row->title }}" placeholder="Tiêu đề"/>
                      </div>

                      @if (config('admin.product.desc') === true)
                        <div class="form-group">
                          <label for="desc">Mô tả:</label>
                          <textarea name="description" class="form-control text-sm {{ config('admin.product.desc_tiny') === true ? 'tiny' : ''}}" id="desc" cols="30" rows="10" placeholder="Mô tả">{!! $row->desc !!}</textarea>
                        </div>
                      @endif

                      @if (config('admin.product.content') === true)
                        <div class="form-group">
                          <label for="content">Nội dung:</label>
                          <textarea name="content" class="form-control text-sm {{ config('admin.product.content_tiny') === true ? 'tiny' : ''}}" id="content" cols="30" rows="10" placeholder="Nội dung">{!! $row->content !!}</textarea>
                        </div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-4">
          {{-- Category --}}
          @if (config('admin.product.category.active') === true)
            <div class="card card-primary card-outline text-sm">
              <div class="card-header">
                <h3 class="card-title">Danh mục</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group-category row">

                  {{-- Category 1 --}}
                  @if(config('admin.product.category.category1.active') === true)
                  <div class="form-group col-xl-6 col-sm-4">
                    <label class="d-block" for="id_parent1">
                      {{ config('admin.product.category.category1.name') }}:
                    </label>
                    <select id="id_parent1" name="id_parent1" class="form-control filter-category select2-hidden-accessible" data-url="admin/product/filter_category" tabindex="-1" aria-hidden="true">
                      <option>{{ config('admin.product.category.category1.name') }}</option>
                      <option value="68">Thời trang nổi bật nữ 2024</option>
                      <option value="69">Thời trang nổi bật nam 2024</option>
                    </select>
                    <input type="hidden" name="_token_filter_category" value="1710336692"/>
                  </div>
                  @endif

                  {{-- Category 2 --}}
                  <div class="form-group col-xl-6 col-sm-4">
                    <label class="d-block" for="id_parent2">Danh mục cấp 2:</label>
                    <select id="id_parent2" name="id_parent2" class="form-control filter-category select2-hidden-accessible" data-url="admin/product/filter_category" tabindex="-1" aria-hidden="true">
                      <option>Danh mục cấp 2</option>
                      <option value="68">Thời trang nổi bật nữ 2024</option>
                      <option value="69">Thời trang nổi bật nam 2024</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          @endif


          {{-- Info --}}
          <div class="card card-primary card-outline text-sm">
            <div class="card-header">
              <h3 class="card-title">Thông tin</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>

            {{-- Status --}}
            <div class="card-body">
              <div class="form-group">
                @php
                  $status = !empty($row->status) ? explode(",", $row->status) : [];
                @endphp
                @foreach (config('admin.product.status') as $key => $value)
                  <div class="form-group d-inline-block mb-2 mr-2">
                    <label for="{{$key}}-checkbox" class="d-inline-block align-middle mb-0 mr-2">{{$value}}:</label>
                    <div class="custom-control custom-checkbox d-inline-block align-middle">
                      <input type="checkbox" class="custom-control-input {{$key}}-checkbox" name="status[]" id="{{$key}}-checkbox" value="{{$key}}" {{ in_array($key, $status) ? 'checked' : '' }}/>
                      <label for="{{$key}}-checkbox" class="custom-control-label"></label>
                    </div>
                  </div>
                @endforeach
              </div>

              <div class="row">
                {{-- Number --}}
                <div class="form-group col-md-6">
                  <label for="num" class="d-inline-block align-middle mb-0 mr-2">Số thứ tự:</label>
                  <input type="number" class="form-control form-control-mini d-inline-block align-middle text-sm" min="0" name="num" id="num" placeholder="Số thứ tự" value="{{ $row->num }}"/>
                </div>

                {{-- Quantity --}}
                <div class="form-group col-md-6">
                  <label for="quantity" class="d-inline-block align-middle mb-0 mr-2">Số lượng:</label>
                  <input type="number" class="form-control form-control-mini d-inline-block align-middle text-sm" min="0" name="quantity" id="quantity" placeholder="Số lượng" value="{{ $row->quantity }}"/>
                </div>
              </div>

              <div class="row">
                <!-- Code -->
                <div class="form-group col-md-6">
                  <label class="d-block" for="code">Mã sản phẩm:</label>
                  <input type="text" class="form-control text-sm" name="code" id="code" placeholder="Mã sản phẩm" value="{{ $row->code }}"/>
                </div>

                <!-- Sale price -->
                <div class="form-group col-md-6">
                  <label class="d-block" for="sale_price">Giá bán:</label>
                  <div class="input-group">
                    <input type="text" class="form-control format-price sale_price text-sm" name="sale_price" id="sale_price" value="{{ $row->sale_price }}" placeholder="Giá mới"/>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <strong>VNĐ</strong>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Regular price -->
                <div class="form-group col-md-6">
                  <label class="d-block" for="regular_price">Giá cũ (nếu có):</label>
                  <div class="input-group">
                    <input type="text" class="form-control format-price regular_price text-sm" name="regular_price" id="regular_price" value="{{ $row->regular_price }}" placeholder="Giá bán"/>
                    <div class="input-group-append">
                      <div class="input-group-text"><strong>VNĐ</strong></div>
                    </div>
                  </div>
                </div>

                <!-- Discount -->
                <div class="form-group col-md-6">
                  <label class="d-block" for="discount">Chiết khấu:</label>
                  <div class="input-group">
                    <input type="text" class="form-control discount text-sm" name="discount" id="discount" placeholder="Chiết khấu" value="{{ $row->discount }}" maxlength="3" readonly=""/>
                    <div class="input-group-append">
                      <div class="input-group-text"><strong>%</strong></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          {{-- Photo 1 --}}
          @if (config('admin.product.photo1') === true)
            <div class="card card-primary card-outline text-sm">
              <div class="card-header">
                <h3 class="card-title">Hình ảnh 1</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="photoUpload-zone">
                  <div class="photoUpload-detail" id="photoUpload-preview1">
                    @if (!empty($row->photo1))
                      <img class="rounded img-preview img-fluid" src="{{ url("public/upload/product/$row->photo1")  }}" alt="{{ $row->title }}"/>
                      <a class="delete-photo" href="{{ route('admin.product.delete_photo', ['id' => $row->id, 'action' => 'photo1']) }}" style="cursor: pointer" title="Xóa hình ảnh">
                        <i class="far fa-trash-alt text-white"></i>
                      </a>
                    @else
                      <img class="rounded img-preview img-fluid" src="{{ url("resources/images/noimage.png")  }}" alt="{{ $row->title }}"/>
                    @endif
                  </div>
                  <label class="photoUpload-file" id="photo-zone1" for="file-zone1">
                    <input type="file" name="photo1" id="file-zone1"/>
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p class="photoUpload-drop">Kéo và thả hình vào đây</p>
                    <p class="photoUpload-or">hoặc</p>
                    <p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn hình</p>
                  </label>
                  <div class="photoUpload-dimension">
                    {{ config('admin.product.thumb1') }}
                  </div>
                </div>
              </div>
            </div>
          @endif

          {{-- Photo 2 --}}
          @if (config('admin.product.photo2') === true)
            <div class="card card-primary card-outline text-sm">
              <div class="card-header">
                <h3 class="card-title">Hình ảnh 2</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="photoUpload-zone">
                  <div class="photoUpload-detail" id="photoUpload-preview2">
                    @if (!empty($row->photo2))
                      <img class="rounded img-preview img-fluid" src="{{ url("public/upload/product/$row->photo2")  }}" alt="{{ $row->title }}"/>
                      <a class="delete-photo" href="{{ route('admin.product.delete_photo', ['id' => $row->id, 'action' => 'photo2']) }}" style="cursor: pointer" title="Xóa hình ảnh">
                        <i class="far fa-trash-alt text-white"></i>
                      </a>
                    @else
                      <img class="rounded img-preview img-fluid" src="{{ url("resources/images/noimage.png")  }}" alt="{{ $row->title }}"/>
                    @endif
                  </div>
                  <label class="photoUpload-file" id="photo-zone2" for="file-zone2">
                    <input type="file" name="photo2" id="file-zone2"/>
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p class="photoUpload-drop">Kéo và thả hình vào đây</p>
                    <p class="photoUpload-or">hoặc</p>
                    <p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn hình</p>
                  </label>
                  <div class="photoUpload-dimension">
                    {{ config('admin.product.thumb2') }}
                  </div>
                </div>
              </div>
            </div>
          @endif

          {{-- Photo 3 --}}
          @if (config('admin.product.photo3') === true)
            <div class="card card-primary card-outline text-sm">
              <div class="card-header">
                <h3 class="card-title">Hình ảnh 3</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="photoUpload-zone">
                  <div class="photoUpload-detail" id="photoUpload-preview3">
                    @if (!empty($row->photo3))
                      <img class="rounded img-preview img-fluid" src="{{ url("public/upload/product/$row->photo3")  }}" alt="{{ $row->title }}"/>
                      <a class="delete-photo" href="{{ route('admin.product.delete_photo', ['id' => $row->id, 'action' => 'photo3']) }}" style="cursor: pointer" title="Xóa hình ảnh">
                        <i class="far fa-trash-alt text-white"></i>
                      </a>
                    @else
                      <img class="rounded img-preview img-fluid" src="{{ url("resources/images/noimage.png")  }}" alt="{{ $row->title }}"/>
                    @endif
                  </div>
                  <label class="photoUpload-file" id="photo-zone3" for="file-zone3">
                    <input type="file" name="photo3" id="file-zone3"/>
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p class="photoUpload-drop">Kéo và thả hình vào đây</p>
                    <p class="photoUpload-or">hoặc</p>
                    <p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn hình</p>
                  </label>
                  <div class="photoUpload-dimension">
                    {{ config('admin.product.thumb3') }}
                  </div>
                </div>
              </div>
            </div>
          @endif

          {{-- Photo 4 --}}
          @if (config('admin.product.photo4') === true)
            <div class="card card-primary card-outline text-sm">
              <div class="card-header">
                <h3 class="card-title">Hình ảnh 4</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="photoUpload-zone">
                  <div class="photoUpload-detail" id="photoUpload-preview4">
                    @if (!empty($row->photo4))
                      <img class="rounded img-preview img-fluid" src="{{ url("public/upload/product/$row->photo4")  }}" alt="{{ $row->title }}"/>
                      <a class="delete-photo" href="{{ route('admin.product.delete_photo', ['id' => $row->id, 'action' => 'photo4']) }}" style="cursor: pointer" title="Xóa hình ảnh">
                        <i class="far fa-trash-alt text-white"></i>
                      </a>
                    @else
                      <img class="rounded img-preview img-fluid" src="{{ url("resources/images/noimage.png")  }}" alt="{{ $row->title }}"/>
                    @endif
                  </div>
                  <label class="photoUpload-file" id="photo-zone4" for="file-zone4">
                    <input type="file" name="photo4" id="file-zone4"/>
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p class="photoUpload-drop">Kéo và thả hình vào đây</p>
                    <p class="photoUpload-or">hoặc</p>
                    <p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn hình</p>
                  </label>
                  <div class="photoUpload-dimension">
                    {{ config('admin.product.thumb4') }}
                  </div>
                </div>
              </div>
            </div>
          @endif
        </div>
      </div>

      {{-- SEO --}}
      @if (config('admin.product.seo') === true)
        <div class="card card-primary card-outline text-sm">
          <div class="card-header">
            <h3 class="card-title">Nội dung SEO</h3>
            <div class="build-seo bg-gradient-success py-2 px-3 rounded  float-right submit-check">
              <i class="far fa-save mr-2"></i>Tạo SEO
            </div>
          </div>
          <div class="card-body">
            <div class="card-seo">
              <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                  <ul class="nav nav-tabs" id="custom-tabs-three-tab-lang" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="tabs-lang" data-toggle="pill" href="#tabs-seolang-vi" role="tab" aria-controls="tabs-seolang-vi" aria-selected="true">SEO</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                  <div class="tab-content" id="custom-tabs-three-tabContent-lang">
                    <div class="tab-pane fade show active" id="tabs-seolang-vi" role="tabpanel" aria-labelledby="tabs-lang">

                      @if (config('admin.product.seo_title') === true)
                        <div class="form-group">
                          <div class="label-seo">
                            <label for="titlevi">SEO Title:</label>
                          </div>
                          <input type="text" class="form-control check-seo title-seo text-sm" name="title_seo" id="title_seo" placeholder="SEO Title" value="{{ !empty($rowSeo->title_seo) ? $rowSeo->title_seo : '' }}"/>
                        </div>
                      @endif

                      @if (config('admin.product.seo_keyword') === true)
                        <div class="form-group">
                          <div class="label-seo">
                            <label for="keywords_seo">SEO Keywords (tối đa 70 ký tự):</label>
                          </div>
                          <input type="text" class="form-control check-seo keywords-seo text-sm" name="keywords" id="keywords_seo" placeholder="SEO Keywords" value="{{ !empty($rowSeo->keywords) ? $rowSeo->keywords : '' }}"/>
                        </div>
                      @endif

                      @if (config('admin.product.seo_desc') === true)
                        <div class="form-group">
                          <div class="label-seo">
                            <label for="description_seo">SEO Description (tối đa 160 ký tự):</label>
                          </div>
                          <textarea class="form-control check-seo description-seo text-sm" name="description_seo" id="description_seo" rows="5" placeholder="SEO Description">{!! !empty($rowSeo->description_seo) ? $rowSeo->description_seo : '' !!}</textarea>
                        </div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endif

      {{-- Schema SEO --}}
      @if (config('admin.product.schema') === true)
        <div class="card card-primary card-outline text-sm">
          <div class="card-header">
            <h3 class="card-title">Schema JSON Product</h3>
            <button class="btn btn-sm bg-gradient-success float-right submit-check" name="build-schema"><i class="far fa-save mr-2"></i>Lưu và tạo tự động Schema</button>
          </div>
          <div class="card-body">
            <div class="card-seo">
              <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                  <ul class="nav nav-tabs" id="custom-tabs-one-tab-lang" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active">Schema JSON</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                  <div class="tab-content" id="custom-tabs-one-tabContent-lang">
                    <div class="tab-pane fade show active">
                      <div class="form-group">
                        <div class="label-seo">
                          <label for="schemavi">Schema JSON:</label>
                        </div>
                        <textarea class="form-control" name="schema" id="schemavi" rows="15" placeholder="Nếu quý khách không biết cách sử dụng Data Structure vui lòng không nhập nội dung vào khung này để tránh phát sinh lỗi..."></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endif

    {!! Form::close() !!}
  </section>
@endsection
