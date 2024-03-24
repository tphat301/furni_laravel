<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Seopage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Utils\Helpers;

class SeopageController extends Controller
{
  protected $helper;
  public function __construct()
  {
    $this->middleware('admin.auth');
    $this->helper = new Helpers();
  }

  /*Home*/
  public function home()
  {
    session(['module_active' => 'seopage_home']);
    $type = config('admin.seopage.home.type');
    $row = Seopage::where('type', $type)->first();
    return view('admin.seopage.index', compact('row', 'type'));
  }

  /*Product*/
  public function product()
  {
    session(['module_active' => 'seopage_product']);
    $type = config('admin.seopage.product.type');
    $row = Seopage::where('type', $type)->first();
    return view('admin.seopage.index', compact('row', 'type'));
  }

  /*News*/
  public function news()
  {
    session(['module_active' => 'seopage_news']);
    $type = config('admin.seopage.news.type');
    $row = Seopage::where('type', $type)->first();
    return view('admin.seopage.index', compact('row', 'type'));
  }

  /*Contact*/
  public function contact()
  {
    session(['module_active' => 'seopage_contact']);
    $type = config('admin.seopage.contact.type');
    $row = Seopage::where('type', $type)->first();
    return view('admin.seopage.index', compact('row', 'type'));
  }

  /*Seopage delete photo*/
  public function deletePhoto()
  {
  }

  /*Seopage remake*/
  public function remake(Request $request)
  {
    //
  }

  /*Seopage save*/
  public function save(Request $request)
  {
    if (!file_exists("public/upload/seopage")) {
      mkdir("public/upload/seopage", 0777, true);
    }
    $direct = "admin.seopage." . $request->type;
    $hashKey = Str::lower(Str::random(4));
    $width = config("admin.seopage." . $request->type . ".with");
    $height = config("admin.seopage." . $request->type . ".height");
    if (isset($_POST['save'])) {
      $validator = Validator::make(
        $request->all(),
        [
          "title" => ['required'],
          "photo" => ['image', 'mimes:png,jpg,jpeg,svg,webp', 'max:20971520']
        ],
        [
          'required' => ':attribute không được để trống',
          'image' => ':attribute chỉ cho phép upload định dạng là hình ảnh.',
          'mimes' => ':attribute chỉ cho phép upload các định dạng :mimes',
          'max' => ':attribute chỉ cho upload tối đa là :max MB',
        ],
        [
          "title" => 'Tiêu đề',
          "photo" => 'Hình ảnh'
        ]
      );
      if (!$validator->fails()) {
        $manager = new ImageManager(new Driver());
        if ($request->hasFile("photo")) {
          $image = $manager->read($request->photo)->resize($width, $height);
          $photo = hexdec(uniqid()) . "." . $request->photo->getClientOriginalName();
          $path = public_path('upload/seopage');
          $image->save($path . "/" . $photo);
        }
        $d = array(
          'title' => !empty($request->input('title')) ? htmlspecialchars($request->input('title')) : null,
          'status' => !empty($request->input('status')) ? htmlspecialchars(implode(',', $request->input('status'))) : 'hienthi',
          'description' => !empty($request->input('description')) ? htmlspecialchars($request->input('description')) : null,
          'keywords' => !empty($request->input('keywords')) ? htmlspecialchars($request->input('keywords')) : null,
          'type' => $request->type,
          'hash' => $hashKey,
          'photo' => !empty($photo) ? $photo : null
        );
        Seopage::create($d);
        return $this->helper->transfer("Thêm dữ liệu", "success", route($direct));
      } else {
        return redirect()->route($direct)->withErrors($validator)->withInput();
      }
    } else {
      //
    }
  }
}
