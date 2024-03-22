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
    'thumb1' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
    'photo2' => false,
    'thumb2' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
    'photo3' => false,
    'thumb3' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
    'photo4' => false,
    'thumb4' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
    'gallery' => [
      'active' => true,
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
        'thumb1' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo2' => false,
        'thumb2' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo3' => false,
        'thumb3' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo4' => false,
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
        'thumb1' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo2' => false,
        'thumb2' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo3' => false,
        'thumb3' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo4' => false,
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
        'thumb1' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo2' => false,
        'thumb2' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo3' => false,
        'thumb3' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo4' => false,
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
        'thumb1' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo2' => false,
        'thumb2' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo3' => false,
        'thumb3' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo4' => false,
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
        'thumb1' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo2' => false,
        'thumb2' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo3' => false,
        'thumb3' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo4' => false,
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
        'thumb1' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo2' => false,
        'thumb2' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo3' => false,
        'thumb3' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo4' => false,
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
        'thumb1' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo2' => false,
        'thumb2' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo3' => false,
        'thumb3' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo4' => false,
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
        'thumb1' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo2' => false,
        'thumb2' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo3' => false,
        'thumb3' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo4' => false,
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
      'thumb1' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
      'photo2' => false,
      'thumb2' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
      'photo3' => false,
      'thumb3' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
      'photo4' => false,
      'thumb4' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
    ],
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
      'thumb1' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
      'photo2' => false,
      'thumb2' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
      'photo3' => false,
      'thumb3' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
      'photo4' => false,
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
    // Slideshow
    'slideshow' => [
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
      'thumb' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
    ],

    // Social footer
    'social_footer' => [
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
      'thumb' => 'Width: 30 px - Height: 30 px (.jpg|.gif|.png|.jpeg|.gif)',
    ],
  ],

  /* Configure static module */
  'static' => [],

  /* Configure seopage module */
  'seopage' => [],

  /* Configure setting module */
  'setting' => [],

];
