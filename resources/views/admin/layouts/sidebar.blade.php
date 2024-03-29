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
          <li class="nav-item has-treeview menu-group {{session('module_active') === 'product_index' || session('module_active') === 'product_create' || session('module_active') === 'category_product_level1_index' || session('module_active') === 'category_product_level1_create' || session('module_active') === 'category_product_level2_index' || session('module_active') === 'category_product_level2_create' || session('module_active') === 'category_product_level3_index' || session('module_active') === 'category_product_level3_create' || session('module_active') === 'category_product_level4_index' || session('module_active') === 'category_product_level4_create' || session('module_active') === 'tag_product_index' || session('module_active') === 'tag_product_create' ? 'menu-open' : '' }}">
            <a class="nav-link {{session('module_active') === 'product_index' || session('module_active') === 'product_create' || session('module_active') === 'category_product_level1_index' || session('module_active') === 'category_product_level1_create' || session('module_active') === 'category_product_level2_index' || session('module_active') === 'category_product_level2_create' || session('module_active') === 'category_product_level3_index' || session('module_active') === 'category_product_level3_create' || session('module_active') === 'category_product_level4_index' || session('module_active') === 'category_product_level4_create' || session('module_active') === 'tag_product_index' || session('module_active') === 'tag_product_create' ? 'active' : '' }}" title="{{ config('admin.product.name') }}">
              <i class="nav-icon text-sm fa-solid fa-burger"></i>
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

              {{-- Tag product --}}
              @if (config('admin.product.tag.active') === true)
                <li class="nav-item">
                  <a class="nav-link {{session('module_active') === 'tag_product_index' || session('module_active') === 'tag_product_create' ? 'active' : '' }}" href="{{route('admin.tag_product')}}" title="{{config('admin.product.tag.name')}}">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>{{config('admin.product.tag.name')}}</p>
                  </a>
                </li>
              @endif

              <li class="nav-item">
                <a class="nav-link {{session('module_active') === 'product_index' || session('module_active') === 'product_create' ? 'active' : '' }}" href="{{url('admin/product')}}" title="Sản phẩm">
                  <i class="nav-icon text-sm far fa-caret-square-right"></i><p>Sản phẩm</p>
                </a>
              </li>
            </ul>
          </li>
        @endif

        {{-- Module news --}}
        @if (config('admin.news.active') === true)
          <li class="nav-item has-treeview menu-group {{session('module_active') === 'news_index' || session('module_active') === 'news_create' || session('module_active') === 'category_news_level1_index' || session('module_active') === 'category_news_level1_create' || session('module_active') === 'category_news_level2_index' || session('module_active') === 'category_news_level2_create' || session('module_active') === 'category_news_level3_index' || session('module_active') === 'category_news_level3_create' || session('module_active') === 'category_news_level4_index' || session('module_active') === 'category_news_level4_create' ? 'menu-open' : '' }}">
            <a class="nav-link {{session('module_active') === 'news_index' || session('module_active') === 'news_create' || session('module_active') === 'category_news_level1_index' || session('module_active') === 'category_news_level1_create' || session('module_active') === 'category_news_level2_index' || session('module_active') === 'category_news_level2_create' || session('module_active') === 'category_news_level3_index' || session('module_active') === 'category_news_level3_create' || session('module_active') === 'category_news_level4_index' || session('module_active') === 'category_news_level4_create' ? 'active' : '' }}" title="{{ config('admin.news.name') }}">
              <i class="nav-icon text-sm fa-solid fa-newspaper"></i>
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
                  <i class="nav-icon text-sm far fa-caret-square-right"></i><p>Tin tức</p>
                </a>
              </li>
            </ul>
          </li>
        @endif

        {{-- Module post --}}
        @if (config('admin.post.active') === true)
          <li class="nav-item has-treeview menu-group {{session('module_active') === 'policy_index' || session('module_active') === 'policy_create' || session('module_active') === 'criteria_index' || session('module_active') === 'criteria_create' ? 'menu-open' : '' }}">
            <a class="nav-link {{session('module_active') === 'policy_index' || session('module_active') === 'policy_create' || session('module_active') === 'criteria_index' || session('module_active') === 'criteria_create' ? 'active' : '' }}" title="{{ config('admin.post.name') }}">
              <i class="nav-icon text-sm fa-solid fa-book"></i>
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

        {{-- Module newsletter --}}
        @if (config('admin.message.active') === true)
          <li class="nav-item has-treeview {{session('module_active') === 'newsletter_index' || session('module_active') === 'newsletter_create' ? 'menu-open' : ''}}">
            <a class="nav-link {{session('module_active') === 'newsletter_index' || session('module_active') === 'newsletter_create' ? 'active' : ''}}" href="#" title="{{config('admin.message.name')}}">
              <i class="nav-icon text-sm fas fa-envelope"></i>
              <p>
                {{config('admin.message.name')}}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (config('admin.message.newsletter.active') === true)
                <li class="nav-item ">
                  <a class="nav-link {{session('module_active') === 'newsletter_index' || session('module_active') === 'newsletter_create' ? 'active' : ''}}" href="{{route('admin.newsletter.index')}}" title="{{config('admin.message.newsletter.name')}}"><i class="nav-icon text-sm far fa-caret-square-right"></i>
                    <p>{{config('admin.message.newsletter.name')}}</p>
                  </a>
                </li>
              @endif
            </ul>
          </li>
        @endif

        {{-- Module photo --}}
        @if (config('admin.photo.active') === true)
          <li class="nav-item has-treeview menu-group {{session('module_active') === 'slideshow_index' || session('module_active') === 'slideshow_create' || session('module_active') === 'partner_index' || session('module_active') === 'partner_create' || session('module_active') === 'social_footer_index' || session('module_active') === 'social_footer_create' || session('module_active') === 'logo_create' || session('module_active') === 'watermark_product_create' ? 'menu-open' : '' }}">
            <a class="nav-link {{session('module_active') === 'slideshow_index' || session('module_active') === 'slideshow_create' || session('module_active') === 'partner_index' || session('module_active') === 'partner_create' || session('module_active') === 'social_footer_index' || session('module_active') === 'social_footer_create' || session('module_active') === 'logo_create' || session('module_active') === 'watermark_product_create' ? 'active' : '' }}" title="{{config('admin.photo.name')}}">
              <i class="nav-icon text-sm fas fa-photo-video"></i>
              <p>
                {{config('admin.photo.name')}}<i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              @if (config('admin.photo.slideshow.active') === true)
                <li class="nav-item">
                  <a class="nav-link {{session('module_active') === 'slideshow_index' || session('module_active') === 'slideshow_create' ? 'active' : '' }}" href="{{route('admin.photo.slideshow.index')}}" title="{{config('admin.photo.slideshow.name')}}">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>{{config('admin.photo.slideshow.name')}}</p>
                  </a>
                </li>
              @endif

              @if (config('admin.photo.partner.active') === true)
                <li class="nav-item">
                  <a class="nav-link {{session('module_active') === 'partner_index' || session('module_active') === 'partner_create' ? 'active' : '' }}" href="{{route('admin.photo.partner.index')}}" title="{{config('admin.photo.partner.name')}}">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>{{config('admin.photo.partner.name')}}</p>
                  </a>
                </li>
              @endif

              @if (config('admin.photo.social_footer.active') === true)
                <li class="nav-item">
                  <a class="nav-link {{session('module_active') === 'social_footer_index' || session('module_active') === 'social_footer_create' ? 'active' : '' }}" href="{{route('admin.photo.social_footer.index')}}" title="{{config('admin.photo.social_footer.name')}}">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>{{config('admin.photo.social_footer.name')}}</p>
                  </a>
                </li>
              @endif

              @if (config('admin.photo.logo.active') === true)
                <li class="nav-item">
                  <a class="nav-link {{session('module_active') === 'logo_create' ? 'active' : '' }}" href="{{route('admin.photo.logo')}}" title="{{config('admin.photo.logo.name')}}">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>{{config('admin.photo.logo.name')}}</p>
                  </a>
                </li>
              @endif

              @if (config('admin.photo.watermark_product.active') === true)
                <li class="nav-item">
                  <a class="nav-link {{session('module_active') === 'watermark_product_create' ? 'active' : '' }}" href="{{route('admin.photo.watermark_product')}}" title="{{config('admin.photo.watermark_product.name')}}">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>{{config('admin.photo.watermark_product.name')}}</p>
                  </a>
                </li>
              @endif

              @if (config('admin.photo.watermark_news.active') === true)
                <li class="nav-item">
                  <a class="nav-link {{session('module_active') === 'watermark_news_create' ? 'active' : '' }}" href="{{route('admin.photo.watermark_news')}}" title="{{config('admin.photo.watermark_news.name')}}">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>{{config('admin.photo.watermark_news.name')}}</p>
                  </a>
                </li>
              @endif
            </ul>
          </li>
        @endif

        {{-- Module video --}}
        @if (config('admin.video.active') === true)
          <li class="nav-item has-treeview menu-group {{session('module_active') === 'video_multiple_index' || session('module_active') === 'video_multiple_create' || session('module_active') === 'video_static_index' ? 'menu-open' : '' }}" title="{{config('admin.video.name')}}">
            <a class="nav-link {{session('module_active') === 'video_multiple_index' || session('module_active') === 'video_multiple_create' || session('module_active') === 'video_static_index' ? 'active' : '' }}" title="{{config('admin.video.name')}}">
              <i class="nav-icon text-sm fa-solid fa-video"></i>
              <p>
                {{config('admin.video.name')}}<i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if (config('admin.video.video_multiple.active') === true)
                <li class="nav-item">
                  <a class="nav-link {{session('module_active') === 'video_multiple_index' || session('module_active') === 'video_multiple_create' ? 'active' : '' }}" href="{{route('admin.video.video_multiple.index')}}" title="{{config('admin.video.video_multiple.name')}}">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>{{config('admin.video.video_multiple.name')}}</p>
                  </a>
                </li>
              @endif
              @if (config('admin.video.video_static.active') === true)
                <li class="nav-item">
                  <a class="nav-link {{session('module_active') === 'video_static_index' ? 'active' : '' }}" href="{{route('admin.video.video_static.index')}}" title="{{config('admin.video.video_static.name')}}">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>{{config('admin.video.video_static.name')}}</p>
                  </a>
                </li>
              @endif
            </ul>
          </li>
        @endif

        {{-- Module place --}}
        @if (config('admin.place.active') === true)
          <li class="nav-item has-treeview menu-group {{session('module_active') === 'city_index' || session('module_active') === 'city_create' || session('module_active') === 'district_index' || session('module_active') === 'district_create' || session('module_active') === 'ward_index' || session('module_active') === 'ward_create' ? 'menu-open' : '' }}">
            <a class="nav-link {{session('module_active') === 'city_index' || session('module_active') === 'city_create' || session('module_active') === 'district_index' || session('module_active') === 'district_create' || session('module_active') === 'ward_index' || session('module_active') === 'ward_create' ? 'active' : '' }}" title="{{config('admin.place.name')}}">
              <i class="nav-icon text-sm fas fa-building"></i>
              <p>
                {{config('admin.place.name')}}<i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              @if (config('admin.place.city.active') === true)
                <li class="nav-item">
                  <a class="nav-link {{session('module_active') === 'city_index' || session('module_active') === 'city_create' ? 'active' : '' }}" href="{{route('admin.place.city.index',['type' => config('admin.place.city.type')])}}" title="{{config('admin.place.city.name')}}">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>{{config('admin.place.city.name')}}</p>
                  </a>
                </li>
              @endif

              @if (config('admin.place.district.active') === true)
                <li class="nav-item">
                  <a class="nav-link {{session('module_active') === 'district_index' || session('module_active') === 'district_create' ? 'active' : '' }}" href="{{route('admin.place.district.index',['type' => config('admin.place.district.type')])}}" title="{{config('admin.place.district.name')}}">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>{{config('admin.place.district.name')}}</p>
                  </a>
                </li>
              @endif

              @if (config('admin.place.ward.active') === true)
                <li class="nav-item">
                  <a class="nav-link {{session('module_active') === 'ward_index' || session('module_active') === 'ward_create' ? 'active' : '' }}" href="{{route('admin.place.ward.index',['type' => config('admin.place.ward.type')])}}" title="{{config('admin.place.ward.name')}}">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>{{config('admin.place.ward.name')}}</p>
                  </a>
                </li>
              @endif
            </ul>
          </li>
        @endif

        {{-- Module page --}}
        @if (config('admin.page.active') === true)
          <li class="nav-item has-treeview menu-group {{ session('module_active') === 'about_create' || session('module_active') === 'footer_create' || session('module_active') === 'contact_create' || session('module_active') === 'copyright_create' ? 'menu-open' : '' }}">
            <a class="nav-link {{ session('module_active') === 'about_create' || session('module_active') === 'footer_create' || session('module_active') === 'contact_create' || session('module_active') === 'copyright_create' ? 'active' : '' }}" title="{{config('admin.page.name')}}">
              <i class="nav-icon text-sm fas fa-bookmark"></i>
              <p>
                {{config('admin.page.name')}}<i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              @if (config('admin.page.about.active') === true)
                <li class="nav-item">
                  <a class="nav-link {{session('module_active') === 'about_create' ? 'active' : ''}}" href="{{route('admin.page.about')}}" title="{{config('admin.page.about.name')}}">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>{{config('admin.page.about.name')}}</p>
                  </a>
                </li>
              @endif

              @if (config('admin.page.footer.active') === true)
                <li class="nav-item">
                  <a class="nav-link {{session('module_active') === 'footer_create' ? 'active' : ''}}" href="{{route('admin.page.footer')}}" title="{{config('admin.page.footer.name')}}">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>{{config('admin.page.footer.name')}}</p>
                  </a>
                </li>
              @endif

              @if (config('admin.page.contact.active') === true)
                <li class="nav-item">
                  <a class="nav-link {{session('module_active') === 'contact_create' ? 'active' : ''}}" href="{{route('admin.page.contact')}}" title="{{config('admin.page.contact.name')}}">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>{{config('admin.page.contact.name')}}</p>
                  </a>
                </li>
              @endif

              @if (config('admin.page.copyright.active') === true)
                <li class="nav-item">
                  <a class="nav-link {{session('module_active') === 'copyright_create' ? 'active' : ''}}" href="{{route('admin.page.copyright')}}" title="{{config('admin.page.copyright.name')}}">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>{{config('admin.page.copyright.name')}}</p>
                  </a>
                </li>
              @endif
            </ul>
          </li>
        @endif

        {{-- Module seopage --}}
        @if (config('admin.seopage.active') === true)
          <li class="nav-item has-treeview menu-group {{session('module_active') === 'seopage_home' || session('module_active') === 'seopage_product' || session('module_active') === 'seopage_news' || session('module_active') === 'seopage_contact' ? 'menu-open' : ''}}">
            <a class="nav-link {{session('module_active') === 'seopage_home' || session('module_active') === 'seopage_product' || session('module_active') === 'seopage_news' || session('module_active') === 'seopage_contact' ? 'active' : ''}}" title="{{config('admin.seopage.name')}}">
              <i class="nav-icon text-sm fas fa-share-alt"></i>
              <p>
                {{config('admin.seopage.name')}}<i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              @if (config('admin.seopage.home.active') === true)
                <li class="nav-item">
                  <a class="nav-link {{session('module_active') === 'seopage_home' ? 'active' : ''}}" href="{{route('admin.seopage.home')}}" title="{{config('admin.seopage.home.name')}}">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>{{config('admin.seopage.home.name')}}</p>
                  </a>
                </li>
              @endif

              @if (config('admin.seopage.product.active') === true)
                <li class="nav-item">
                  <a class="nav-link {{session('module_active') === 'seopage_product' ? 'active' : ''}}" href="{{route('admin.seopage.product')}}" title="{{config('admin.seopage.product.name')}}">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>{{config('admin.seopage.product.name')}}</p>
                  </a>
                </li>
              @endif

              @if (config('admin.seopage.news.active') === true)
                <li class="nav-item">
                  <a class="nav-link {{session('module_active') === 'seopage_news' ? 'active' : ''}}" href="{{route('admin.seopage.news')}}" title="{{config('admin.seopage.news.name')}}">
                    <i class="nav-icon text-sm far fa-caret-square-right"></i><p>{{config('admin.seopage.news.name')}}</p>
                  </a>
                </li>
              @endif

              @if (config('admin.seopage.contact.active') === true)
              <li class="nav-item">
                <a class="nav-link {{session('module_active') === 'seopage_contact' ? 'active' : ''}}" href="{{route('admin.seopage.contact')}}" title="{{config('admin.seopage.contact.name')}}">
                  <i class="nav-icon text-sm far fa-caret-square-right"></i><p>{{config('admin.seopage.contact.name')}}</p>
                </a>
              </li>
              @endif
            </ul>
          </li>
        @endif

        {{-- Module setting --}}
        <li class="nav-item">
          <a class="nav-link {{session('module_active') === 'setting_index' ? 'active' : ''}}" href="{{route('admin.setting')}}" title="{{config('admin.setting.name')}}">
            <i class="nav-icon text-sm fas fa-cogs"></i>
            <p>{{config('admin.setting.name')}}</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
