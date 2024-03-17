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

  /* Product insert */
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
        'status' => !empty($request->status) ? htmlspecialchars($request->status) : 'hienthi',
        'code' => !empty($request->code) ? htmlspecialchars($request->code) : null,
        'quantity' => !empty($request->quantity) ? htmlspecialchars($request->quantity) : 1,
        'sale_price' => !empty($request->sale_price) ? str_replace(',', '', $request->sale_price) : 0,
        'regular_price' => !empty($request->regular_price) ? str_replace(',', '', $request->regular_price) : 0,
        'discount' => !empty($request->discount) ? htmlspecialchars($request->discount) : 0,
        'hash' => Str::lower(Str::random(4)),
        'type' => config('admin.product.type'),
        'num' => 0,
        'photo1' => !empty($photo1) ? $photo1 : null,
        'photo2' => !empty($photo2) ? $photo2 : null,
        'photo3' => !empty($photo3) ? $photo3 : null,
        'photo4' => !empty($photo4) ? $photo4 : null,
      ];
      Product::create($data);
      return $this->helper->transfer("Thêm dữ liệu", "success", route('admin.product'));
    } else {
      return redirect()->route('admin.product.create')->withErrors($validator)->withInput();;
    }
  }

  /* Product detail */
  public function show($id)
  {
    //
  }

  /* Product duplicate */
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

  /* Product delete static */
  public function delete($id, $hash)
  {
    $uploadProduct = "public/upload/product/";
    $product = Product::where('type', config('admin.product.type'))->where('hash', $hash)->find($id);
    $photo1 = isset($product->photo1) && !empty($product->photo1) ? $product->photo1 : "";
    $photo2 = isset($product->photo2) && !empty($product->photo2) ? $product->photo2 : "";
    $photo3 = isset($product->photo3) && !empty($product->photo3) ? $product->photo3 : "";
    $photo4 = isset($product->photo4) && !empty($product->photo4) ? $product->photo4 : "";
    if (file_exists($uploadProduct . $photo1) && !empty($photo1)) unlink($uploadProduct . $photo1);
    if (file_exists($uploadProduct . $photo2) && !empty($photo2)) unlink($uploadProduct . $photo2);
    if (file_exists($uploadProduct . $photo3) && !empty($photo3)) unlink($uploadProduct . $photo3);
    if (file_exists($uploadProduct . $photo4) && !empty($photo4)) unlink($uploadProduct . $photo4);
    $product->delete();
    return $this->helper->transfer("Xóa dữ liệu", "success", route('admin.product'));
  }

  /* Product delete mutiple */
  public function destroy(Request $request)
  {
    $uploadProduct = "public/upload/product/";
    $product = Product::where('type', config('admin.product.type'))->find($request->checkitem);
    foreach ($product as $v) {
      $photo1 = isset($v->photo1) && !empty($v->photo1) ? $v->photo1 : "";
      $photo2 = isset($v->photo2) && !empty($v->photo2) ? $v->photo2 : "";
      $photo3 = isset($v->photo3) && !empty($v->photo3) ? $v->photo3 : "";
      $photo4 = isset($v->photo4) && !empty($v->photo4) ? $v->photo4 : "";
      if (file_exists($uploadProduct . $photo1) && !empty($photo1)) unlink($uploadProduct . $photo1);
      if (file_exists($uploadProduct . $photo2) && !empty($photo2)) unlink($uploadProduct . $photo2);
      if (file_exists($uploadProduct . $photo3) && !empty($photo3)) unlink($uploadProduct . $photo3);
      if (file_exists($uploadProduct . $photo4) && !empty($photo4)) unlink($uploadProduct . $photo4);
    }
    Product::destroy($request->checkitem);
    return $this->helper->transfer("Xóa dữ liệu", "success", route('admin.product'));
  }

  /* Product update number ajax */
  public function updateNumber(Request $request)
  {
    Product::where('id', $request->id)->where('type', config('admin.product.type'))->update(['num' => $request->value]);
  }

  /* Product update status ajax */
  public function updateStatus(Request $request)
  {
    $status = Product::select('status')->where('type', config('admin.product.type'))->find($request->id)->status;
    $status = !empty($status) ? explode(',', $status) : [];
    if (array_search($request->value, $status) !== false) {
      $key = array_search($request->value, $status);
      unset($status[$key]);
    } else {
      array_push($status, $request->value);
    }
    $statusStr = implode(',', $status);
    Product::where('id', $request->id)->where('type', config('admin.product.type'))->update(['status' => $statusStr]);
  }
}
