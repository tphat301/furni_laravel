@extends('admin.index')

@section('title', 'Thêm chính sách')

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
            Thêm chính sách
          </li>
        </ol>
      </div>
    </div>
  </section>

  <section class="content">
    <form action="" class="validation-form" method="POST" enctype="multipart/form-data">
      <div class="card-footer text-sm sticky-top">
        <button type="submit" name="save" class="btn btn-sm bg-gradient-primary submit-check">
          <i class="far fa-save mr-2"></i>Lưu
        </button>
        <a class="btn btn-sm bg-gradient-danger" href="{{ route('admin.news') }}" title="Thoát">
          <i class="fas fa-sign-out-alt mr-2"></i>Thoát
        </a>
      </div>

      <div class="row">
        <div class="col-xl-8">
          {{-- Slug --}}
          @if (config('admin.post.policy.slug') === true)
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
                        <a class="nav-link active" id="tabs-lang" data-toggle="pill" href="javscript:void()" role="tab" aria-selected="true">Tiếng Việt</a>
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
                          <input type="text" class="slug-seo form-control slug-input no-validate text-sm" name="slug" id="slug" value="" placeholder="Đường dẫn mẫu"/>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endif

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
                      <a class="nav-link active" id="tabs-lang" data-toggle="pill" href="javscript:void()" role="tab" aria-controls="tabs-lang-vi" aria-selected="true">
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
                        <input type="text" class="for-seo form-control text-sm" name="title" id="title" placeholder="Tiêu đề" required=""/>
                      </div>

                      @if (config('admin.post.policy.content') === true)
                        <div class="form-group">
                          <label for="content">
                            Nội dung:</label>
                          <textarea name="content" class="form-control text-sm {{ config('admin.post.policy.content_tiny') === true ? 'tiny' : '' }}" id="content" cols="30" rows="10" placeholder="Nội dung"></textarea>
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
                <div class="form-group d-inline-block mb-2 mr-2">
                  <label for="banchay-checkbox" class="d-inline-block align-middle mb-0 mr-2">Bán chạy:</label>
                  <div class="custom-control custom-checkbox d-inline-block align-middle">
                    <input type="checkbox" class="custom-control-input banchay-checkbox" name="status[]" id="banchay-checkbox" value="banchay"/>
                    <label for="banchay-checkbox" class="custom-control-label"></label>
                  </div>
                </div>
                <div class="form-group d-inline-block mb-2 mr-2">
                  <label for="banchay-checkbox" class="d-inline-block align-middle mb-0 mr-2">Bán chạy:</label>
                  <div class="custom-control custom-checkbox d-inline-block align-middle">
                    <input type="checkbox" class="custom-control-input banchay-checkbox" name="status[]" id="banchay-checkbox" value="banchay"/>
                    <label for="banchay-checkbox" class="custom-control-label"></label>
                  </div>
                </div>
                <div class="form-group d-inline-block mb-2 mr-2">
                  <label for="banchay-checkbox" class="d-inline-block align-middle mb-0 mr-2">Bán chạy:</label>
                  <div class="custom-control custom-checkbox d-inline-block align-middle">
                    <input type="checkbox" class="custom-control-input banchay-checkbox" name="status[]" id="banchay-checkbox" value="banchay"/>
                    <label for="banchay-checkbox" class="custom-control-label"></label>
                  </div>
                </div>
              </div>
              <!-- STT -->
              <div class="form-group">
                <label for="numb" class="d-inline-block align-middle mb-0 mr-2">Số thứ tự:</label>
                <input type="number" class="form-control form-control-mini d-inline-block align-middle text-sm" min="0" name="num" id="numb" placeholder="Số thứ tự" value="1"/>
              </div>
            </div>
          </div>

          {{-- Photo 1 --}}
          @if (config('admin.post.policy.photo1') === true)
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
                    <img class="rounded" src="{{ url('resources/images/noimage.png') }}" alt="Hình ảnh 1"/>
                  </div>
                  <label class="photoUpload-file" id="photo-zone1" for="file-zone1">
                    <input type="file" name="photo1" id="file-zone1"/>
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p class="photoUpload-drop">Kéo và thả hình vào đây</p>
                    <p class="photoUpload-or">hoặc</p>
                    <p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn hình</p>
                  </label>
                  <div class="photoUpload-dimension">
                    {{ config('admin.post.policy.thumb1') }}
                  </div>
                </div>
              </div>
            </div>
          @endif

          {{-- Photo 2 --}}
          @if (config('admin.post.policy.photo2') === true)
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
                    <img class="rounded" src="{{ url('resources/images/noimage.png') }}" alt="Hình ảnh 2"/>
                  </div>
                  <label class="photoUpload-file" id="photo-zone2" for="file-zone2">
                    <input type="file" name="photo2" id="file-zone2"/>
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p class="photoUpload-drop">Kéo và thả hình vào đây</p>
                    <p class="photoUpload-or">hoặc</p>
                    <p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn hình</p>
                  </label>
                  <div class="photoUpload-dimension">
                    {{ config('admin.post.policy.thumb2') }}
                  </div>
                </div>
              </div>
            </div>
          @endif

          {{-- Photo 3 --}}
          @if (config('admin.post.policy.photo3') === true)
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
                    <img class="rounded" src="{{ url('resources/images/noimage.png') }}" alt="Hình ảnh 3"/>
                  </div>
                  <label class="photoUpload-file" id="photo-zone3" for="file-zone3">
                    <input type="file" name="photo3" id="file-zone3"/>
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p class="photoUpload-drop">Kéo và thả hình vào đây</p>
                    <p class="photoUpload-or">hoặc</p>
                    <p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn hình</p>
                  </label>
                  <div class="photoUpload-dimension">
                    {{ config('admin.post.policy.thumb3') }}
                  </div>
                </div>
              </div>
            </div>
          @endif

          {{-- Photo 4 --}}
          @if (config('admin.post.policy.photo4') === true)
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
                    <img class="rounded" src="{{ url('resources/images/noimage.png') }}" alt="Hình ảnh 4"/>
                  </div>
                  <label class="photoUpload-file" id="photo-zone4" for="file-zone4">
                    <input type="file" name="photo4" id="file-zone4"/>
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p class="photoUpload-drop">Kéo và thả hình vào đây</p>
                    <p class="photoUpload-or">hoặc</p>
                    <p class="photoUpload-choose btn btn-sm bg-gradient-success">Chọn hình</p>
                  </label>
                  <div class="photoUpload-dimension">
                    {{ config('admin.post.policy.thumb4') }}
                  </div>
                </div>
              </div>
            </div>
          @endif
        </div>
      </div>

      {{-- SEO --}}
      @if (config('admin.post.policy.seo') === true)
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

                      @if (config('admin.news.seo_title') === true)
                        <div class="form-group">
                          <div class="label-seo">
                            <label for="titlevi">SEO Title:</label>
                          </div>
                          <input type="text" class="form-control check-seo title-seo text-sm" name="title_seo" id="title_seo" placeholder="SEO Title" value=""/>
                        </div>
                      @endif

                      @if (config('admin.news.seo_keyword') === true)
                        <div class="form-group">
                          <div class="label-seo">
                            <label for="keywords_seo">SEO Keywords (tối đa 70 ký tự):</label>
                          </div>
                          <input type="text" class="form-control check-seo keywords-seo text-sm" name="keywords" id="keywords_seo" placeholder="SEO Keywords" value=""/>
                        </div>
                      @endif

                      @if (config('admin.news.seo_desc') === true)
                        <div class="form-group">
                          <div class="label-seo">
                            <label for="description_seo">SEO Description (tối đa 160 ký tự):</label>
                          </div>
                          <textarea class="form-control check-seo description-seo text-sm" name="description_seo" id="description_seo" rows="5" placeholder="SEO Description"></textarea>
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
    </form>
  </section>
@endsection