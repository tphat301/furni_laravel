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
    'table' => 'products',
    'type' => 'product',
    'slug' => true,
    'code' => true,
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
    'photo2' => true,
    'thumb2' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
    'photo3' => true,
    'thumb3' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
    'photo4' => true,
    'thumb4' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
    'gallery' => [
      'active' => true,
      'thumb' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)'
    ],
    'size' => true,
    'color' => true,
    'category' => [
      'name' => 'Danh mục sản phẩm',
      'active' => false,
      'category1' => [
        'active' => true,
        'name' => 'Danh mục cấp 1',
        'table' => 'category_products',
        'status' => [
          'noibat' => 'Nổi bật',
          'hienthi' => 'Hiển thị'
        ],
        'photo1' => true,
        'thumb1' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo2' => true,
        'thumb2' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo3' => true,
        'thumb3' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo4' => true,
        'thumb4' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
      ]
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
    'table' => 'news',
    'type' => 'news',
    'slug' => true,
    'status' => [
      'noibat' => 'Nổi bật',
      'hienthi' => 'Hiển thị'
    ],
    'desc' => true,
    'desc_tiny' => true,
    'content' => true,
    'content_tiny' => true,
    'photo1' => true,
    'thumb1' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
    'photo2' => true,
    'thumb2' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
    'photo3' => true,
    'thumb3' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
    'photo4' => true,
    'thumb4' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
    'category' => [
      'active' => true,
      'name' => 'Danh mục tin tức',
      'category1' => [
        'active' => true,
        'name' => 'Danh mục cấp 1',
        'table' => 'category_news',
        'status' => [
          'noibat' => 'Nổi bật',
          'hienthi' => 'Hiển thị'
        ],
        'photo1' => true,
        'thumb1' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo2' => true,
        'thumb2' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo3' => true,
        'thumb3' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
        'photo4' => true,
        'thumb4' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
      ]
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
    'table' => 'news',
    'criteria' => [
      'active' => true,
      'name' => 'Tiêu chí',
      'type' => 'criteria',
      'status' => ['hienthi' => 'Hiển thị'],
      'desc' => true,
      'slug' => false,
      'photo1' => true,
      'thumb1' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
      'photo2' => false,
      'thumb2' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
      'photo3' => false,
      'thumb3' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
      'photo4' => false,
      'thumb4' => 'Width: 282 px - Height: 370 px (.jpg|.gif|.png|.jpeg|.gif)',
      'seo' => false
    ],
    'policy' => [
      'active' => true,
      'name' => 'Chính sách',
      'type' => 'policy',
      'slug' => true,
      'status' => ['hienthi' => 'Hiển thị'],
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
    ]
  ],

  /* Configure static module */
  'static' => [],

  /* Configure seopage module */
  'seopage' => [],

  /* Configure photo module */
  'photo' => [],

  /* Configure setting module */
  'setting' => [],

];
