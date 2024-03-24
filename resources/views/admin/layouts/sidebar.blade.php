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

        {{-- MODULE PRODUCT --}}
        @if (config('admin.product.active') === true)
          <li class="nav-item has-treeview menu-group {{session('module_active') === 'product_index' || session('module_active') === 'product_create' || session('module_active') === 'category_product_level1_index' || session('module_active') === 'category_product_level1_create' || session('module_active') === 'category_product_level2_index' || session('module_active') === 'category_product_level2_create' || session('module_active') === 'category_product_level3_index' || session('module_active') === 'category_product_level3_create' || session('module_active') === 'category_product_level4_index' || session('module_active') === 'category_product_level4_create' ? 'menu-open' : '' }}">
            <a class="nav-link {{session('module_active') === 'product_index' || session('module_active') === 'product_create' || session('module_active') === 'category_product_level1_index' || session('module_active') === 'category_product_level1_create' || session('module_active') === 'category_product_level2_index' || session('module_active') === 'category_product_level2_create' || session('module_active') === 'category_product_level3_index' || session('module_active') === 'category_product_level3_create' || session('module_active') === 'category_product_level4_index' || session('module_active') === 'category_product_level4_create' ? 'active' : '' }}" title="{{ config('admin.product.name') }}">
              <i class="nav-icon text-sm fas fa-layer-group"></i>
              <p>
                {{ config('admin.product.name') }}<i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (config('admin.product.category.active') === true)
                <li class="nav-item has-treeview {{session('module_active') === 'category_product_level1_index' || session('module_active') === 'category_product_level1_create' || session('module_active') === 'category_product_level2_index' || session('module_active') === 'category_product_level2_create' || session('module_active') === 'category_product_level3_index' || session('module_active') === 'category_product_level3_create' || session('module_active') === 'category_product_level4_index' || session('module_active') === 'category_product_level4_create' ? 'menu-open' : '' }}">
                  <a class="nav-link {{session('module_active') === 'category_product_level1_index' || session('module_active') === 'category_product_level1_create' || session('module_active') === 'category_product_level2_index' || session('module_active') === 'category_product_level2_create' || session('module_active') === 'category_product_level3_index' || session('module_active') === 'category_product_level3_create' || session('module_active') === 'category_product_level4_index' || session('module_active') === 'category_product_level4_create' ? 'active' : '' }}" href="#" title="{{ config('admin.product.category.name') }}">
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
                        <a href="{{ route('admin.category_product1') }}" class="nav-link {{session('module_active') === 'category_product_level1_index' || session('module_active') === 'category_product_level1_create' ? 'active' : '' }}" title="{{ config('admin.product.category.category1.name') }}">
                          <i class="nav-icon text-sm far fa-caret-square-right"></i>{{ config('admin.product.category.category1.name') }}
                        </a>
                      </li>
                    @endif

                    {{-- Category 2 --}}
                    @if(config('admin.product.category.category2.active') === true)
                      <li class="nav-item">
                        <a href="{{ route('admin.category_product2') }}" class="nav-link {{session('module_active') === 'category_product_level2_index' || session('module_active') === 'category_product_level2_create' ? 'active' : '' }}" title="{{ config('admin.product.category.category2.name') }}">
                          <i class="nav-icon text-sm far fa-caret-square-right"></i>{{ config('admin.product.category.category2.name') }}
                        </a>
                      </li>
                    @endif

                    {{-- Category 3 --}}
                    @if(config('admin.product.category.category3.active') === true)
                      <li class="nav-item">
                        <a href="{{ route('admin.category_product3') }}" class="nav-link {{session('module_active') === 'category_product_level3_index' || session('module_active') === 'category_product_level3_create' ? 'active' : '' }}" title="{{ config('admin.product.category.category3.name') }}">
                          <i class="nav-icon text-sm far fa-caret-square-right"></i>{{ config('admin.product.category.category3.name') }}
                        </a>
                      </li>
                    @endif

                    {{-- Category 4 --}}
                    @if(config('admin.product.category.category4.active') === true)
                      <li class="nav-item">
                        <a href="{{ route('admin.category_product4') }}" class="nav-link {{session('module_active') === 'category_product_level4_index' || session('module_active') === 'category_product_level4_create' ? 'active' : '' }}" title="{{ config('admin.product.category.category4.name') }}">
                          <i class="nav-icon text-sm far fa-caret-square-right"></i>{{ config('admin.product.category.category4.name') }}
                        </a>
                      </li>
                    @endif
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
          <li class="nav-item has-treeview menu-group {{session('module_active') === 'news_index' || session('module_active') === 'news_create' || session('module_active') === 'category_news_level1_index' || session('module_active') === 'category_news_level1_create' || session('module_active') === 'category_news_level2_index' || session('module_active') === 'category_news_level2_create' || session('module_active') === 'category_news_level3_index' || session('module_active') === 'category_news_level3_create' || session('module_active') === 'category_news_level4_index' || session('module_active') === 'category_news_level4_create' ? 'menu-open' : '' }}">
            <a class="nav-link {{session('module_active') === 'news_index' || session('module_active') === 'news_create' || session('module_active') === 'category_news_level1_index' || session('module_active') === 'category_news_level1_create' || session('module_active') === 'category_news_level2_index' || session('module_active') === 'category_news_level2_create' || session('module_active') === 'category_news_level3_index' || session('module_active') === 'category_news_level3_create' || session('module_active') === 'category_news_level4_index' || session('module_active') === 'category_news_level4_create' ? 'active' : '' }}" title="{{ config('admin.news.name') }}">
              <i class="nav-icon text-sm fas fa-layer-group"></i>
              <p>
                {{ config('admin.news.name') }}<i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (config('admin.news.category.active') === true)
                <li class="nav-item has-treeview {{session('module_active') === 'category_news_level1_index' || session('module_active') === 'category_news_level1_create' || session('module_active') === 'category_news_level2_index' || session('module_active') === 'category_news_level2_create' || session('module_active') === 'category_news_level3_index' || session('module_active') === 'category_news_level3_create' || session('module_active') === 'category_news_level4_index' || session('module_active') === 'category_news_level4_create' ? 'menu-open' : '' }}">
                  <a class="nav-link {{session('module_active') === 'category_news_level1_index' || session('module_active') === 'category_news_level1_create' || session('module_active') === 'category_news_level2_index' || session('module_active') === 'category_news_level2_create' || session('module_active') === 'category_news_level3_index' || session('module_active') === 'category_news_level3_create' || session('module_active') === 'category_news_level4_index' || session('module_active') === 'category_news_level4_create' ? 'active' : '' }}" href="#" title="{{ config('admin.news.category.name') }}">
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
                        <a href="{{ route('admin.category_news1') }}" class="nav-link {{session('module_active') === 'category_news_level1_index' || session('module_active') === 'category_news_level1_create' ? 'active' : '' }}" title="{{ config('admin.news.category.category1.name') }}">
                          <i class="nav-icon text-sm far fa-caret-square-right"></i>{{ config('admin.news.category.category1.name') }}
                        </a>
                      </li>
                    @endif

                    {{-- Category 2 --}}
                    @if(config('admin.news.category.category2.active') === true)
                      <li class="nav-item">
                        <a href="{{ route('admin.category_news2') }}" class="nav-link {{session('module_active') === 'category_news_level2_index' || session('module_active') === 'category_news_level2_create' ? 'active' : '' }}" title="{{ config('admin.news.category.category2.name') }}">
                          <i class="nav-icon text-sm far fa-caret-square-right"></i>{{ config('admin.news.category.category2.name') }}
                        </a>
                      </li>
                    @endif

                    {{-- Category 3 --}}
                    @if(config('admin.news.category.category3.active') === true)
                      <li class="nav-item">
                        <a href="{{ route('admin.category_news3') }}" class="nav-link {{session('module_active') === 'category_news_level3_index' || session('module_active') === 'category_news_level3_create' ? 'active' : '' }}" title="{{ config('admin.news.category.category3.name') }}">
                          <i class="nav-icon text-sm far fa-caret-square-right"></i>{{ config('admin.news.category.category3.name') }}
                        </a>
                      </li>
                    @endif

                    {{-- Category 4 --}}
                    @if(config('admin.news.category.category4.active') === true)
                      <li class="nav-item">
                        <a href="{{ route('admin.category_news4') }}" class="nav-link {{session('module_active') === 'category_news_level4_index' || session('module_active') === 'category_news_level4_create' ? 'active' : '' }}" href="" title="{{ config('admin.news.category.category4.name') }}">
                          <i class="nav-icon text-sm far fa-caret-square-right"></i>{{ config('admin.news.category.category4.name') }}
                        </a>
                      </li>
                    @endif
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
                  <a class="nav-link {{session('module_active') === 'criteria_index' || session('module_active') === 'criteria_create' ? 'active' : '' }}" href="{{ route('admin.criteria') }}" title="{{ config('admin.post.criteria.name') }}">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>{{ config('admin.post.criteria.name') }}</p>
                  </a>
                </li>
              @endif

              {{-- Policy --}}
              @if (config('admin.post.policy.active') === true)
                <li class="nav-item">
                  <a class="nav-link {{session('module_active') === 'policy_index' || session('module_active') === 'policy_create' ? 'active' : '' }}" href="{{ route('admin.policy') }}" title="{{ config('admin.post.policy.name') }}">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>{{ config('admin.post.policy.name') }}</p>
                  </a>
                </li>
              @endif
            </ul>
          </li>
        @endif

        {{-- Module photo --}}
        @if (config('admin.photo.active') === true)
          <li class="nav-item has-treeview menu-group {{session('module_active') === 'slideshow_index' || session('module_active') === 'slideshow_create' || session('module_active') === 'partner_index' || session('module_active') === 'partner_create' || session('module_active') === 'social_footer_index' || session('module_active') === 'social_footer_create' || session('module_active') === 'logo_create' || session('module_active') === 'watermark_product_create' ? 'menu-open' : '' }}">
            <a class="nav-link {{session('module_active') === 'slideshow_index' || session('module_active') === 'slideshow_create' || session('module_active') === 'partner_index' || session('module_active') === 'partner_create' || session('module_active') === 'social_footer_index' || session('module_active') === 'social_footer_create' || session('module_active') === 'logo_create' || session('module_active') === 'watermark_product_create' ? 'active' : '' }}" title="Quản lý hình ảnh">
              <i class="nav-icon text-sm fas fa-photo-video"></i>
              <p>
                Quản lý hình ảnh<i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              @if (config('admin.photo.slideshow.active') === true)
                <li class="nav-item">
                  <a class="nav-link {{session('module_active') === 'slideshow_index' || session('module_active') === 'slideshow_create' ? 'active' : '' }}" href="{{route('admin.photo.slideshow.index')}}" title="Slideshow">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>Slideshow</p>
                  </a>
                </li>
              @endif

              @if (config('admin.photo.partner.active') === true)
                <li class="nav-item">
                  <a class="nav-link {{session('module_active') === 'partner_index' || session('module_active') === 'partner_create' ? 'active' : '' }}" href="{{route('admin.photo.partner.index')}}" title="Đối tác">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>Đối tác</p>
                  </a>
                </li>
              @endif

              @if (config('admin.photo.social_footer.active') === true)
                <li class="nav-item">
                  <a class="nav-link {{session('module_active') === 'social_footer_index' || session('module_active') === 'social_footer_create' ? 'active' : '' }}" href="{{route('admin.photo.social_footer.index')}}" title="Social footer">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>Social footer</p>
                  </a>
                </li>
              @endif

              @if (config('admin.photo.logo.active') === true)
                <li class="nav-item">
                  <a class="nav-link {{session('module_active') === 'logo_create' ? 'active' : '' }}" href="{{route('admin.photo.logo')}}" title="Logo">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>Logo</p>
                  </a>
                </li>
              @endif

              @if (config('admin.photo.watermark_product.active') === true)
                <li class="nav-item">
                  <a class="nav-link {{session('module_active') === 'watermark_product_create' ? 'active' : '' }}" href="{{route('admin.photo.watermark_product')}}" title="Watermark sản phẩm">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>Watermark sản phẩm</p>
                  </a>
                </li>
              @endif

              @if (config('admin.photo.watermark_news.active') === true)
                <li class="nav-item">
                  <a class="nav-link {{session('module_active') === 'watermark_news_create' ? 'active' : '' }}" href="{{route('admin.photo.watermark_news')}}" title="Watermark tin tức">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>Watermark tin tức</p>
                  </a>
                </li>
              @endif
            </ul>
          </li>
        @endif

        {{-- Module page --}}
        @if (config('admin.page.active') === true)
          <li class="nav-item has-treeview menu-group {{ session('module_active') === 'about_create' || session('module_active') === 'footer_create' || session('module_active') === 'contact_create' || session('module_active') === 'copyright_create' ? 'menu-open' : '' }}">
            <a class="nav-link {{ session('module_active') === 'about_create' || session('module_active') === 'footer_create' || session('module_active') === 'contact_create' || session('module_active') === 'copyright_create' ? 'active' : '' }}" title="Quản lý trang tĩnh">
              <i class="nav-icon text-sm fas fa-bookmark"></i>
              <p>
                Quản lý trang tĩnh<i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              @if (config('admin.page.about.active') === true)
                <li class="nav-item">
                  <a class="nav-link {{session('module_active') === 'about_create' ? 'active' : ''}}" href="{{route('admin.page.about')}}" title="Giới thiệu">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>Giới thiệu</p>
                  </a>
                </li>
              @endif

              @if (config('admin.page.footer.active') === true)
                <li class="nav-item">
                  <a class="nav-link {{session('module_active') === 'footer_create' ? 'active' : ''}}" href="{{route('admin.page.footer')}}" title="Footer">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>Footer</p>
                  </a>
                </li>
              @endif

              @if (config('admin.page.contact.active') === true)
                <li class="nav-item">
                  <a class="nav-link {{session('module_active') === 'contact_create' ? 'active' : ''}}" href="{{route('admin.page.contact')}}" title="Liên hệ">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>Liên hệ</p>
                  </a>
                </li>
              @endif

              @if (config('admin.page.copyright.active') === true)
                <li class="nav-item">
                  <a class="nav-link {{session('module_active') === 'copyright_create' ? 'active' : ''}}" href="{{route('admin.page.copyright')}}" title="Copyright">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>Copyright</p>
                  </a>
                </li>
              @endif
            </ul>
          </li>
        @endif

        {{-- Module seopage --}}
        @if (config('admin.seopage.active') === true)
          <li class="nav-item has-treeview menu-group {{session('module_active') === 'seopage_home' || session('module_active') === 'seopage_product' || session('module_active') === 'seopage_news' || session('module_active') === 'seopage_contact' ? 'menu-open' : ''}}">
            <a class="nav-link {{session('module_active') === 'seopage_home' || session('module_active') === 'seopage_product' || session('module_active') === 'seopage_news' || session('module_active') === 'seopage_contact' ? 'active' : ''}}" title="Quản lý seopage">
              <i class="nav-icon text-sm fas fa-share-alt"></i>
              <p>
                Quản lý seopage<i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a class="nav-link {{session('module_active') === 'seopage_home' ? 'active' : ''}}" href="{{route('admin.seopage.home')}}" title="Trang chủ">
                  <i class="nav-icon text-sm far fa-caret-square-right"></i><p>Trang chủ</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{session('module_active') === 'seopage_product' ? 'active' : ''}}" href="{{route('admin.seopage.product')}}" title="Sản phẩm">
                  <i class="nav-icon text-sm far fa-caret-square-right"></i><p>Sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{session('module_active') === 'seopage_news' ? 'active' : ''}}" href="{{route('admin.seopage.news')}}" title="Tin tức">
                  <i class="nav-icon text-sm far fa-caret-square-right"></i><p>Tin tức</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{session('module_active') === 'seopage_contact' ? 'active' : ''}}" href="{{route('admin.seopage.contact')}}" title="Liên hệ">
                  <i class="nav-icon text-sm far fa-caret-square-right"></i><p>Liên hệ</p>
                </a>
              </li>
            </ul>
          </li>
        @endif

        {{-- Module setting --}}
        <li class="nav-item">
          <a class="nav-link" href="#" title="Thiết lập chung">
            <i class="nav-icon text-sm fas fa-cogs"></i>
            <p>Thiết lập chung</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
