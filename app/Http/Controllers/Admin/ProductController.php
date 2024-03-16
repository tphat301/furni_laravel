<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Utils\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
  protected $helper;
  public function __construct()
  {
    $this->middleware('admin.auth');
    $this->helper = new Helpers();
  }

  /* Product list */
  public function index()
  {
    session(['module_active' => 'product_index']);
    $rows = Product::where('type', config('admin.product.type'))->orderBy('num')->orderBy('id')->paginate(999);
    return view('admin.product.index', compact('rows'));
  }

  /* Product create */
  public function create()
  {
    session(['module_active' => 'product_create']);
    return view('admin.product.create');
  }

  /* Product saved */
  public function save(Request $request)
  {
    $validator = Validator::make(
      $request->all(),
      [
        'slug' => ['required', 'unique:products', 'max:255'],
        'title' => ['required', 'unique:products', 'max:255']
      ],
      [
        'required' => ':attribute không được để trống',
        'unique' => ':attribute đã tồn tại. :attribute truy cập mục này có thể bị trùng lặp.',
        'string' => ':attribute phải ở dạng chuỗi ký tự',
        'max' => ':attribute chỉ cho phép nhập vào tối đa là :max ký tự',
      ],
      [
        'slug' => 'Đường dẫn',
        'title' => 'Tiêu đề',
      ]
    );
    if ($this->helper->hasFile("photo1")) {
      $photo1 = $this->helper->uploadFile("photo1", array('png', 'jpg', 'jpeg', 'gif', '.webp'), "public/upload/product/");
    }
    if ($this->helper->hasFile("photo2")) {
      $photo2 = $this->helper->uploadFile("photo2", array('png', 'jpg', 'jpeg', 'gif', '.webp'), "public/upload/product/");
    }
    if ($this->helper->hasFile("photo3")) {
      $photo3 = $this->helper->uploadFile("photo3", array('png', 'jpg', 'jpeg', 'gif', '.webp'), "public/upload/product/");
    }
    if ($this->helper->hasFile("photo4")) {
      $photo4 = $this->helper->uploadFile("photo4", array('png', 'jpg', 'jpeg', 'gif', '.webp'), "public/upload/product/");
    }
    if (!$validator->fails()) {
      $data = [
        'slug' => htmlspecialchars($request->slug),
        'title' => htmlspecialchars($request->title),
        'status' => htmlspecialchars($request->status) ?: 'hienthi',
        'code' => htmlspecialchars($request->code) ?: null,
        'quantity' => htmlspecialchars($request->quantity) ?: 1,
        'sale_price' => str_replace(',', '', $request->sale_price) ?: 0,
        'regular_price' => str_replace(',', '', $request->regular_price) ?: 0,
        'discount' => htmlspecialchars($request->discount) ?: 0,
        'hash' => Str::lower(Str::random(4)),
        'type' => config('admin.product.type'),
        'num' => 0,
        'photo1' => $photo1 ?: null,
        'photo2' => $photo2 ?: null,
        'photo3' => $photo3 ?: null,
        'photo4' => $photo4 ?: null,
      ];
      Product::create($data);
      return $this->helper->transfer("Thêm dữ liệu", "success", route('admin.product'));
    } else {
      return redirect()->route('admin.product.create')->withErrors($validator)->withInput();;
    }
  }

  /* Product show */
  public function show($id)
  {
    //
  }

  /* Product copy */
  public function copy($id)
  {
    $row = Product::where('type', config('admin.product.type'))->find($id);
    $titleCopy = $row->title . " copy " . str_repeat(Str::lower(Str::random(4)), 1);
    $slugCopy = $this->helper->changeTitle($titleCopy);
    Product::create(
      [
        'slug' => htmlspecialchars($slugCopy),
        'title' => htmlspecialchars($titleCopy),
        'code' => $row->code,
        'type' => config('admin.product.type'),
        'num' => 0,
        'quantity' => 1,
        'hash' => Str::lower(Str::random(4)),
        'status' => 'hienthi'
      ]
    );
    return $this->helper->transfer("Thêm dữ liệu", "success", route('admin.product'));
  }

  /* Product destroy */
  public function destroy($id, $hash)
  {
    $uploadProduct = "public/upload/product/";
    $product = Product::where('type', config('admin.product.type'))->where('hash', $hash)->find($id);
    $photo1 = isset($product->photo1) && !empty($product->photo1) ? $product->photo1 : "";
    $photo2 = isset($product->photo2) && !empty($product->photo2) ? $product->photo2 : "";
    $photo3 = isset($product->photo3) && !empty($product->photo3) ? $product->photo3 : "";
    $photo4 = isset($product->photo4) && !empty($product->photo4) ? $product->photo4 : "";
    $filePhotoProduct1 = $uploadProduct . $photo1;
    $filePhotoProduct2 = $uploadProduct . $photo2;
    $filePhotoProduct3 = $uploadProduct . $photo3;
    $filePhotoProduct4 = $uploadProduct . $photo4;
    if (file_exists($filePhotoProduct1) && !empty($photo1)) unlink($filePhotoProduct1);
    if (file_exists($filePhotoProduct2) && !empty($photo2)) unlink($filePhotoProduct2);
    if (file_exists($filePhotoProduct3) && !empty($photo3)) unlink($filePhotoProduct3);
    if (file_exists($filePhotoProduct4) && !empty($photo4)) unlink($filePhotoProduct4);
    $product->delete();
    return $this->helper->transfer("Xóa dữ liệu", "success", route('admin.product'));
  }

  /* Product action */
  public function action(Request $request)
  {
    Product::destroy($request->checkitem);
    return $this->helper->transfer("Xóa dữ liệu", "success", route('admin.product'));
  }
}
