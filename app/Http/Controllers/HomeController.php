<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Models\Admin\News;
use App\Models\Admin\Photo;
use App\Models\Admin\Product;
use App\Utils\Helpers as UtilsHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */

  protected $helper;

  public function __construct()
  {
    $this->helper = new UtilsHelpers();

    // Watermark product constructor
    $productDefault = Product::where('type', config('admin.product.type'))->whereRaw('find_in_set("hienthi", status)')->get();
    $watermarkProduct = Photo::where('type', config('admin.photo.watermark_product.type'))->whereRaw('find_in_set("hienthi", status)')->first();
    if ($watermarkProduct && $productDefault) {
      $this->helper->createWatermark($productDefault, "public/upload/product/", "public/upload/watermark_product/" . $watermarkProduct->photo, $watermarkProduct->position, 10, 10, "product");
    }

    // Watermark news constructor
    $newsDefault = News::where('type', config('admin.news.type'))->whereRaw('find_in_set("hienthi", status)')->get();
    $watermarkNews = Photo::where('type', config('admin.photo.watermark_news.type'))->whereRaw('find_in_set("hienthi", status)')->first();
    if ($watermarkNews && $newsDefault) {
      $this->helper->createWatermark($newsDefault, "public/upload/news/", "public/upload/watermark_news/" . $watermarkNews->photo, $watermarkNews->position, 10, 10, "news");
    }
  }

  public function index()
  {


    return view('home.index');
  }
}
