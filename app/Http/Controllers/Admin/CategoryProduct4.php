<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\CategoryProduct;
use App\Models\Admin\Seo;
use App\Utils\Helpers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CategoryProduct4 extends Controller
{
  protected $helper;
  public function __construct()
  {
    $this->middleware('admin.auth');
    $this->helper = new Helpers();
  }

  /* Category product list */
  public function index(Request $request)
  {
    session(['module_active' => 'category_product_level4_index']);
    if ($request->input('keyword')) {
      $rows = CategoryProduct::where("title", "LIKE", "%{$request->input('keyword')}%")->where('type', config('admin.product.category.category4.type'))->where('level', 4)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->paginate(config('admin.product.category.category4.number_per_page'));
    } else {
      $rows = CategoryProduct::where('type', config('admin.product.category.category4.type'))->where('level', 4)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->paginate(config('admin.product.category.category4.number_per_page'));
    }
    return view('admin.category_product_level4.index', compact('rows'));
  }

  /* Category product create */
  public function create()
  {
    $rowCategory1 = CategoryProduct::where('type', config('admin.product.category.category4.type'))->where('level', 3)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->get();
    session(['module_active' => 'category_product_level4_create']);
    return view('admin.category_product_level4.create', compact('rowCategory1'));
  }

  /* Category product insert */
  public function save(Request $request)
  {
    $hashKey = Str::lower(Str::random(4));
    $validator = Validator::make(
      $request->all(),
      [
        'slug' => ['required', 'unique:category_products', 'max:255'],
        'title' => ['required', 'unique:category_products', 'max:255']
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
      $photo1 = $this->helper->uploadFile("photo1", array('png', 'jpg', 'jpeg', 'gif', '.webp'), "public/upload/category_product4/");
    }
    if ($this->helper->hasFile("photo2")) {
      $photo2 = $this->helper->uploadFile("photo2", array('png', 'jpg', 'jpeg', 'gif', '.webp'), "public/upload/category_product4/");
    }
    if ($this->helper->hasFile("photo3")) {
      $photo3 = $this->helper->uploadFile("photo3", array('png', 'jpg', 'jpeg', 'gif', '.webp'), "public/upload/category_product4/");
    }
    if ($this->helper->hasFile("photo4")) {
      $photo4 = $this->helper->uploadFile("photo4", array('png', 'jpg', 'jpeg', 'gif', '.webp'), "public/upload/category_product4/");
    }
    if (!$validator->fails()) {
      $data = [
        'slug' => htmlspecialchars($request->input('slug')),
        'title' => htmlspecialchars($request->input('title')),
        'status' => !empty($request->input('status')) ? htmlspecialchars(implode(',', $request->input('status'))) : 'hienthi',
        'type' => config('admin.product.category.category4.type'),
        'desc' => !empty($request->input('desc')) ? htmlspecialchars($request->input('desc')) : null,
        'content' => !empty($request->input('content')) ? htmlspecialchars($request->input('content')) : null,
        'photo1' => !empty($photo1) ? $photo1 : null,
        'photo2' => !empty($photo2) ? $photo2 : null,
        'photo3' => !empty($photo3) ? $photo3 : null,
        'photo4' => !empty($photo4) ? $photo4 : null,
        'level' => 4,
        'id_parent' => !empty($request->input('id_parent1')) ? htmlspecialchars($request->input('id_parent1')) : 0,
        'num' => 0,
        'hash' => $hashKey
      ];
      $dataSeo = [
        'title_seo' => !empty($request->input('title_seo')) ? htmlspecialchars($request->input('title_seo')) : null,
        'hash_seo' => $hashKey,
        'type' => config('admin.product.category.category4.type'),
        'keywords' => !empty($request->input('keywords')) ? htmlspecialchars($request->input('keywords')) : null,
        'description_seo' => !empty($request->input('description_seo')) ? htmlspecialchars($request->input('description_seo')) : null,
      ];
      CategoryProduct::create($data);
      Seo::create($dataSeo);
      return $this->helper->transfer("Thêm dữ liệu", "success", route('admin.category_product4'));
    } else {
      return redirect()->route('admin.category_product4.create')->withErrors($validator)->withInput();
    }
  }

  /* Category product detail */
  public function show(Request $request)
  {
    $row = CategoryProduct::where('type', config('admin.product.category.category4.type'))->find($request->id);
    $rowSeo = Seo::where('type', config('admin.product.category.category4.type'))->where('hash_seo', $row->hash)->first();
    $rowCategory1 = CategoryProduct::where('type', config('admin.product.category.category4.type'))->where('level', 3)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->get();
    return view('admin.category_product_level4.show', compact('row', 'rowSeo', 'rowCategory1'));
  }

  /* Category product update */
  public function update(Request $request)
  {
    if ($this->helper->hasFile("photo1")) {
      $photo1 = $this->helper->uploadFile("photo1", array('png', 'jpg', 'jpeg', 'gif', '.webp'), "public/upload/category_product4/");
    }
    if ($this->helper->hasFile("photo2")) {
      $photo2 = $this->helper->uploadFile("photo2", array('png', 'jpg', 'jpeg', 'gif', '.webp'), "public/upload/category_product4/");
    }
    if ($this->helper->hasFile("photo3")) {
      $photo3 = $this->helper->uploadFile("photo3", array('png', 'jpg', 'jpeg', 'gif', '.webp'), "public/upload/category_product4/");
    }
    if ($this->helper->hasFile("photo4")) {
      $photo4 = $this->helper->uploadFile("photo4", array('png', 'jpg', 'jpeg', 'gif', '.webp'), "public/upload/category_product4/");
    }
    $data = [
      'slug' => htmlspecialchars($request->input('slug')),
      'title' => htmlspecialchars($request->input('title')),
      'status' => !empty($request->input('status')) ? htmlspecialchars(implode(',', $request->input('status'))) : 'hienthi',
      'num' => !empty($request->input('num')) ? $request->input('num') : 0,
      'desc' => !empty($request->input('desc')) ? htmlspecialchars($request->input('desc')) : null,
      'content' => !empty($request->input('content')) ? htmlspecialchars($request->input('content')) : null,
      'photo1' => !empty($photo1) ? $photo1 : null,
      'photo2' => !empty($photo2) ? $photo2 : null,
      'photo3' => !empty($photo3) ? $photo3 : null,
      'photo4' => !empty($photo4) ? $photo4 : null,
      'id_parent' => !empty($request->input('id_parent1')) ? htmlspecialchars($request->input('id_parent1')) : 0,
    ];
    $categoryProduct = CategoryProduct::where('type', config('admin.product.category.category4.type'))->find($request->id);
    $dataSeo = [
      'title_seo' => !empty($request->input('title_seo')) ? htmlspecialchars($request->input('title_seo')) : null,
      'keywords' => !empty($request->input('keywords')) ? htmlspecialchars($request->input('keywords')) : null,
      'description_seo' => !empty($request->input('description_seo')) ? htmlspecialchars($request->input('description_seo')) : null,
      'schema' => !empty($request->input('schema')) ? htmlspecialchars($request->input('schema')) : null,
      'hash_seo' => $categoryProduct->hash,
      'type' => config('admin.product.category.category4.type'),
      'id_parent' => !empty($categoryProduct->id) ? $categoryProduct->id  : null
    ];
    $categoryProduct->update($data);
    $seo = Seo::where('hash_seo', $categoryProduct->hash)->first();
    if ($seo) {
      Seo::where('hash_seo', $categoryProduct->hash)->update($dataSeo);
    } else {
      Seo::create($dataSeo);
    }
    return $this->helper->transfer("Cập nhật dữ liệu", "success", route('admin.category_product4.show', ['id' => $categoryProduct->id]));
  }

  /* Category product duplicate */
  public function copy($id)
  {
    $row = CategoryProduct::where('type', config('admin.product.category.category4.type'))->find($id);
    $titleCopy = $row->title . " copy " . str_repeat(Str::lower(Str::random(4)), 1);
    $slugCopy = $this->helper->changeTitle($titleCopy);
    CategoryProduct::create(
      [
        'slug' => htmlspecialchars($slugCopy),
        'title' => htmlspecialchars($titleCopy),
        'desc' => !empty($row->desc) ? htmlspecialchars(htmlspecialchars_decode($row->desc)) : null,
        'content' => !empty($row->content) ? htmlspecialchars(htmlspecialchars_decode($row->content)) : null,
        'type' => config('admin.product.category.category4.type'),
        'num' => 0,
        'id_parent' => 0,
        'level' => 4,
        'hash' => Str::lower(Str::random(4)),
        'status' => 'hienthi'
      ]
    );
    return $this->helper->transfer("Thêm dữ liệu", "success", route('admin.category_product4'));
  }

  /* Category product delete static */
  public function delete($id, $hash)
  {
    $upload = "public/upload/category_product4/";
    $categoryProduct = CategoryProduct::where('type', config('admin.product.category.category4.type'))->where('hash', $hash)->find($id);
    $seo = SEO::where('type', config('admin.product.category.category4.type'))->where('hash_seo', $hash);
    $photo1 = isset($categoryProduct->photo1) && !empty($categoryProduct->photo1) ? $categoryProduct->photo1 : "";
    $photo2 = isset($categoryProduct->photo2) && !empty($categoryProduct->photo2) ? $categoryProduct->photo2 : "";
    $photo3 = isset($categoryProduct->photo3) && !empty($categoryProduct->photo3) ? $categoryProduct->photo3 : "";
    $photo4 = isset($categoryProduct->photo4) && !empty($categoryProduct->photo4) ? $categoryProduct->photo4 : "";
    if (file_exists($upload . $photo1) && !empty($photo1)) unlink($upload . $photo1);
    if (file_exists($upload . $photo2) && !empty($photo2)) unlink($upload . $photo2);
    if (file_exists($upload . $photo3) && !empty($photo3)) unlink($upload . $photo3);
    if (file_exists($upload . $photo4) && !empty($photo4)) unlink($upload . $photo4);
    CategoryProduct::where('type', config('admin.product.category.category4.type'))->where('hash', $hash)->delete($id);
    $seo->delete();
    return $this->helper->transfer("Xóa dữ liệu", "success", route('admin.category_product4'));
  }

  /* Category product delete mutiple */
  public function destroy(Request $request)
  {
    $upload = "public/upload/category_product4/";
    $categoryProduct = CategoryProduct::where('type', config('admin.product.category.category4.type'))->find($request->checkitem);
    foreach ($categoryProduct as $v) {
      $photo1 = isset($v->photo1) && !empty($v->photo1) ? $v->photo1 : "";
      $photo2 = isset($v->photo2) && !empty($v->photo2) ? $v->photo2 : "";
      $photo3 = isset($v->photo3) && !empty($v->photo3) ? $v->photo3 : "";
      $photo4 = isset($v->photo4) && !empty($v->photo4) ? $v->photo4 : "";
      if (file_exists($upload . $photo1) && !empty($photo1)) unlink($upload . $photo1);
      if (file_exists($upload . $photo2) && !empty($photo2)) unlink($upload . $photo2);
      if (file_exists($upload . $photo3) && !empty($photo3)) unlink($upload . $photo3);
      if (file_exists($upload . $photo4) && !empty($photo4)) unlink($upload . $photo4);
    }
    Seo::where('type', config('admin.product.category.category4.type'))->whereIn('hash_seo', $request->hashes)->delete();
    CategoryProduct::destroy($request->checkitem);
    return $this->helper->transfer("Xóa dữ liệu", "success", route('admin.category_product4'));
  }

  /* Product update number ajax */
  public function updateNumber(Request $request)
  {
    CategoryProduct::where('id', $request->id)->where('type', config('admin.product.category.category4.type'))->update(['num' => $request->value]);
  }

  /* Category product update status ajax */
  public function updateStatus(Request $request)
  {
    $status = CategoryProduct::select('status')->where('type', config('admin.product.category.category4.type'))->find($request->id)->status;
    $status = !empty($status) ? explode(',', $status) : [];
    if (array_search($request->value, $status) !== false) {
      $key = array_search($request->value, $status);
      unset($status[$key]);
    } else {
      array_push($status, $request->value);
    }
    $statusStr = implode(',', $status);
    CategoryProduct::where('id', $request->id)->where('type', config('admin.product.category.category4.type'))->update(['status' => $statusStr]);
  }

  /* Category product delete photo */
  public function deletePhoto(Request $request)
  {
    $upload = "public/upload/category_product4/";
    $action = $request->action;
    $photo = CategoryProduct::where('type', config('admin.product.category.category4.type'))->find($request->id)->$action;
    $photo = isset($photo) && !empty($photo) ? $photo : "";
    if (file_exists($upload . $photo) && !empty($photo)) unlink($upload . $photo);
    CategoryProduct::where('id', $request->id)->where('type', config('admin.product.category.category4.type'))->update([$action => null]);
    return $this->helper->transfer("Xóa dữ liệu", "success", route('admin.category_product4.show', ['id' => $request->id]));
  }
}
