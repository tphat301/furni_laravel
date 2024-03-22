<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\News;
use App\Utils\Helpers;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
  protected $helper;
  public function __construct()
  {
    $this->middleware('admin.auth');
    $this->helper = new Helpers();
  }

  /* Criteria list */
  public function index(Request $request)
  {
    session(['module_active' => 'criteria_index']);
    if ($request->input('keyword')) {
      $rows = News::where("title", "LIKE", "%{$request->input('keyword')}%")->where('type', config('admin.post.criteria.type'))->orderBy('num', 'ASC')->orderBy('id', 'ASC')->paginate(config('admin.post.criteria.number_per_page'));
    } else {
      $rows = News::where('type', config('admin.post.criteria.type'))->orderBy('num', 'ASC')->orderBy('id', 'ASC')->paginate(config('admin.post.criteria.number_per_page'));
    }
    return view('admin.post.criteria_index', compact('rows'));
  }

  /* Criteria create */
  public function create()
  {
    session(['module_active' => 'criteria_create']);
    return view('admin.post.criteria_create');
  }

  /* Criteria insert */
  public function save(Request $request)
  {
    $hashKey = Str::lower(Str::random(4));
    $validator = Validator::make(
      $request->all(),
      [
        'title' => ['required', 'unique:news', 'max:255']
      ],
      [
        'required' => ':attribute không được để trống',
        'unique' => ':attribute đã tồn tại. :attribute truy cập mục này có thể bị trùng lặp.',
        'string' => ':attribute phải ở dạng chuỗi ký tự',
        'max' => ':attribute chỉ cho phép nhập vào tối đa là :max ký tự',
      ],
      [
        'title' => 'Tiêu đề',
      ]
    );
    if ($this->helper->hasFile("photo1")) {
      $photo1 = $this->helper->uploadFile("photo1", array('png', 'jpg', 'jpeg', 'gif', '.webp'), "public/upload/post/");
    }
    if ($this->helper->hasFile("photo2")) {
      $photo2 = $this->helper->uploadFile("photo2", array('png', 'jpg', 'jpeg', 'gif', '.webp'), "public/upload/post/");
    }
    if ($this->helper->hasFile("photo3")) {
      $photo3 = $this->helper->uploadFile("photo3", array('png', 'jpg', 'jpeg', 'gif', '.webp'), "public/upload/post/");
    }
    if ($this->helper->hasFile("photo4")) {
      $photo4 = $this->helper->uploadFile("photo4", array('png', 'jpg', 'jpeg', 'gif', '.webp'), "public/upload/post/");
    }
    if (!$validator->fails()) {
      $data = [
        'title' => htmlspecialchars($request->input('title')),
        'status' => !empty($request->input('status')) ? htmlspecialchars(implode(',', $request->input('status'))) : 'hienthi',
        'hash' => $hashKey,
        'type' => config('admin.post.criteria.type'),
        'num' => !empty($request->input('num')) ? $request->input('num') : 0,
        'desc' => !empty($request->input('desc')) ? htmlspecialchars($request->input('desc')) : null,
        'content' => !empty($request->input('content')) ? htmlspecialchars($request->input('content')) : null,
        'photo1' => !empty($photo1) ? $photo1 : null,
        'photo2' => !empty($photo2) ? $photo2 : null,
        'photo3' => !empty($photo3) ? $photo3 : null,
        'photo4' => !empty($photo4) ? $photo4 : null
      ];
      News::create($data);
      return $this->helper->transfer("Thêm dữ liệu", "success", route('admin.criteria'));
    } else {
      return redirect()->route('admin.criteria.create')->withErrors($validator)->withInput();;
    }
  }

  /* Criteria detail */
  public function show(Request $request)
  {
    $row = News::where('type', config('admin.post.criteria.type'))->find($request->id);

    return view('admin.post.criteria_show', compact('row'));
  }

  /* Criteria update */
  public function update(Request $request)
  {
    if ($this->helper->hasFile("photo1")) {
      $photo1 = $this->helper->uploadFile("photo1", array('png', 'jpg', 'jpeg', 'gif', '.webp'), "public/upload/post/");
    }
    if ($this->helper->hasFile("photo2")) {
      $photo2 = $this->helper->uploadFile("photo2", array('png', 'jpg', 'jpeg', 'gif', '.webp'), "public/upload/post/");
    }
    if ($this->helper->hasFile("photo3")) {
      $photo3 = $this->helper->uploadFile("photo3", array('png', 'jpg', 'jpeg', 'gif', '.webp'), "public/upload/post/");
    }
    if ($this->helper->hasFile("photo4")) {
      $photo4 = $this->helper->uploadFile("photo4", array('png', 'jpg', 'jpeg', 'gif', '.webp'), "public/upload/post/");
    }
    $data = [
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
    $news = News::where('type', config('admin.post.criteria.type'))->find($request->id);
    $news->update($data);
    return $this->helper->transfer("Cập nhật dữ liệu", "success", route('admin.criteria.show', ['id' => $news->id]));
  }

  /* Criteria duplicate */
  public function copy($id)
  {
    $row = News::where('type', config('admin.post.criteria.type'))->find($id);
    $titleCopy = $row->title . " copy " . str_repeat(Str::lower(Str::random(4)), 1);
    $slugCopy = $this->helper->changeTitle($titleCopy);
    News::create(
      [
        'title' => htmlspecialchars($titleCopy),
        'desc' => !empty($row->desc) ? htmlspecialchars(htmlspecialchars_decode($row->desc)) : null,
        'content' => !empty($row->content) ? htmlspecialchars(htmlspecialchars_decode($row->content)) : null,
        'type' => config('admin.post.criteria.type'),
        'num' => 0,
        'hash' => Str::lower(Str::random(4)),
        'status' => 'hienthi'
      ]
    );
    return $this->helper->transfer("Sao chép dữ liệu", "success", route('admin.criteria'));
  }

  /* Criteria delete static */
  public function delete($id, $hash)
  {
    $uploadNews = "public/upload/post/";
    $news = News::where('type', config('admin.post.criteria.type'))->where('hash', $hash)->find($id);
    $photo1 = isset($news->photo1) && !empty($news->photo1) ? $news->photo1 : "";
    $photo2 = isset($news->photo2) && !empty($news->photo2) ? $news->photo2 : "";
    $photo3 = isset($news->photo3) && !empty($news->photo3) ? $news->photo3 : "";
    $photo4 = isset($news->photo4) && !empty($news->photo4) ? $news->photo4 : "";
    if (file_exists($uploadNews . $photo1) && !empty($photo1)) unlink($uploadNews . $photo1);
    if (file_exists($uploadNews . $photo2) && !empty($photo2)) unlink($uploadNews . $photo2);
    if (file_exists($uploadNews . $photo3) && !empty($photo3)) unlink($uploadNews . $photo3);
    if (file_exists($uploadNews . $photo4) && !empty($photo4)) unlink($uploadNews . $photo4);
    News::where('type', config('admin.post.criteria.type'))->where('hash', $hash)->delete($id);
    return $this->helper->transfer("Xóa dữ liệu", "success", route('admin.criteria'));
  }

  /* Criteria delete mutiple */
  public function destroy(Request $request)
  {
    $uploadNews = "public/upload/post/";
    $news = News::where('type', config('admin.post.criteria.type'))->find($request->checkitem);
    foreach ($news as $v) {
      $photo1 = isset($v->photo1) && !empty($v->photo1) ? $v->photo1 : "";
      $photo2 = isset($v->photo2) && !empty($v->photo2) ? $v->photo2 : "";
      $photo3 = isset($v->photo3) && !empty($v->photo3) ? $v->photo3 : "";
      $photo4 = isset($v->photo4) && !empty($v->photo4) ? $v->photo4 : "";
      if (file_exists($uploadNews . $photo1) && !empty($photo1)) unlink($uploadNews . $photo1);
      if (file_exists($uploadNews . $photo2) && !empty($photo2)) unlink($uploadNews . $photo2);
      if (file_exists($uploadNews . $photo3) && !empty($photo3)) unlink($uploadNews . $photo3);
      if (file_exists($uploadNews . $photo4) && !empty($photo4)) unlink($uploadNews . $photo4);
    }
    News::destroy($request->checkitem);
    return $this->helper->transfer("Xóa dữ liệu", "success", route('admin.criteria'));
  }

  /* Criteria update number ajax */
  public function updateNumber(Request $request)
  {
    News::where('id', $request->id)->where('type', config('admin.post.criteria.type'))->update(['num' => $request->value]);
  }

  /* Criteria update status ajax */
  public function updateStatus(Request $request)
  {
    $status = News::select('status')->where('type', config('admin.post.criteria.type'))->find($request->id)->status;
    $status = !empty($status) ? explode(',', $status) : [];
    if (array_search($request->value, $status) !== false) {
      $key = array_search($request->value, $status);
      unset($status[$key]);
    } else {
      array_push($status, $request->value);
    }
    $statusStr = implode(',', $status);
    News::where('id', $request->id)->where('type', config('admin.post.criteria.type'))->update(['status' => $statusStr]);
  }

  /* Criteria delete photo */
  public function deletePhoto(Request $request)
  {
    $uploadNews = "public/upload/post/";
    $action = $request->action;
    $photo = News::where('type', config('admin.post.criteria.type'))->find($request->id)->$action;
    $photo = isset($photo) && !empty($photo) ? $photo : "";
    if (file_exists($uploadNews . $photo) && !empty($photo)) unlink($uploadNews . $photo);
    News::where('id', $request->id)->where('type', config('admin.post.criteria.type'))->update([$action => null]);
    return $this->helper->transfer("Xóa dữ liệu", "success", route('admin.criteria.show', ['id' => $request->id]));
  }
}
