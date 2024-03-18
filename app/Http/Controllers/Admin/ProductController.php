<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Models\Admin\Seo;
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
    $rows = Product::where('type', config('admin.product.type'))->orderBy('num', 'ASC')->orderBy('id', 'ASC')->paginate(config('admin.product.number_per_page'));
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
    $hashKey = Str::lower(Str::random(4));
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
        'slug' => htmlspecialchars($request->input('slug')),
        'title' => htmlspecialchars($request->input('title')),
        'status' => !empty($request->input('status')) ? htmlspecialchars(implode(',', $request->input('status'))) : 'hienthi',
        'code' => !empty($request->input('code')) ? htmlspecialchars($request->input('code')) : null,
        'quantity' => !empty($request->input('quantity')) ? htmlspecialchars($request->input('quantity')) : 1,
        'sale_price' => !empty($request->input('sale_price')) ? str_replace(',', '', $request->input('sale_price')) : 0,
        'regular_price' => !empty($request->input('regular_price')) ? str_replace(',', '', $request->input('regular_price')) : 0,
        'discount' => !empty($request->input('discount')) ? htmlspecialchars($request->input('discount')) : 0,
        'hash' => $hashKey,
        'type' => config('admin.product.type'),
        'num' => 0,
        'desc' => !empty($request->input('desc')) ? htmlspecialchars($request->input('desc')) : null,
        'content' => !empty($request->input('content')) ? htmlspecialchars($request->input('content')) : null,
        'photo1' => !empty($photo1) ? $photo1 : null,
        'photo2' => !empty($photo2) ? $photo2 : null,
        'photo3' => !empty($photo3) ? $photo3 : null,
        'photo4' => !empty($photo4) ? $photo4 : null,
      ];
      $dataSeo = [
        'title_seo' => !empty($request->input('title_seo')) ? htmlspecialchars($request->input('title_seo')) : null,
        'hash_seo' => $hashKey,
        'type' => config('admin.product.type'),
        'keywords' => !empty($request->input('keywords')) ? htmlspecialchars($request->input('keywords')) : null,
        'description_seo' => !empty($request->input('description_seo')) ? htmlspecialchars($request->input('description_seo')) : null,
      ];
      Product::create($data);
      Seo::create($dataSeo);
      return $this->helper->transfer("Thêm dữ liệu", "success", route('admin.product'));
    } else {
      return redirect()->route('admin.product.create')->withErrors($validator)->withInput();;
    }
  }

  /* Product detail */
  public function show(Request $request)
  {
    $row = Product::where('type', config('admin.product.type'))->find($request->id);
    // $resultJSON = $this->helper->buildSchemaProduct($row->id, $row->title, config('app.asset_url') . $row->photo1, $row->code, 'Nike', htmlspecialchars_decode($row->desc), $row->sale_price, 'Phat Developer', $row->slug);
    // return $resultJSON;
    $rowSeo = Seo::where('type', config('admin.product.type'))->where('hash_seo', $row->hash)->first();
    return view('admin.product.show', compact('row', 'rowSeo'));
  }

  /* Product update */
  public function update(Request $request)
  {
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
    $data = [
      'slug' => htmlspecialchars($request->input('slug')),
      'title' => htmlspecialchars($request->input('title')),
      'status' => !empty($request->input('status')) ? htmlspecialchars(implode(',', $request->input('status'))) : 'hienthi',
      'code' => !empty($request->input('code')) ? htmlspecialchars($request->input('code')) : null,
      'quantity' => !empty($request->input('quantity')) ? htmlspecialchars($request->input('quantity')) : 1,
      'sale_price' => !empty($request->input('sale_price')) ? str_replace(',', '', $request->input('sale_price')) : 0,
      'regular_price' => !empty($request->input('regular_price')) ? str_replace(',', '', $request->input('regular_price')) : 0,
      'discount' => !empty($request->input('discount')) ? htmlspecialchars($request->input('discount')) : 0,
      'num' => !empty($request->input('num')) ? $request->input('num') : 0,
      'desc' => !empty($request->input('desc')) ? htmlspecialchars($request->input('desc')) : null,
      'content' => !empty($request->input('content')) ? htmlspecialchars($request->input('content')) : null,
      'photo1' => !empty($photo1) ? $photo1 : null,
      'photo2' => !empty($photo2) ? $photo2 : null,
      'photo3' => !empty($photo3) ? $photo3 : null,
      'photo4' => !empty($photo4) ? $photo4 : null,
    ];
    $product = Product::where('type', config('admin.product.type'))->find($request->id);
    $dataSeo = [
      'title_seo' => !empty($request->input('title_seo')) ? htmlspecialchars($request->input('title_seo')) : null,
      'keywords' => !empty($request->input('keywords')) ? htmlspecialchars($request->input('keywords')) : null,
      'description_seo' => !empty($request->input('description_seo')) ? htmlspecialchars($request->input('description_seo')) : null,
      'hash_seo' => $product->hash,
      'type' => config('admin.product.type'),
      'id_parent' => !empty($product->id) ? $product->id  : null
    ];
    $product->update($data);
    $seo = Seo::where('hash_seo', $product->hash)->first();
    if ($seo->count() > 0) {
      Seo::where('hash_seo', $product->hash)->update($dataSeo);
    } else {
      Seo::create($dataSeo);
    }
    return $this->helper->transfer("Cập nhật dữ liệu", "success", route('admin.product'));
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
        'code' => !empty($row->code) ? htmlspecialchars($row->code) : null,
        'desc' => !empty($row->desc) ? htmlspecialchars(htmlspecialchars_decode($row->desc)) : null,
        'content' => !empty($row->content) ? htmlspecialchars(htmlspecialchars_decode($row->content)) : null,
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
    $seo = SEO::where('type', config('admin.product.type'))->where('hash_seo', $hash);
    $photo1 = isset($product->photo1) && !empty($product->photo1) ? $product->photo1 : "";
    $photo2 = isset($product->photo2) && !empty($product->photo2) ? $product->photo2 : "";
    $photo3 = isset($product->photo3) && !empty($product->photo3) ? $product->photo3 : "";
    $photo4 = isset($product->photo4) && !empty($product->photo4) ? $product->photo4 : "";
    if (file_exists($uploadProduct . $photo1) && !empty($photo1)) unlink($uploadProduct . $photo1);
    if (file_exists($uploadProduct . $photo2) && !empty($photo2)) unlink($uploadProduct . $photo2);
    if (file_exists($uploadProduct . $photo3) && !empty($photo3)) unlink($uploadProduct . $photo3);
    if (file_exists($uploadProduct . $photo4) && !empty($photo4)) unlink($uploadProduct . $photo4);
    $product->delete();
    $seo->delete();
    return $this->helper->transfer("Xóa dữ liệu", "success", route('admin.product'));
  }

  /* Product delete mutiple */
  public function destroy(Request $request)
  {
    $uploadProduct = "public/upload/product/";
    $product = Product::where('type', config('admin.product.type'))->find($request->checkitem);
    $seo = Seo::where('type', config('admin.product.type'))->find($request->hashes);
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
    if ($seo->count() > 0) Seo::destroy($request->hashes);
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

  /* Product delete photo */
  public function deletePhoto(Request $request)
  {
    $uploadProduct = "public/upload/product/";
    $action = $request->action;
    $photo = Product::where('type', config('admin.product.type'))->find($request->id)->$action;
    $photo = isset($photo) && !empty($photo) ? $photo : "";
    if (file_exists($uploadProduct . $photo) && !empty($photo)) unlink($uploadProduct . $photo);
    Product::where('id', $request->id)->where('type', config('admin.product.type'))->update([$action => null]);
    return $this->helper->transfer("Xóa dữ liệu", "success", route('admin.product.show', ['id' => $request->id]));
  }

  /* Product schema JSON */
  public function schemaJSON()
  {
    // code
  }
}
