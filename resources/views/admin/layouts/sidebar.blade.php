<aside class="main-sidebar sidebar-dark-primary elevation-4 text-sm">
  <a class="brand-link" href="">
    <img class="brand-image" src="{{url('resources/images/Logo.png')}}" alt="Logo">
  </a>

  <div class="sidebar">
    <nav class="mt-3">
      <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent text-sm" data-widget="treeview" role="menu" data-accordion="false">

        {{-- Dashboard --}}
        <li class="nav-item">
          <a href="{{url('admin/dashboard')}}" class="nav-link {{ session('module_active') === 'dashboard' ? 'active' : '' }}" href="" title="{{ config('admin.dashboard.name') }}">
            <i class="nav-icon text-sm fas fa-tachometer-alt"></i>
            <p>{{ config('admin.dashboard.name') }}</p>
          </a>
        </li>

        {{-- Module product --}}
        @if (config('admin.product.module') === true)
          <li class="nav-item has-treeview menu-group {{session('module_active') === 'product_index' || session('module_active') === 'product_create' ? 'menu-open' : '' }}">
            <a class="nav-link" title="Quản lý Sản phẩm">
              <i class="nav-icon text-sm fas fa-layer-group"></i>
              <p>
                Quản lý Sản phẩm<i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (config('admin.product.category') === true)
                <li class="nav-item has-treeview">
                  <a class="nav-link" href="#" title="Danh mục Sản phẩm">
                    <i class="nav-icon text-sm fas fa-boxes"></i>
                    <p>
                      Danh mục Sản phẩm
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a class="nav-link" href="" title="Danh mục cấp 1">
                        <i class="nav-icon text-sm far fa-caret-square-right"></i>Danh mục cấp 1
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="" title="Danh mục cấp 2">
                        <i class="nav-icon text-sm far fa-caret-square-right"></i>Danh mục cấp 2
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="" title="Danh mục cấp 2">
                        <i class="nav-icon text-sm far fa-caret-square-right"></i>Danh mục cấp 3
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="" title="Danh mục cấp 2">
                        <i class="nav-icon text-sm far fa-caret-square-right"></i>Danh mục cấp 4
                      </a>
                    </li>
                  </ul>
                </li>
              @endif

              @if (config('admin.product.size') === true)
                <li class="nav-item">
                  <a class="nav-link" href="" title="Size">
                    <i class="nav-icon text-sm fas fa-boxes"></i><p>Size</p>
                  </a>
                </li>
              @endif

              @if (config('admin.product.color') === true)
                <li class="nav-item">
                  <a class="nav-link" href="" title="Màu sắc">
                    <i class="nav-icon text-sm fas fa-boxes"></i><p>Màu sắc</p>
                  </a>
                </li>
              @endif

              <li class="nav-item">
                <a class="nav-link {{session('module_active') === 'product_index' || session('module_active') === 'product_create' ? 'active' : '' }}" href="{{url('admin/product')}}" title="Sản phẩm">
                  <i class="nav-icon text-sm fas fa-boxes"></i><p>Sản phẩm</p>
                </a>
              </li>
            </ul>
          </li>
        @endif

        {{-- Quản lý tin tức --}}
        <li class="nav-item has-treeview menu-group">
          <a class="nav-link" title="Quản lý tin tức">
            <i class="nav-icon text-sm fas fa-layer-group"></i>
            <p>
              Quản lý tin tức<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item has-treeview">
              <a class="nav-link" href="#" title="Danh mục tin tức">
                <i class="nav-icon text-sm fas fa-boxes"></i>
                <p>
                  Danh mục tin tức
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a class="nav-link" href="" title="Danh mục cấp 1">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i>Danh mục cấp 1
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="" title="Danh mục cấp 2">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i>Danh mục cấp 2
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="" title="Danh mục cấp 2">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i>Danh mục cấp 3
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="" title="Danh mục cấp 2">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i>Danh mục cấp 4
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="" title="Tin tức">
                <i class="nav-icon text-sm fas fa-boxes"></i><p>Tin tức</p>
              </a>
            </li>
          </ul>
        </li>

        {{-- Quản lý bài viết --}}
        <li class="nav-item has-treeview menu-group">
          <a class="nav-link" title="Quản lý bài viết">
            <i class="nav-icon text-sm fas fa-boxes"></i>
            <p>
              Quản lý bài viết<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a class="nav-link" href="" title="Tiêu chí">
                <i class="nav-icon text-sm far fa-caret-square-right"></i><p>Tiêu chí</p>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="" title="Chính sách">
                <i class="nav-icon text-sm far fa-caret-square-right"></i><p>Chính sách</p>
              </a>
            </li>
          </ul>
        </li>

        {{-- Quản lý hình ảnh --}}
        <li class="nav-item has-treeview menu-group">
          <a class="nav-link" title="Quản lý hình ảnh">
            <i class="nav-icon text-sm fas fa-photo-video"></i>
            <p>
              Quản lý hình ảnh<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a class="nav-link" href="" title="Slideshow">
                <i class="nav-icon text-sm far fa-caret-square-right"></i><p>Slideshow</p>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="" title="Social">
                <i class="nav-icon text-sm far fa-caret-square-right"></i><p>Social</p>
              </a>
            </li>
          </ul>
        </li>

        {{-- Quản lý trang tĩnh --}}
        <li class="nav-item has-treeview menu-group">
          <a class="nav-link" title="Quản lý trang tĩnh">
            <i class="nav-icon text-sm fas fa-bookmark"></i>
            <p>
              Quản lý trang tĩnh<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a class="nav-link" href="" title="Giới thiệu">
                <i class="nav-icon text-sm far fa-caret-square-right"></i><p>Giới thiệu</p>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="" title="Footer">
                <i class="nav-icon text-sm far fa-caret-square-right"></i><p>Footer</p>
              </a>
            </li>
          </ul>
        </li>

        {{-- Quản lý seopage --}}
        <li class="nav-item has-treeview menu-group">
          <a class="nav-link" title="Quản lý seopage">
            <i class="nav-icon text-sm fas fa-share-alt"></i>
            <p>
              Quản lý seopage<i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a class="nav-link" href="" title="Trang chủ">
                <i class="nav-icon text-sm far fa-caret-square-right"></i><p>Trang chủ</p>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="" title="Sản phẩm">
                <i class="nav-icon text-sm far fa-caret-square-right"></i><p>Sản phẩm</p>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="" title="Tin tức">
                <i class="nav-icon text-sm far fa-caret-square-right"></i><p>Tin tức</p>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="" title="Liên hệ">
                <i class="nav-icon text-sm far fa-caret-square-right"></i><p>Liên hệ</p>
              </a>
            </li>
          </ul>
        </li>

        {{-- Thiết lập chung --}}
        <li class="nav-item">
          <a class="nav-link" href="" title="Thiết lập chung">
            <i class="nav-icon text-sm fas fa-cogs"></i>
            <p>Thiết lập chung</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
