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
        @if (config('admin.product.active') === true)
          <li class="nav-item has-treeview menu-group {{session('module_active') === 'product_index' || session('module_active') === 'product_create' ? 'menu-open' : '' }}">
            <a class="nav-link {{session('module_active') === 'product_index' || session('module_active') === 'product_create' ? 'active' : '' }}" title="{{ config('admin.product.name') }}">
              <i class="nav-icon text-sm fas fa-layer-group"></i>
              <p>
                {{ config('admin.product.name') }}<i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (config('admin.product.category.active') === true)
                <li class="nav-item has-treeview">
                  <a class="nav-link" href="#" title="{{ config('admin.product.category.name') }}">
                    <i class="nav-icon text-sm fas fa-boxes"></i>
                    <p>
                      {{ config('admin.product.category.name') }}
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    {{-- Category 1 --}}
                    @if(config('admin.product.category.category1.active') === true)
                      <li class="nav-item">
                        <a class="nav-link" href="" title="{{ config('admin.product.category.category1.name') }}">
                          <i class="nav-icon text-sm far fa-caret-square-right"></i>{{ config('admin.product.category.category1.name') }}
                        </a>
                      </li>
                    @endif

                    {{-- Category 2 --}}
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

        {{-- Module news --}}
        @if (config('admin.news.active') === true)
          <li class="nav-item has-treeview menu-group {{session('module_active') === 'news_index' || session('module_active') === 'news_create' ? 'menu-open' : '' }}">
            <a class="nav-link {{session('module_active') === 'news_index' || session('module_active') === 'news_create' ? 'active' : '' }}" title="{{ config('admin.news.name') }}">
              <i class="nav-icon text-sm fas fa-layer-group"></i>
              <p>
                {{ config('admin.news.name') }}<i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (config('admin.news.category.active') === true)
                <li class="nav-item has-treeview">
                  <a class="nav-link" href="#" title="{{ config('admin.news.category.name') }}">
                    <i class="nav-icon text-sm fas fa-boxes"></i>
                    <p>
                      {{ config('admin.news.category.name') }}
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    {{-- Category 1 --}}
                    @if(config('admin.news.category.category1.active') === true)
                      <li class="nav-item">
                        <a class="nav-link" href="" title="{{ config('admin.news.category.category1.name') }}">
                          <i class="nav-icon text-sm far fa-caret-square-right"></i>{{ config('admin.news.category.category1.name') }}
                        </a>
                      </li>
                    @endif

                    {{-- Category 2 --}}
                    <li class="nav-item">
                      <a class="nav-link" href="" title="Danh mục cấp 2">
                        <i class="nav-icon text-sm far fa-caret-square-right"></i>Danh mục cấp 2
                      </a>
                    </li>

                    {{-- Category 3 --}}
                    <li class="nav-item">
                      <a class="nav-link" href="" title="Danh mục cấp 2">
                        <i class="nav-icon text-sm far fa-caret-square-right"></i>Danh mục cấp 3
                      </a>
                    </li>

                    {{-- Category 4 --}}
                    <li class="nav-item">
                      <a class="nav-link" href="" title="Danh mục cấp 2">
                        <i class="nav-icon text-sm far fa-caret-square-right"></i>Danh mục cấp 4
                      </a>
                    </li>
                  </ul>
                </li>
              @endif
              <li class="nav-item">
                <a class="nav-link {{session('module_active') === 'news_index' || session('module_active') === 'news_create' ? 'active' : '' }}" href="{{url('admin/news')}}" title="Tin tức">
                  <i class="nav-icon text-sm fas fa-boxes"></i><p>Tin tức</p>
                </a>
              </li>
            </ul>
          </li>
        @endif

        {{-- Module post --}}
        @if (config('admin.post.active') === true)
          <li class="nav-item has-treeview menu-group {{session('module_active') === 'policy_index' || session('module_active') === 'policy_create' || session('module_active') === 'criteria_index' || session('module_active') === 'criteria_create' ? 'menu-open' : '' }}">
            <a class="nav-link {{session('module_active') === 'policy_index' || session('module_active') === 'policy_create' || session('module_active') === 'criteria_index' || session('module_active') === 'criteria_create' ? 'active' : '' }}" title="{{ config('admin.post.name') }}">
              <i class="nav-icon text-sm fas fa-boxes"></i>
              <p>
                {{ config('admin.post.name') }}<i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              {{-- Criteria --}}
              @if (config('admin.post.criteria.active') === true)
                <li class="nav-item">
                  <a class="nav-link {{session('module_active') === 'criteria_index' ? 'active' : '' }}" href="{{ route('admin.criteria.index') }}" title="{{ config('admin.post.criteria.name') }}">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>{{ config('admin.post.criteria.name') }}</p>
                  </a>
                </li>
              @endif

              {{-- Policy --}}
              @if (config('admin.post.policy.active') === true)
                <li class="nav-item">
                  <a class="nav-link {{session('module_active') === 'policy_index' ? 'active' : '' }}" href="{{ route('admin.policy.index') }}" title="{{ config('admin.post.policy.name') }}">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>{{ config('admin.post.policy.name') }}</p>
                  </a>
                </li>
              @endif
            </ul>
          </li>
        @endif

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
