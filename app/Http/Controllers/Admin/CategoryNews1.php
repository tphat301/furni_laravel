<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\CategoryNews;
use App\Models\Admin\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Utils\Helpers;
use Illuminate\Support\Facades\Validator;

class CategoryNews1 extends Controller
{
  protected $helper;
  public function __construct()
  {
    $this->middleware('admin.auth');
    $this->helper = new Helpers();
  }

  /* Category news list */
  public function index(Request $request)
  {
    session(['module_active' => 'category_news_level1_index']);
    if ($request->input('keyword')) {
      $rows = CategoryNews::where("title", "LIKE", "%{$request->input('keyword')}%")->where('type', config('admin.news.category.category1.type'))->where('level', 1)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->paginate(config('admin.news.category.category1.number_per_page'));
    } else {
      $rows = CategoryNews::where('type', config('admin.news.category.category1.type'))->where('level', 1)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->paginate(config('admin.news.category.category1.number_per_page'));
    }
    return view('admin.category_news_level1.index', compact('rows'));
  }

  /* Category news create */
  public function create()
  {
    session(['module_active' => 'category_news_level1_create']);
    return view('admin.category_news_level1.create');
  }

  /* Category news insert */
  public function save(Request $request)
  {
    $hashKey = Str::lower(Str::random(4));
    $validator = Validator::make(
      $request->all(),
      [
        'slug' => ['required', 'unique:category_news', 'max:255'],
        'title' => ['required', 'unique:category_news', 'max:255']
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
      $photo1 = $this->helper->uploadFile("photo1", array('png', 'jpg', 'jpeg', 'gif', '.webp'), "public/upload/category_news1/");
    }
    if ($this->helper->hasFile("photo2")) {
      $photo2 = $this->helper->uploadFile("photo2", array('png', 'jpg', 'jpeg', 'gif', '.webp'), "public/upload/category_news1/");
    }
    if ($this->helper->hasFile("photo3")) {
      $photo3 = $this->helper->uploadFile("photo3", array('png', 'jpg', 'jpeg', 'gif', '.webp'), "public/upload/category_news1/");
    }
    if ($this->helper->hasFile("photo4")) {
      $photo4 = $this->helper->uploadFile("photo4", array('png', 'jpg', 'jpeg', 'gif', '.webp'), "public/upload/category_news1/");
    }
    if (!$validator->fails()) {
      $data = [
        'slug' => htmlspecialchars($request->input('slug')),
        'title' => htmlspecialchars($request->input('title')),
        'status' => !empty($request->input('status')) ? htmlspecialchars(implode(',', $request->input('status'))) : 'hienthi',
        'type' => config('admin.news.category.category1.type'),
        'desc' => !empty($request->input('desc')) ? htmlspecialchars($request->input('desc')) : null,
        'content' => !empty($request->input('content')) ? htmlspecialchars($request->input('content')) : null,
        'photo1' => !empty($photo1) ? $photo1 : null,
        'photo2' => !empty($photo2) ? $photo2 : null,
        'photo3' => !empty($photo3) ? $photo3 : null,
        'photo4' => !empty($photo4) ? $photo4 : null,
        'level' => 1,
        'id_parent' => 0,
        'num' => !empty($request->input('num')) ? $request->input('num') : 0,
        'hash' => $hashKey
      ];
      $dataSeo = [
        'title_seo' => !empty($request->input('title_seo')) ? htmlspecialchars($request->input('title_seo')) : null,
        'hash_seo' => $hashKey,
        'type' => config('admin.news.category.category1.type'),
        'keywords' => !empty($request->input('keywords')) ? htmlspecialchars($request->input('keywords')) : null,
        'description_seo' => !empty($request->input('description_seo')) ? htmlspecialchars($request->input('description_seo')) : null,
      ];
      CategoryNews::create($data);
      Seo::create($dataSeo);
      return $this->helper->transfer("Thêm dữ liệu", "success", route('admin.category_news1'));
    } else {
      return redirect()->route('admin.category_news1.create')->withErrors($validator)->withInput();
    }
  }

  /* Category news detail */
  public function show(Request $request)
  {
    $row = CategoryNews::where('type', config('admin.news.category.category1.type'))->find($request->id);
    $rowSeo = Seo::where('type', config('admin.news.category.category1.type'))->where('hash_seo', $row->hash)->first();
    return view('admin.category_news_level1.show', compact('row', 'rowSeo'));
  }

  /* Category news update */
  public function update(Request $request)
  {
    if ($this->helper->hasFile("photo1")) {
      $photo1 = $this->helper->uploadFile("photo1", array('png', 'jpg', 'jpeg', 'gif', '.webp'), "public/upload/category_news1/");
    }
    if ($this->helper->hasFile("photo2")) {
      $photo2 = $this->helper->uploadFile("photo2", array('png', 'jpg', 'jpeg', 'gif', '.webp'), "public/upload/category_news1/");
    }
    if ($this->helper->hasFile("photo3")) {
      $photo3 = $this->helper->uploadFile("photo3", array('png', 'jpg', 'jpeg', 'gif', '.webp'), "public/upload/category_news1/");
    }
    if ($this->helper->hasFile("photo4")) {
      $photo4 = $this->helper->uploadFile("photo4", array('png', 'jpg', 'jpeg', 'gif', '.webp'), "public/upload/category_news1/");
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
    ];
    $categoryNews = CategoryNews::where('type', config('admin.news.category.category1.type'))->find($request->id);
    $dataSeo = [
      'title_seo' => !empty($request->input('title_seo')) ? htmlspecialchars($request->input('title_seo')) : null,
      'keywords' => !empty($request->input('keywords')) ? htmlspecialchars($request->input('keywords')) : null,
      'description_seo' => !empty($request->input('description_seo')) ? htmlspecialchars($request->input('description_seo')) : null,
      'schema' => !empty($request->input('schema')) ? htmlspecialchars($request->input('schema')) : null,
      'hash_seo' => $categoryNews->hash,
      'type' => config('admin.news.category.category1.type'),
      'id_parent' => !empty($categoryNews->id) ? $categoryNews->id  : null
    ];
    $categoryNews->update($data);
    $seo = Seo::where('hash_seo', $categoryNews->hash)->first();
    if ($seo) {
      Seo::where('hash_seo', $categoryNews->hash)->update($dataSeo);
    } else {
      Seo::create($dataSeo);
    }
    return $this->helper->transfer("Cập nhật dữ liệu", "success", route('admin.category_news1.show', ['id' => $categoryNews->id]));
  }

  /* Category news duplicate */
  public function copy($id)
  {
    $row = CategoryNews::where('type', config('admin.news.category.category1.type'))->find($id);
    $titleCopy = $row->title . " copy " . str_repeat(Str::lower(Str::random(4)), 1);
    $slugCopy = $this->helper->changeTitle($titleCopy);
    CategoryNews::create(
      [
        'slug' => htmlspecialchars($slugCopy),
        'title' => htmlspecialchars($titleCopy),
        'desc' => !empty($row->desc) ? htmlspecialchars(htmlspecialchars_decode($row->desc)) : null,
        'content' => !empty($row->content) ? htmlspecialchars(htmlspecialchars_decode($row->content)) : null,
        'type' => config('admin.news.category.category1.type'),
        'num' => 0,
        'id_parent' => 0,
        'level' => 1,
        'hash' => Str::lower(Str::random(4)),
        'status' => 'hienthi'
      ]
    );
    return $this->helper->transfer("Thêm dữ liệu", "success", route('admin.category_news1'));
  }

  /* Category news delete static */
  public function delete($id, $hash)
  {
    $upload = "public/upload/category_news1/";
    $categoryNews = CategoryNews::where('type', config('admin.news.category.category1.type'))->where('hash', $hash)->find($id);
    $seo = SEO::where('type', config('admin.news.category.category1.type'))->where('hash_seo', $hash);
    $photo1 = isset($categoryNews->photo1) && !empty($categoryNews->photo1) ? $categoryNews->photo1 : "";
    $photo2 = isset($categoryNews->photo2) && !empty($categoryNews->photo2) ? $categoryNews->photo2 : "";
    $photo3 = isset($categoryNews->photo3) && !empty($categoryNews->photo3) ? $categoryNews->photo3 : "";
    $photo4 = isset($categoryNews->photo4) && !empty($categoryNews->photo4) ? $categoryNews->photo4 : "";
    if (file_exists($upload . $photo1) && !empty($photo1)) unlink($upload . $photo1);
    if (file_exists($upload . $photo2) && !empty($photo2)) unlink($upload . $photo2);
    if (file_exists($upload . $photo3) && !empty($photo3)) unlink($upload . $photo3);
    if (file_exists($upload . $photo4) && !empty($photo4)) unlink($upload . $photo4);
    CategoryNews::where('type', config('admin.news.category.category1.type'))->where('hash', $hash)->delete($id);
    $seo->delete();
    return $this->helper->transfer("Xóa dữ liệu", "success", route('admin.category_news1'));
  }

  /* Category news delete mutiple */
  public function destroy(Request $request)
  {
    $upload = "public/upload/category_news1/";
    $categoryNews = CategoryNews::where('type', config('admin.news.category.category1.type'))->find($request->checkitem);
    foreach ($categoryNews as $v) {
      $photo1 = isset($v->photo1) && !empty($v->photo1) ? $v->photo1 : "";
      $photo2 = isset($v->photo2) && !empty($v->photo2) ? $v->photo2 : "";
      $photo3 = isset($v->photo3) && !empty($v->photo3) ? $v->photo3 : "";
      $photo4 = isset($v->photo4) && !empty($v->photo4) ? $v->photo4 : "";
      if (file_exists($upload . $photo1) && !empty($photo1)) unlink($upload . $photo1);
      if (file_exists($upload . $photo2) && !empty($photo2)) unlink($upload . $photo2);
      if (file_exists($upload . $photo3) && !empty($photo3)) unlink($upload . $photo3);
      if (file_exists($upload . $photo4) && !empty($photo4)) unlink($upload . $photo4);
    }
    Seo::where('type', config('admin.news.category.category1.type'))->whereIn('hash_seo', $request->hashes)->delete();
    CategoryNews::destroy($request->checkitem);
    return $this->helper->transfer("Xóa dữ liệu", "success", route('admin.category_news1'));
  }

  /* News update number ajax */
  public function updateNumber(Request $request)
  {
    CategoryNews::where('id', $request->id)->where('type', config('admin.news.category.category1.type'))->update(['num' => $request->value]);
  }

  /* Category product update status ajax */
  public function updateStatus(Request $request)
  {
    $status = CategoryNews::select('status')->where('type', config('admin.news.category.category1.type'))->find($request->id)->status;
    $status = !empty($status) ? explode(',', $status) : [];
    if (array_search($request->value, $status) !== false) {
      $key = array_search($request->value, $status);
      unset($status[$key]);
    } else {
      array_push($status, $request->value);
    }
    $statusStr = implode(',', $status);
    CategoryNews::where('id', $request->id)->where('type', config('admin.news.category.category1.type'))->update(['status' => $statusStr]);
  }

  /* Category news delete photo */
  public function deletePhoto(Request $request)
  {
    $upload = "public/upload/category_news1/";
    $action = $request->action;
    $photo = CategoryNews::where('type', config('admin.news.category.category1.type'))->find($request->id)->$action;
    $photo = isset($photo) && !empty($photo) ? $photo : "";
    if (file_exists($upload . $photo) && !empty($photo)) unlink($upload . $photo);
    CategoryNews::where('id', $request->id)->where('type', config('admin.news.category.category1.type'))->update([$action => null]);
    return $this->helper->transfer("Xóa dữ liệu", "success", route('admin.category_news1.show', ['id' => $request->id]));
  }
}
