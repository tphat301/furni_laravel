<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\News;
use App\Models\Admin\Seo;
use App\Utils\Helpers;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PolicyController extends Controller
{
  protected $helper;
  protected $type;
  protected $numberPerPage;
  protected $width1;
  protected $width2;
  protected $width3;
  protected $width4;
  protected $height1;
  protected $height2;
  protected $height3;
  protected $height4;
  protected $uploadPost;
  public function __construct()
  {
    $this->middleware('admin.auth');
    $this->helper = new Helpers();
    $this->type = config('admin.post.policy.type');
    $this->numberPerPage = config('admin.post.policy.number_per_page');
    $this->width1 = config("admin.post.policy.width1");
    $this->width2 = config("admin.post.policy.width2");
    $this->width3 = config("admin.post.policy.width3");
    $this->width4 = config("admin.post.policy.width4");
    $this->height1 = config("admin.post.policy.height1");
    $this->height2 = config("admin.post.policy.height2");
    $this->height3 = config("admin.post.policy.height3");
    $this->height4 = config("admin.post.policy.height4");
    $this->uploadPost = "public/upload/post";
  }

  /* Policy list */
  public function index(Request $request)
  {
    session(['module_active' => 'policy_index']);
    if ($request->input('keyword')) {
      $rows = News::where("title", "LIKE", "%{$request->input('keyword')}%")->where('type', $this->type)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->paginate($this->numberPerPage);
    } else {
      $rows = News::where('type', $this->type)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->paginate($this->numberPerPage);
    }
    return view('admin.post.policy_index', compact('rows'));
  }

  /* Policy create */
  public function create()
  {
    session(['module_active' => 'policy_create']);
    return view('admin.post.policy_create');
  }

  /* Policy insert */
  public function save(Request $request)
  {
    $hashKey = Str::lower(Str::random(4));
    if (!file_exists($this->uploadPost)) {
      mkdir($this->uploadPost, 0777, true);
    }
    $validator = Validator::make(
      $request->all(),
      [
        'title' => ['required', 'unique:news'],
        "photo1" => ['image', 'mimes:png,jpg,jpeg,svg,webp', 'max:20971520'],
        "photo2" => ['image', 'mimes:png,jpg,jpeg,svg,webp', 'max:20971520'],
        "photo3" => ['image', 'mimes:png,jpg,jpeg,svg,webp', 'max:20971520'],
        "photo4" => ['image', 'mimes:png,jpg,jpeg,svg,webp', 'max:20971520']
      ],
      [
        'required' => ':attribute không được để trống',
        'unique' => ':attribute đã tồn tại. :attribute truy cập mục này có thể bị trùng lặp.',
        'string' => ':attribute phải ở dạng chuỗi ký tự',
        'image' => ':attribute chỉ cho phép upload định dạng là hình ảnh.',
        'mimes' => ':attribute chỉ cho phép upload các định dạng :mimes',
        'max' => ':attribute chỉ cho upload tối đa là :max MB'
      ],
      [
        'slug' => 'Đường dẫn',
        'title' => 'Tiêu đề',
        'photo1' => 'Hình ảnh 1',
        'photo2' => 'Hình ảnh 2',
        'photo3' => 'Hình ảnh 3',
        'photo4' => 'Hình ảnh 4'
      ]
    );

    if (!$validator->fails()) {
      $manager = new ImageManager(new Driver());
      if ($request->hasFile('photo1')) {
        $image = $manager->read($request->photo1)->resize($this->width1, $this->height1);
        $photo1 = hexdec(uniqid()) . "." . $request->photo1->getClientOriginalName();
        $path = public_path('upload/post');
        $image->save($path . "/" . $photo1);
      }
      if ($request->hasFile('photo2')) {
        $image = $manager->read($request->photo2)->resize($this->width2, $this->height2);
        $photo2 = hexdec(uniqid()) . "." . $request->photo2->getClientOriginalName();
        $path = public_path('upload/post');
        $image->save($path . "/" . $photo2);
      }
      if ($request->hasFile('photo3')) {
        $image = $manager->read($request->photo3)->resize($this->width3, $this->height3);
        $photo3 = hexdec(uniqid()) . "." . $request->photo3->getClientOriginalName();
        $path = public_path('upload/post');
        $image->save($path . "/" . $photo3);
      }
      if ($request->hasFile('photo4')) {
        $image = $manager->read($request->photo4)->resize($this->width4, $this->height4);
        $photo4 = hexdec(uniqid()) . "." . $request->photo4->getClientOriginalName();
        $path = public_path('upload/post');
        $image->save($path . "/" . $photo4);
      }
      $data = [
        'slug' => htmlspecialchars($request->input('slug')),
        'title' => htmlspecialchars($request->input('title')),
        'status' => !empty($request->input('status')) ? htmlspecialchars(implode(',', $request->input('status'))) : 'hienthi',
        'hash' => $hashKey,
        'type' => $this->type,
        'num' => !empty($request->input('num')) ? $request->input('num') : 0,
        'desc' => !empty($request->input('desc')) ? htmlspecialchars($request->input('desc')) : null,
        'content' => !empty($request->input('content')) ? htmlspecialchars($request->input('content')) : null,
        'photo1' => !empty($photo1) ? $photo1 : null,
        'photo2' => !empty($photo2) ? $photo2 : null,
        'photo3' => !empty($photo3) ? $photo3 : null,
        'photo4' => !empty($photo4) ? $photo4 : null
      ];
      if ($request->input('title_seo')) {
        $dataSeo = [
          'title_seo' => htmlspecialchars($request->input('title_seo')),
          'hash_seo' => $hashKey,
          'type' => $this->type,
          'keywords' => !empty($request->input('keywords')) ? htmlspecialchars($request->input('keywords')) : null,
          'description_seo' => !empty($request->input('description_seo')) ? htmlspecialchars($request->input('description_seo')) : null,
        ];
        Seo::create($dataSeo);
      }
      News::create($data);
      return $this->helper->transfer("Thêm dữ liệu", "success", route('admin.policy'));
    } else {
      return redirect()->route('admin.policy.create')->withErrors($validator)->withInput();
    }
  }

  /* Policy detail */
  public function show(Request $request)
  {
    $row = News::where('type', $this->type)->find($request->id);
    $rowSeo = Seo::where('type', $this->type)->where('hash_seo', $row->hash)->first();
    return view('admin.post.policy_show', compact('row', 'rowSeo'));
  }

  /* Policy update */
  public function update(Request $request)
  {
    $news = News::where('type', $this->type)->find($request->id);
    if (!file_exists($this->uploadPost)) {
      mkdir($this->uploadPost, 0777, true);
    }
    $manager = new ImageManager(new Driver());
    if ($request->hasFile('photo1')) {
      $image = $manager->read($request->photo1)->resize($this->width1, $this->height1);
      $photo1 = hexdec(uniqid()) . "." . $request->photo1->getClientOriginalName();
      $path = public_path('upload/post');
      $image->save($path . "/" . $photo1);
    } else {
      $photo1 = isset($news->photo1) ? $news->photo1 : null;
    }
    if ($request->hasFile('photo2')) {
      $image = $manager->read($request->photo2)->resize($this->width2, $this->height2);
      $photo2 = hexdec(uniqid()) . "." . $request->photo2->getClientOriginalName();
      $path = public_path('upload/post');
      $image->save($path . "/" . $photo2);
    } else {
      $photo2 = isset($news->photo2) ? $news->photo2 : null;
    }
    if ($request->hasFile('photo3')) {
      $image = $manager->read($request->photo3)->resize($this->width3, $this->height3);
      $photo3 = hexdec(uniqid()) . "." . $request->photo3->getClientOriginalName();
      $path = public_path('upload/post');
      $image->save($path . "/" . $photo3);
    } else {
      $photo3 = isset($news->photo3) ? $news->photo3 : null;
    }
    if ($request->hasFile('photo4')) {
      $image = $manager->read($request->photo4)->resize($this->width4, $this->height4);
      $photo4 = hexdec(uniqid()) . "." . $request->photo4->getClientOriginalName();
      $path = public_path('upload/post');
      $image->save($path . "/" . $photo4);
    } else {
      $photo4 = isset($news->photo4) ? $news->photo4 : null;
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
      'photo4' => !empty($photo4) ? $photo4 : null
    ];
    if ($request->input('title_seo')) {
      $dataSeo = [
        'title_seo' => htmlspecialchars($request->input('title_seo')),
        'keywords' => !empty($request->input('keywords')) ? htmlspecialchars($request->input('keywords')) : null,
        'description_seo' => !empty($request->input('description_seo')) ? htmlspecialchars($request->input('description_seo')) : null,
        'schema' => !empty($request->input('schema')) ? htmlspecialchars($request->input('schema')) : null,
        'hash_seo' => $news->hash,
        'type' => $this->type,
        'id_parent' => !empty($news->id) ? $news->id  : null
      ];
      $seo = Seo::where('hash_seo', $news->hash)->first();
      if ($seo) {
        Seo::where('hash_seo', $news->hash)->update($dataSeo);
      } else {
        Seo::create($dataSeo);
      }
    }
    $news->update($data);
    return $this->helper->transfer("Cập nhật dữ liệu", "success", route('admin.policy.show', ['id' => $news->id]));
  }

  /* Policy duplicate */
  public function copy($id)
  {
    $row = News::where('type', $this->type)->find($id);
    $titleCopy = $row->title . " copy " . str_repeat(Str::lower(Str::random(4)), 1);
    $slugCopy = $this->helper->changeTitle($titleCopy);
    News::create(
      [
        'slug' => htmlspecialchars($slugCopy),
        'title' => htmlspecialchars($titleCopy),
        'desc' => !empty($row->desc) ? htmlspecialchars(htmlspecialchars_decode($row->desc)) : null,
        'content' => !empty($row->content) ? htmlspecialchars(htmlspecialchars_decode($row->content)) : null,
        'type' => $this->type,
        'num' => 0,
        'hash' => Str::lower(Str::random(4)),
        'status' => 'hienthi'
      ]
    );
    return $this->helper->transfer("Sao chép dữ liệu", "success", route('admin.policy'));
  }

  /* Policy delete static */
  public function delete($id, $hash)
  {
    $uploadNews = "public/upload/post/";
    $news = News::where('type', $this->type)->where('hash', $hash)->find($id);
    $seo = SEO::where('type', $this->type)->where('hash_seo', $hash);
    $photo1 = isset($news->photo1) && !empty($news->photo1) ? $news->photo1 : "";
    $photo2 = isset($news->photo2) && !empty($news->photo2) ? $news->photo2 : "";
    $photo3 = isset($news->photo3) && !empty($news->photo3) ? $news->photo3 : "";
    $photo4 = isset($news->photo4) && !empty($news->photo4) ? $news->photo4 : "";
    if (file_exists($uploadNews . $photo1) && !empty($photo1)) unlink($uploadNews . $photo1);
    if (file_exists($uploadNews . $photo2) && !empty($photo2)) unlink($uploadNews . $photo2);
    if (file_exists($uploadNews . $photo3) && !empty($photo3)) unlink($uploadNews . $photo3);
    if (file_exists($uploadNews . $photo4) && !empty($photo4)) unlink($uploadNews . $photo4);
    $news->delete();
    $seo->delete();
    return $this->helper->transfer("Xóa dữ liệu", "success", route('admin.policy'));
  }

  /* Policy delete mutiple */
  public function destroy(Request $request)
  {
    $uploadNews = "public/upload/post/";
    $news = News::where('type', $this->type)->find($request->checkitem);
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
    Seo::where('type', $this->type)->whereIn('hash_seo', $request->hashes)->delete();
    News::destroy($request->checkitem);
    return $this->helper->transfer("Xóa dữ liệu", "success", route('admin.policy'));
  }

  /* Policy update number ajax */
  public function updateNumber(Request $request)
  {
    News::where('id', $request->id)->where('type', $this->type)->update(['num' => $request->value]);
  }

  /* Policy update status ajax */
  public function updateStatus(Request $request)
  {
    $status = News::select('status')->where('type', $this->type)->find($request->id)->status;
    $status = !empty($status) ? explode(',', $status) : [];
    if (array_search($request->value, $status) !== false) {
      $key = array_search($request->value, $status);
      unset($status[$key]);
    } else {
      array_push($status, $request->value);
    }
    $statusStr = implode(',', $status);
    News::where('id', $request->id)->where('type', $this->type)->update(['status' => $statusStr]);
  }

  /* Policy delete photo */
  public function deletePhoto(Request $request)
  {
    $uploadNews = "public/upload/post/";
    $action = $request->action;
    $photo = News::where('type', $this->type)->find($request->id)->$action;
    $photo = isset($photo) && !empty($photo) ? $photo : "";
    if (file_exists($uploadNews . $photo) && !empty($photo)) unlink($uploadNews . $photo);
    News::where('id', $request->id)->where('type', $this->type)->update([$action => null]);
    return $this->helper->transfer("Xóa dữ liệu", "success", route('admin.policy.show', ['id' => $request->id]));
  }

  /* Policy schema JSON */
  public function schema(Request $request)
  {
    $row = News::where('type', $this->type)->find($request->id);
    $seo = Seo::where('type', $this->type)->where('hash_seo', $row->hash)->first();
    $photo = !empty($row->photo1 ? config('app.asset_url') . "upload/news/$row->photo1" : config('app.url') . "resources/images/noimage.png");
    $schemaJSON = $this->helper->buildSchemaArticle($row->id, $row->title, $photo, Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->format('d/m/Y H:i:s'), Carbon::createFromFormat('Y-m-d H:i:s', $row->updated_at)->format('d/m/Y H:i:s'), 'Tên công ty', config('app.url') . "news/" . $row->slug, "Logo", config('app.url'));
    if ($seo) {
      Seo::where('type', $this->type)->where('hash_seo', $row->hash)->update(['schema' => $schemaJSON]);
      return $this->helper->transfer("Tạo schema JSON Article", "success", route('admin.policy.show', ['id' => $row->id]));
    } else {
      echo "<script>alert('Bạn cần có Data SEO để tạo Schema JSON Article')</script>";
      return $this->helper->transfer("Tạo schema JSON Article", "danger", route('admin.policy.show', ['id' => $row->id]));
    }
  }
}
