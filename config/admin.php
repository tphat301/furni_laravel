<?php

return [
  /* Configure dashboard module */
  'dashboard' => [
    'name' => 'Dashboard'
  ],

  /* Configure product module */
  'product' => [
    'active' => true,
    'name' => 'Quản lý sản phẩm',
    'type' => 'product',
    'slug' => true,
    'code' => true,
    'copy' => true,
    'number_per_page' => 10,
    'sale_price' => true,
    'regular_price' => true,
    'discount' => true,
    'status' => [
      'banchay' => 'Bán chạy',
      'noibat' => 'Nổi bật',
      'hienthi' => 'Hiển thị'
    ],
    'desc' => true,
    'desc_tiny' => true,
    'content' => true,
    'content_tiny' => true,
    'photo1' => true,
    'width1' => 300,
    'height1' => 300,
    'thumb1' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
    'photo2' => false,
    'width2' => 300,
    'height2' => 300,
    'thumb2' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
    'photo3' => false,
    'width3' => 300,
    'height3' => 300,
    'thumb3' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
    'photo4' => false,
    'width4' => 300,
    'height4' => 300,
    'thumb4' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
    'gallery' => [
      'active' => true,
      'width' => 200,
      'height' => 200,
      'thumb' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)'
    ],
    'size' => false,
    'color' => false,
    'category' => [
      'name' => 'Danh mục sản phẩm',
      'active' => true,
      'category1' => [
        'active' => true,
        'copy' => true,
        'name' => 'Danh mục cấp 1',
        'type' => 'product',
        'number_per_page' => 10,
        'status' => [
          'noibat' => 'Nổi bật',
          'hienthi' => 'Hiển thị'
        ],
        'slug' => true,
        'desc' => true,
        'desc_tiny' => true,
        'content' => true,
        'content_tiny' => true,
        'photo1' => true,
        'width1' => 300,
        'height1' => 300,
        'thumb1' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo2' => false,
        'width2' => 300,
        'height2' => 300,
        'thumb2' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo3' => false,
        'width3' => 300,
        'height3' => 300,
        'thumb3' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo4' => false,
        'width4' => 300,
        'height4' => 300,
        'thumb4' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'seo' => true,
        'seo_title' => true,
        'seo_keyword' => true,
        'seo_desc' => true
      ],
      'category2' => [
        'active' => true,
        'copy' => true,
        'name' => 'Danh mục cấp 2',
        'type' => 'product',
        'number_per_page' => 10,
        'status' => [
          'noibat' => 'Nổi bật',
          'hienthi' => 'Hiển thị'
        ],
        'slug' => true,
        'desc' => true,
        'desc_tiny' => true,
        'content' => true,
        'content_tiny' => true,
        'photo1' => true,
        'width1' => 300,
        'height1' => 300,
        'thumb1' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo2' => false,
        'width2' => 300,
        'height2' => 300,
        'thumb2' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo3' => false,
        'width3' => 300,
        'height3' => 300,
        'thumb3' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo4' => false,
        'width4' => 300,
        'height4' => 300,
        'thumb4' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'seo' => true,
        'seo_title' => true,
        'seo_keyword' => true,
        'seo_desc' => true
      ],
      'category3' => [
        'active' => true,
        'copy' => true,
        'name' => 'Danh mục cấp 3',
        'type' => 'product',
        'number_per_page' => 10,
        'status' => [
          'noibat' => 'Nổi bật',
          'hienthi' => 'Hiển thị'
        ],
        'slug' => true,
        'desc' => true,
        'desc_tiny' => true,
        'content' => true,
        'content_tiny' => true,
        'photo1' => true,
        'width1' => 300,
        'height1' => 300,
        'thumb1' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo2' => false,
        'width2' => 300,
        'height2' => 300,
        'thumb2' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo3' => false,
        'width3' => 300,
        'height3' => 300,
        'thumb3' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo4' => false,
        'width4' => 300,
        'height4' => 300,
        'thumb4' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'seo' => true,
        'seo_title' => true,
        'seo_keyword' => true,
        'seo_desc' => true
      ],
      'category4' => [
        'active' => true,
        'copy' => true,
        'name' => 'Danh mục cấp 4',
        'type' => 'product',
        'number_per_page' => 10,
        'status' => [
          'noibat' => 'Nổi bật',
          'hienthi' => 'Hiển thị'
        ],
        'slug' => true,
        'desc' => true,
        'desc_tiny' => true,
        'content' => true,
        'content_tiny' => true,
        'photo1' => true,
        'width1' => 300,
        'height1' => 300,
        'thumb1' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo2' => false,
        'width2' => 300,
        'height2' => 300,
        'thumb2' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo3' => false,
        'width3' => 300,
        'height3' => 300,
        'thumb3' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo4' => false,
        'width4' => 300,
        'height4' => 300,
        'thumb4' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'seo' => true,
        'seo_title' => true,
        'seo_keyword' => true,
        'seo_desc' => true
      ],
    ],
    'seo' => true,
    'seo_title' => true,
    'seo_keyword' => true,
    'seo_desc' => true,
    'schema' => true
  ],

  /* Configure news module */
  'news' => [
    'active' => true,
    'name' => 'Quản lý tin tức',
    'type' => 'news',
    'slug' => true,
    'copy' => true,
    'number_per_page' => 10,
    'status' => [
      'noibat' => 'Nổi bật',
      'hienthi' => 'Hiển thị'
    ],
    'desc' => true,
    'desc_tiny' => true,
    'content' => true,
    'content_tiny' => true,
    'photo1' => true,
    'width1' => 300,
    'height1' => 300,
    'thumb1' => 'Width: 300 px - Height: 300 px (.jpg|.gif|.png|.jpeg|.gif)',
    'photo2' => true,
    'width2' => 200,
    'height2' => 200,
    'thumb2' => 'Width: 200 px - Height: 200 px (.jpg|.gif|.png|.jpeg|.gif)',
    'photo3' => false,
    'width3' => 300,
    'height3' => 300,
    'thumb3' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
    'photo4' => false,
    'width4' => 300,
    'height4' => 300,
    'thumb4' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
    'gallery' => [
      'active' => true,
      'width' => 200,
      'height' => 200,
      'thumb' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)'
    ],
    'category' => [
      'name' => 'Danh mục tin tức',
      'active' => true,
      'category1' => [
        'active' => true,
        'copy' => true,
        'name' => 'Danh mục cấp 1',
        'type' => 'news',
        'number_per_page' => 10,
        'status' => [
          'noibat' => 'Nổi bật',
          'hienthi' => 'Hiển thị'
        ],
        'slug' => true,
        'desc' => true,
        'desc_tiny' => true,
        'content' => true,
        'content_tiny' => true,
        'photo1' => true,
        'width1' => 300,
        'height1' => 300,
        'thumb1' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo2' => false,
        'width2' => 300,
        'height2' => 300,
        'thumb2' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo3' => false,
        'width3' => 300,
        'height3' => 300,
        'thumb3' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo4' => false,
        'width4' => 300,
        'height4' => 300,
        'thumb4' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'seo' => true,
        'seo_title' => true,
        'seo_keyword' => true,
        'seo_desc' => true
      ],
      'category2' => [
        'active' => true,
        'copy' => true,
        'name' => 'Danh mục cấp 2',
        'type' => 'news',
        'number_per_page' => 10,
        'status' => [
          'noibat' => 'Nổi bật',
          'hienthi' => 'Hiển thị'
        ],
        'slug' => true,
        'desc' => true,
        'desc_tiny' => true,
        'content' => true,
        'content_tiny' => true,
        'photo1' => true,
        'width1' => 300,
        'height1' => 300,
        'thumb1' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo2' => false,
        'width2' => 300,
        'height2' => 300,
        'thumb2' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo3' => false,
        'width3' => 300,
        'height3' => 300,
        'thumb3' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo4' => false,
        'width4' => 300,
        'height4' => 300,
        'thumb4' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'seo' => true,
        'seo_title' => true,
        'seo_keyword' => true,
        'seo_desc' => true
      ],
      'category3' => [
        'active' => true,
        'copy' => true,
        'name' => 'Danh mục cấp 3',
        'type' => 'news',
        'number_per_page' => 10,
        'status' => [
          'noibat' => 'Nổi bật',
          'hienthi' => 'Hiển thị'
        ],
        'slug' => true,
        'desc' => true,
        'desc_tiny' => true,
        'content' => true,
        'content_tiny' => true,
        'photo1' => true,
        'width1' => 300,
        'height1' => 300,
        'thumb1' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo2' => false,
        'width2' => 300,
        'height2' => 300,
        'thumb2' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo3' => false,
        'width3' => 300,
        'height3' => 300,
        'thumb3' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo4' => false,
        'width4' => 300,
        'height4' => 300,
        'thumb4' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'seo' => true,
        'seo_title' => true,
        'seo_keyword' => true,
        'seo_desc' => true
      ],
      'category4' => [
        'active' => true,
        'copy' => true,
        'name' => 'Danh mục cấp 4',
        'type' => 'news',
        'number_per_page' => 10,
        'status' => [
          'noibat' => 'Nổi bật',
          'hienthi' => 'Hiển thị'
        ],
        'slug' => true,
        'desc' => true,
        'desc_tiny' => true,
        'content' => true,
        'content_tiny' => true,
        'photo1' => true,
        'width1' => 300,
        'height1' => 300,
        'thumb1' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo2' => false,
        'width2' => 300,
        'height2' => 300,
        'thumb2' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo3' => false,
        'width3' => 300,
        'height3' => 300,
        'thumb3' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo4' => false,
        'width4' => 300,
        'height4' => 300,
        'thumb4' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'seo' => true,
        'seo_title' => true,
        'seo_keyword' => true,
        'seo_desc' => true
      ],
    ],
    'seo' => true,
    'seo_title' => true,
    'seo_keyword' => true,
    'seo_desc' => true,
    'schema' => true
  ],

  /* Configure post module */
  'post' => [
    'active' => true,
    'name' => 'Quản lý bài viết',

    // Criteria
    'criteria' => [
      'active' => true,
      'name' => 'Tiêu chí',
      'type' => 'criteria',
      'status' => [
        'hienthi' => 'Hiển thị'
      ],
      'copy' => true,
      'number_per_page' => 10,
      'desc' => true,
      'desc_tiny' => false,
      'content' => false,
      'content_tiny' => false,
      'photo1' => true,
      'width1' => 300,
      'height1' => 300,
      'thumb1' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
      'photo2' => false,
      'width2' => 300,
      'height2' => 300,
      'thumb2' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
      'photo3' => false,
      'width3' => 300,
      'height3' => 300,
      'thumb3' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
      'photo4' => false,
      'width4' => 300,
      'height4' => 300,
      'thumb4' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
    ],

    // Policy
    'policy' => [
      'active' => true,
      'name' => 'Chính sách',
      'type' => 'policy',
      'slug' => true,
      'status' => [
        'noibat' => 'Nổi bật',
        'hienthi' => 'Hiển thị'
      ],
      'copy' => true,
      'number_per_page' => 10,
      'desc' => true,
      'desc_tiny' => true,
      'content' => true,
      'content_tiny' => true,
      'photo1' => true,
      'width1' => 300,
      'height1' => 300,
      'thumb1' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
      'photo2' => false,
      'width2' => 300,
      'height2' => 300,
      'thumb2' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
      'photo3' => false,
      'width3' => 300,
      'height3' => 300,
      'thumb3' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
      'photo4' => false,
      'width4' => 300,
      'height4' => 300,
      'thumb4' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
      'seo' => true,
      'seo_title' => true,
      'seo_keyword' => true,
      'seo_desc' => true,
      'schema' => true
    ]
  ],

  /* Configure photo module */
  'photo' => [
    'active' => true,
    'name' => 'Quản lý hình ảnh',
    'tab_info' => true,
    // Slideshow
    'slideshow' => [
      'active' => true,
      'name' => 'Slideshow',
      'type' => 'slideshow',
      'link' => true,
      'status' => [
        'noibat' => 'Nổi bật',
        'hienthi' => 'Hiển thị'
      ],
      'title' => true,
      'desc' => false,
      'content' => false,
      'number_per_page' => 10,
      'loop' => 4,
      'action' => 'multiple',
      'photo' => true,
      'with' => 300,
      'height' => 300,
      'thumb' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
    ],

    // Partner
    'partner' => [
      'active' => true,
      'name' => 'Đối tác',
      'type' => 'partner',
      'link' => true,
      'status' => [
        'hienthi' => 'Hiển thị'
      ],
      'title' => true,
      'desc' => false,
      'content' => false,
      'number_per_page' => 10,
      'loop' => 4,
      'action' => 'multiple',
      'photo' => true,
      'with' => 200,
      'height' => 120,
      'thumb' => 'Width: 200 px - Height: 120 px (.jpg|.gif|.svg|.webp|.png|.jpeg)',
    ],

    // Social footer
    'social_footer' => [
      'active' => true,
      'name' => 'Social footer',
      'type' => 'social_footer',
      'link' => true,
      'status' => [
        'hienthi' => 'Hiển thị'
      ],
      'title' => true,
      'desc' => false,
      'content' => false,
      'number_per_page' => 10,
      'loop' => 4,
      'action' => 'multiple',
      'photo' => true,
      'with' => 30,
      'height' => 30,
      'thumb' => 'Width: 30 px - Height: 30 px (.jpg|.gif|.png|.jpeg|.svg|.webp)',
    ],

    // Logo
    'logo' => [
      'active' => true,
      'name' => 'Logo',
      'type' => 'logo',
      'link' => false,
      'status' => [
        'hienthi' => 'Hiển thị'
      ],
      'title' => true,
      'desc' => false,
      'content' => false,
      'action' => 'static',
      'photo' => true,
      'with' => 100,
      'height' => 100,
      'thumb' => 'Width: 100 px - Height: 100 px (.jpg|.gif|.png|.jpeg|.svg|.webp)',
    ],

    // Watermark product
    'watermark_product' => [
      'active' => true,
      'layout' => true,
      'name' => 'Watermark product',
      'type' => 'watermark_product',
      'link' => false,
      'status' => [],
      'title' => false,
      'desc' => false,
      'content' => false,
      'action' => 'static',
      'photo' => true,
      'with' => 50,
      'height' => 50,
      'thumb' => 'Width: 50px - Height: 50px (.jpg|.gif|.png|.jpeg|.svg|.webp)'
    ],

    // Watermark news
    'watermark_news' => [
      'active' => false,
      'name' => 'Watermark news',
      'type' => 'watermark_news',
      'link' => false,
      'status' => [],
      'title' => true,
      'desc' => false,
      'content' => false,
      'action' => 'static',
      'photo' => true,
      'with' => 50,
      'height' => 50,
      'thumb' => 'Width: 50px - Height: 50px (.jpg|.gif|.png|.jpeg|.svg|.webp)'
    ],
  ],

  /* Configure page module */
  'page' => [
    'active' => true,
    'name' => 'Quản lý trang tĩnh',

    // About
    'about' => [
      'active' => true,
      'name' => 'Giới thiệu',
      'type' => 'about',
      'status' => [
        'hienthi' => 'Hiển thị'
      ],
      'photo1' => true,
      'with1' => 300,
      'height1' => 200,
      'thumb1' => 'Width: 300px - Height: 200px (.jpg|.gif|.png|.jpeg|.gif|.webp|.svg)',
      'photo2' => false,
      'with2' => 300,
      'height2' => 200,
      'thumb2' => 'Width: 300px - Height: 200px (.jpg|.gif|.png|.jpeg|.gif|.webp|.svg)',
      'photo3' => false,
      'with3' => 300,
      'height3' => 200,
      'thumb3' => 'Width: 300px - Height: 200px (.jpg|.gif|.png|.jpeg|.gif|.webp|.svg)',
      'photo4' => false,
      'with4' => 300,
      'height4' => 200,
      'thumb4' => 'Width: 300px - Height: 200px (.jpg|.gif|.png|.jpeg|.gif|.webp|.svg)',
      'slogan' => true,
      'slug' => true,
      'title' => true,
      'desc' => true,
      'desc_tiny' => true,
      'content' => true,
      'content_tiny' => true,
      'seo' => true,
      'seo_title' => true,
      'seo_keyword' => true,
      'seo_desc' => true
    ],

    // Footer
    'footer' => [
      'active' => true,
      'type' => 'footer',
      'name' => "Footer",
      'slug' => false,
      'status' => [
        'hienthi' => 'Hiển thị'
      ],
      'title' => true,
      'desc' => false,
      'desc_tiny' => false,
      'content' => true,
      'content_tiny' => true,
      'photo1' => false,
      'with1' => 300,
      'height1' => 200,
      'thumb1' => 'Width: 300px - Height: 200px (.jpg|.gif|.png|.jpeg|.gif|.webp|.svg)',
      'photo2' => false,
      'with2' => 300,
      'height2' => 200,
      'thumb2' => 'Width: 300px - Height: 200px (.jpg|.gif|.png|.jpeg|.gif|.webp|.svg)',
      'photo3' => false,
      'with3' => 300,
      'height3' => 200,
      'thumb3' => 'Width: 300px - Height: 200px (.jpg|.gif|.png|.jpeg|.gif|.webp|.svg)',
      'photo4' => false,
      'with4' => 300,
      'height4' => 200,
      'thumb4' => 'Width: 300px - Height: 200px (.jpg|.gif|.png|.jpeg|.gif|.webp|.svg)',
      'seo' => false,
      'seo_title' => false,
      'seo_keyword' => false,
      'seo_desc' => false
    ],

    // Contact
    'contact' => [
      'active' => true,
      'type' => 'contact',
      'name' => "Contact",
      'slug' => false,
      'status' => [
        'hienthi' => 'Hiển thị'
      ],
      'title' => true,
      'desc' => false,
      'desc_tiny' => false,
      'content' => true,
      'content_tiny' => true,
      'photo1' => false,
      'with1' => 300,
      'height1' => 200,
      'thumb1' => 'Width: 300px - Height: 200px (.jpg|.gif|.png|.jpeg|.gif|.webp|.svg)',
      'photo2' => false,
      'with2' => 300,
      'height2' => 200,
      'thumb2' => 'Width: 300px - Height: 200px (.jpg|.gif|.png|.jpeg|.gif|.webp|.svg)',
      'photo3' => false,
      'with3' => 300,
      'height3' => 200,
      'thumb3' => 'Width: 300px - Height: 200px (.jpg|.gif|.png|.jpeg|.gif|.webp|.svg)',
      'photo4' => false,
      'with4' => 300,
      'height4' => 200,
      'thumb4' => 'Width: 300px - Height: 200px (.jpg|.gif|.png|.jpeg|.gif|.webp|.svg)',
      'seo' => false,
      'seo_title' => false,
      'seo_keyword' => false,
      'seo_desc' => false
    ],

    // Copyright
    'copyright' => [
      'active' => true,
      'type' => 'copyright',
      'name' => "Copyright",
      'slug' => false,
      'status' => ['hienthi' => "Hiển thị"],
      'title' => true,
      'desc' => false,
      'desc_tiny' => false,
      'content' => false,
      'content_tiny' => false,
      'photo1' => false,
      'with1' => 300,
      'height1' => 200,
      'thumb1' => 'Width: 300px - Height: 200px (.jpg|.gif|.png|.jpeg|.gif|.webp|.svg)',
      'photo2' => false,
      'with2' => 300,
      'height2' => 200,
      'thumb2' => 'Width: 300px - Height: 200px (.jpg|.gif|.png|.jpeg|.gif|.webp|.svg)',
      'photo3' => false,
      'with3' => 300,
      'height3' => 200,
      'thumb3' => 'Width: 300px - Height: 200px (.jpg|.gif|.png|.jpeg|.gif|.webp|.svg)',
      'photo4' => false,
      'with4' => 300,
      'height4' => 200,
      'thumb4' => 'Width: 300px - Height: 200px (.jpg|.gif|.png|.jpeg|.gif|.webp|.svg)',
      'seo' => false,
      'seo_title' => false,
      'seo_keyword' => false,
      'seo_desc' => false
    ],
  ],

  /* Configure seopage module */
  'seopage' => [
    'active' => true,
    'name' => 'Quản lý seopage',

    // Home
    'home' => [
      'active' => true,
      'name' => 'Trang chủ',
      'type' => 'home',
      'status' => [
        'hienthi' => 'Hiển thị'
      ],
      'photo' => true,
      'with' => 300,
      'height' => 200,
      'thumb' => 'Width: 300px - Height: 200px (.jpg|.gif|.png|.jpeg|.gif|.webp|.svg)',
      'title' => true,
      'keywords' => true,
      'description' => true
    ],

    // Product
    'product' => [
      'active' => true,
      'name' => 'Sản phẩm',
      'type' => 'product',
      'status' => [
        'hienthi' => 'Hiển thị'
      ],
      'photo' => true,
      'with' => 300,
      'height' => 200,
      'thumb' => 'Width: 300px - Height: 200px (.jpg|.gif|.png|.jpeg|.gif|.webp|.svg)',
      'title' => true,
      'keywords' => true,
      'description' => true
    ],

    // News
    'news' => [
      'active' => true,
      'name' => 'Tin tức',
      'type' => 'news',
      'status' => [
        'hienthi' => 'Hiển thị'
      ],
      'photo' => true,
      'with' => 300,
      'height' => 200,
      'thumb' => 'Width: 300px - Height: 200px (.jpg|.gif|.png|.jpeg|.gif|.webp|.svg)',
      'title' => true,
      'keywords' => true,
      'description' => true
    ],

    // Contact
    'contact' => [
      'active' => true,
      'name' => 'Liên hệ',
      'type' => 'contact',
      'status' => [
        'hienthi' => 'Hiển thị'
      ],
      'photo' => true,
      'with' => 300,
      'height' => 200,
      'thumb' => 'Width: 300px - Height: 200px (.jpg|.gif|.png|.jpeg|.gif|.webp|.svg)',
      'title' => true,
      'keywords' => true,
      'description' => true
    ]
  ],

  /* Configure setting module */
  'setting' => [],

];
