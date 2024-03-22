@extends('admin.index')

@section('title', $row->title)

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
            {{ $row->title }}
          </li>
        </ol>
      </div>
    </div>
  </section>

  <section class="content">
    {!! Form::open(['name' => 'form-news-detail', 'route' => ['admin.category_news1.update', $row->id], 'class' => ['form-product-detail'], 'files' => true]) !!}
    @method('PUT')
      <div class="card-footer text-sm sticky-top">
        <button type="submit" name="save" class="btn btn-sm bg-gradient-primary submit-check">
          <i class="far fa-save mr-2"></i>Lưu
        </button>
        <a class="btn btn-sm bg-gradient-danger" href="{{ route('admin.category_news1') }}" title="Thoát">
          <i class="fas fa-sign-out-alt mr-2"></i>Thoát
        </a>
      </div>

      <div class="row">
        <div class="col-xl-8">
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
                          Đường dẫn mẫu:<span class="pl-2 font-weight-normal"  id="slugurlpreviewvi"><strong class="text-info"></strong></span>
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

                      @if (config('admin.news.category.category1.desc') === true)
                        <div class="form-group">
                          <label for="desc">Mô tả:</label>
                          <textarea name="description" class="form-control text-sm {{ config('admin.news.category.category1.desc_tiny') === true ? 'tiny' : ''}}" id="desc" cols="30" rows="10" placeholder="Mô tả">{!! $row->desc !!}</textarea>
                        </div>
                      @endif

                      @if (config('admin.news.category.category1.content') === true)
                        <div class="form-group">
                          <label for="content">Nội dung:</label>
                          <textarea name="content" class="form-control text-sm {{ config('admin.news.category.category1.content_tiny') === true ? 'tiny' : ''}}" id="content" cols="30" rows="10" placeholder="Nội dung">{!! $row->content !!}</textarea>
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
          <!-- Info -->
          <div class="card card-primary card-outline text-sm">
            <div class="card-header">
              <h3 class="card-title">Thông tin</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                @php
                  $status = !empty($row->status) ? explode(",", $row->status) : [];
                @endphp
                @foreach (config('admin.news.category.category1.status') as $key => $value)
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
                <!-- Number -->
                <div class="form-group col-md-6">
                  <label for="num" class="d-inline-block align-middle mb-0 mr-2">Số thứ tự:</label>
                  <input type="number" class="form-control form-control-mini d-inline-block align-middle text-sm" min="0" name="num" id="num" placeholder="Số thứ tự" value="{{ $row->num }}"/>
                </div>
              </div>
            </div>
          </div>

          {{-- Photo 1 --}}
          @if (config('admin.news.category.category1.photo1') === true)
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
                      <img class="rounded img-preview img-fluid" src="{{ url("public/upload/category_news1/$row->photo1")  }}" alt="{{ $row->title }}"/>
                      <a class="delete-photo" href="{{ route('admin.category_news1.delete_photo', ['id' => $row->id, 'action' => 'photo1']) }}" style="cursor: pointer" title="Xóa hình ảnh">
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
                    {{ config('admin.news.category.category1.thumb1') }}
                  </div>
                </div>
              </div>
            </div>
          @endif

          {{-- Photo 2 --}}
          @if (config('admin.news.category.category1.photo2') === true)
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
                      <img class="rounded img-preview img-fluid" src="{{ url("public/upload/category_news1/$row->photo2")  }}" alt="{{ $row->title }}"/>
                      <a class="delete-photo" href="{{ route('admin.category_news1.delete_photo', ['id' => $row->id, 'action' => 'photo2']) }}" style="cursor: pointer" title="Xóa hình ảnh">
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
                    {{ config('admin.news.category.category1.thumb2') }}
                  </div>
                </div>
              </div>
            </div>
          @endif

          {{-- Photo 3 --}}
          @if (config('admin.news.category.category1.photo3') === true)
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
                      <img class="rounded img-preview img-fluid" src="{{ url("public/upload/category_news1/$row->photo3")  }}" alt="{{ $row->title }}"/>
                      <a class="delete-photo" href="{{ route('admin.category_news1.delete_photo', ['id' => $row->id, 'action' => 'photo3']) }}" style="cursor: pointer" title="Xóa hình ảnh">
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
                    {{ config('admin.news.category.category1.thumb3') }}
                  </div>
                </div>
              </div>
            </div>
          @endif

          {{-- Photo 4 --}}
          @if (config('admin.news.category.category1.photo4') === true)
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
                      <img class="rounded img-preview img-fluid" src="{{ url("public/upload/category_news1/$row->photo4")  }}" alt="{{ $row->title }}"/>
                      <a class="delete-photo" href="{{ route('admin.category_news1.delete_photo', ['id' => $row->id, 'action' => 'photo4']) }}" style="cursor: pointer" title="Xóa hình ảnh">
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
                    {{ config('admin.news.category.category1.thumb4') }}
                  </div>
                </div>
              </div>
            </div>
          @endif
        </div>
      </div>

      {{-- SEO --}}
      @if (config('admin.news.category.category1.seo') === true)
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

                      @if (config('admin.news.category.category1.seo_title') === true)
                        <div class="form-group">
                          <div class="label-seo">
                            <label for="titlevi">SEO Title:</label>
                          </div>
                          <input type="text" class="form-control check-seo title-seo text-sm" name="title_seo" id="title_seo" placeholder="SEO Title" value="{{ !empty($rowSeo->title_seo) ? $rowSeo->title_seo : '' }}"/>
                        </div>
                      @endif

                      @if (config('admin.news.category.category1.seo_keyword') === true)
                        <div class="form-group">
                          <div class="label-seo">
                            <label for="keywords_seo">SEO Keywords (tối đa 70 ký tự):</label>
                          </div>
                          <input type="text" class="form-control check-seo keywords-seo text-sm" name="keywords" id="keywords_seo" placeholder="SEO Keywords" value="{{ !empty($rowSeo->keywords) ? $rowSeo->keywords : '' }}"/>
                        </div>
                      @endif

                      @if (config('admin.news.category.category1.seo_desc') === true)
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
    {!! Form::close() !!}
  </section>
@endsection
