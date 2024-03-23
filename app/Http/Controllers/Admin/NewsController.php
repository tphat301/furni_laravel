<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\CategoryNews;
use App\Models\Admin\GalleryProduct;
use App\Models\Admin\News;
use App\Models\Admin\Seo;
use App\Utils\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class NewsController extends Controller
{
  protected $helper;
  protected $type;
  protected $typeCategory1;
  protected $typeCategory2;
  protected $typeCategory3;
  protected $typeCategory4;
  protected $numberPerPage;
  protected $withGallery;
  protected $with1;
  protected $with2;
  protected $with3;
  protected $with4;
  protected $heightGallery;
  protected $height1;
  protected $height2;
  protected $height3;
  protected $height4;
  protected $uploadNews;
  public function __construct()
  {
    $this->middleware('admin.auth');
    $this->helper = new Helpers();
    $this->type = config('admin.news.type');
    $this->typeCategory1 = config('admin.news.category.category1.type');
    $this->typeCategory2 = config('admin.news.category.category2.type');
    $this->typeCategory3 = config('admin.news.category.category3.type');
    $this->typeCategory4 = config('admin.news.category.category4.type');
    $this->numberPerPage = config('admin.news.number_per_page');
    $this->withGallery = config("admin.news.gallery.width");
    $this->with1 = config("admin.news.width1");
    $this->with2 = config("admin.news.width2");
    $this->with3 = config("admin.news.width3");
    $this->with4 = config("admin.news.width4");
    $this->height1 = config("admin.news.height1");
    $this->height2 = config("admin.news.height2");
    $this->height3 = config("admin.news.height3");
    $this->height4 = config("admin.news.height4");
    $this->heightGallery = config("admin.news.gallery.height");
    $this->uploadNews = "public/upload/news";
  }

  /* News list */
  public function index(Request $request)
  {
    $categoryAppendQueryString = ['category1' => $request->category1, 'category2' => $request->category2, 'category3' => $request->category3, 'category4' => $request->category4];
    session(['module_active' => 'news_index']);
    $row1 = CategoryNews::where('type', $this->typeCategory1)->where('level', 1)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->get();
    $row2 = CategoryNews::where('type', $this->typeCategory2)->where('level', 2)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->get();
    $row3 = CategoryNews::where('type', $this->typeCategory3)->where('level', 3)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->get();
    $row4 = CategoryNews::where('type', $this->typeCategory4)->where('level', 4)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->get();
    if ($request->input('keyword')) {
      $rows = News::where("title", "LIKE", "%{$request->input('keyword')}%")->where('type', $this->type)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->paginate($this->numberPerPage)->appends($categoryAppendQueryString);
    } else {
      if ($request->category1) {
        $rows = News::where('type', $this->type)->where('id_parent1', $request->category1)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->paginate($this->numberPerPage)->appends($categoryAppendQueryString);
      } elseif ($request->category2) {
        $rows = News::where('type', $this->type)->where('id_parent2', $request->category2)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->paginate($this->numberPerPage)->appends($categoryAppendQueryString);
      } elseif ($request->category3) {
        $rows = News::where('type', $this->type)->where('id_parent3', $request->category3)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->paginate($this->numberPerPage)->appends($categoryAppendQueryString);
      } elseif ($request->category4) {
        $rows = News::where('type', $this->type)->where('id_parent4', $request->category4)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->paginate($this->numberPerPage)->appends($categoryAppendQueryString);
      } else {
        $rows = News::where('type', $this->type)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->paginate($this->numberPerPage)->appends($categoryAppendQueryString);
      }
    }
    return view('admin.news.index', compact('rows', 'row1', 'row2', 'row3', 'row4'));
  }

  /* News create */
  public function create()
  {
    session(['module_active' => 'product_create']);
    $row1 = CategoryNews::where('type', $this->typeCategory1)->where('level', 1)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->get();
    $row2 = CategoryNews::where('type', $this->typeCategory2)->where('level', 2)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->get();
    $row3 = CategoryNews::where('type', $this->typeCategory3)->where('level', 3)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->get();
    $row4 = CategoryNews::where('type', $this->typeCategory4)->where('level', 4)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->get();
    return view('admin.news.create', compact('row1', 'row2', 'row3', 'row4'));
  }

  /* News insert */
  public function save(Request $request)
  {
    $hashKey = Str::lower(Str::random(4));
    if (!file_exists($this->uploadNews)) {
      mkdir($this->uploadNews, 0777, true);
    }
    $validator = Validator::make(
      $request->all(),
      [
        'slug' => ['required', 'unique:news'],
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
        $image = $manager->read($request->photo1)->resize($this->with1, $this->height1);
        $photo1 = hexdec(uniqid()) . "." . $request->photo1->getClientOriginalName();
        $path = public_path('upload/news');
        $image->save($path . "/" . $photo1);
      }
      if ($request->hasFile('photo2')) {
        $image = $manager->read($request->photo2)->resize($this->with2, $this->height2);
        $photo2 = hexdec(uniqid()) . "." . $request->photo2->getClientOriginalName();
        $path = public_path('upload/news');
        $image->save($path . "/" . $photo2);
      }
      if ($request->hasFile('photo3')) {
        $image = $manager->read($request->photo3)->resize($this->with3, $this->height3);
        $photo3 = hexdec(uniqid()) . "." . $request->photo3->getClientOriginalName();
        $path = public_path('upload/news');
        $image->save($path . "/" . $photo3);
      }
      if ($request->hasFile('photo4')) {
        $image = $manager->read($request->photo4)->resize($this->with4, $this->height4);
        $photo4 = hexdec(uniqid()) . "." . $request->photo4->getClientOriginalName();
        $path = public_path('upload/news');
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
        'photo4' => !empty($photo4) ? $photo4 : null,
        'id_parent1' => !empty($request->input('id_parent1')) ? $request->input('id_parent1') : 0,
        'id_parent2' => !empty($request->input('id_parent2')) ? $request->input('id_parent2') : 0,
        'id_parent3' => !empty($request->input('id_parent3')) ? $request->input('id_parent3') : 0,
        'id_parent4' => !empty($request->input('id_parent4')) ? $request->input('id_parent4') : 0
      ];
      $dataSeo = [
        'title_seo' => !empty($request->input('title_seo')) ? htmlspecialchars($request->input('title_seo')) : null,
        'hash_seo' => $hashKey,
        'type' => $this->type,
        'keywords' => !empty($request->input('keywords')) ? htmlspecialchars($request->input('keywords')) : null,
        'description_seo' => !empty($request->input('description_seo')) ? htmlspecialchars($request->input('description_seo')) : null,
      ];
      News::create($data);
      Seo::create($dataSeo);
      return $this->helper->transfer("Thêm dữ liệu", "success", route('admin.news'));
    } else {
      return redirect()->route('admin.news.create')->withErrors($validator)->withInput();
    }
  }

  /* News detail */
  public function show(Request $request)
  {
    $row = News::where('type', $this->type)->find($request->id);
    $row1 = CategoryNews::where('type', $this->typeCategory1)->where('level', 1)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->get();
    $row2 = CategoryNews::where('type', $this->typeCategory2)->where('level', 2)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->get();
    $row3 = CategoryNews::where('type', $this->typeCategory3)->where('level', 3)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->get();
    $row4 = CategoryNews::where('type', $this->typeCategory4)->where('level', 4)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->get();
    $rowSeo = Seo::where('type', $this->type)->where('hash_seo', $row->hash)->first();
    $rowGallery = GalleryProduct::where('type', $this->type)->where('id_parent', $request->id)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->get();
    return view('admin.news.show', compact('row', 'row1', 'row2', 'row3', 'row4', 'rowSeo', 'rowGallery'));
  }

  /* News update */
  public function update(Request $request)
  {
    if (!file_exists($this->uploadNews)) {
      mkdir($this->uploadNews, 0777, true);
    }
    $manager = new ImageManager(new Driver());
    if ($request->hasFile('photo1')) {
      $image = $manager->read($request->photo1)->resize($this->with1, $this->height1);
      $photo1 = hexdec(uniqid()) . "." . $request->photo1->getClientOriginalName();
      $path = public_path('upload/news');
      $image->save($path . "/" . $photo1);
    }
    if ($request->hasFile('photo2')) {
      $image = $manager->read($request->photo2)->resize($this->with2, $this->height2);
      $photo2 = hexdec(uniqid()) . "." . $request->photo2->getClientOriginalName();
      $path = public_path('upload/news');
      $image->save($path . "/" . $photo2);
    }
    if ($request->hasFile('photo3')) {
      $image = $manager->read($request->photo3)->resize($this->with3, $this->height3);
      $photo3 = hexdec(uniqid()) . "." . $request->photo3->getClientOriginalName();
      $path = public_path('upload/news');
      $image->save($path . "/" . $photo3);
    }
    if ($request->hasFile('photo4')) {
      $image = $manager->read($request->photo4)->resize($this->with4, $this->height4);
      $photo4 = hexdec(uniqid()) . "." . $request->photo4->getClientOriginalName();
      $path = public_path('upload/news');
      $image->save($path . "/" . $photo4);
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
      'id_parent1' => !empty($request->input('id_parent1')) ? $request->input('id_parent1') : 0,
      'id_parent2' => !empty($request->input('id_parent2')) ? $request->input('id_parent2') : 0,
      'id_parent3' => !empty($request->input('id_parent3')) ? $request->input('id_parent3') : 0,
      'id_parent4' => !empty($request->input('id_parent4')) ? $request->input('id_parent4') : 0
    ];
    $news = News::where('type', $this->type)->find($request->id);
    $dataSeo = [
      'title_seo' => !empty($request->input('title_seo')) ? htmlspecialchars($request->input('title_seo')) : null,
      'keywords' => !empty($request->input('keywords')) ? htmlspecialchars($request->input('keywords')) : null,
      'description_seo' => !empty($request->input('description_seo')) ? htmlspecialchars($request->input('description_seo')) : null,
      'schema' => !empty($request->input('schema')) ? htmlspecialchars($request->input('schema')) : null,
      'hash_seo' => $news->hash,
      'type' => $this->type,
      'id_parent' => !empty($news->id) ? $news->id  : null
    ];
    $news->update($data);
    $seo = Seo::where('hash_seo', $news->hash)->first();
    if ($seo) {
      Seo::where('hash_seo', $news->hash)->update($dataSeo);
    } else {
      Seo::create($dataSeo);
    }
    return $this->helper->transfer("Cập nhật dữ liệu", "success", route('admin.news.show', ['id' => $news->id]));
  }

  /* News duplicate */
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
        'status' => 'hienthi',
        'id_parent1' => !empty($row->id_parent1) ? $row->id_parent1 : 0,
        'id_parent2' => !empty($row->id_parent2) ? $row->id_parent2 : 0,
        'id_parent3' => !empty($row->id_parent3) ? $row->id_parent3 : 0,
        'id_parent4' => !empty($row->id_parent4) ? $row->id_parent4 : 0,
      ]
    );
    return $this->helper->transfer("Sao chép dữ liệu", "success", route('admin.news'));
  }

  /* News delete static */
  public function delete($id, $hash)
  {
    $uploadNews = "public/upload/news/";
    $uploadGallery = "public/upload/gallery/";
    $news = News::where('type', $this->type)->where('hash', $hash)->find($id);
    $seo = SEO::where('type', $this->type)->where('hash_seo', $hash);
    $gallerys = GalleryProduct::where('type', $this->type)->where('id_parent', $id);
    $photo1 = isset($news->photo1) && !empty($news->photo1) ? $news->photo1 : "";
    $photo2 = isset($news->photo2) && !empty($news->photo2) ? $news->photo2 : "";
    $photo3 = isset($news->photo3) && !empty($news->photo3) ? $news->photo3 : "";
    $photo4 = isset($news->photo4) && !empty($news->photo4) ? $news->photo4 : "";
    if (file_exists($uploadNews . $photo1) && !empty($photo1)) unlink($uploadNews . $photo1);
    if (file_exists($uploadNews . $photo2) && !empty($photo2)) unlink($uploadNews . $photo2);
    if (file_exists($uploadNews . $photo3) && !empty($photo3)) unlink($uploadNews . $photo3);
    if (file_exists($uploadNews . $photo4) && !empty($photo4)) unlink($uploadNews . $photo4);
    if ($gallerys->get()) {
      foreach ($gallerys->get() as $gallery) {
        $galleryPhoto = isset($gallery->photo) && !empty($gallery->photo) ? $gallery->photo : "";
        if (file_exists($uploadGallery . $galleryPhoto) && !empty($galleryPhoto)) unlink($uploadGallery . $galleryPhoto);
      }
    }
    News::where('type', $this->type)->where('hash', $hash)->delete($id);
    $seo->delete();
    $gallerys->delete();
    return $this->helper->transfer("Xóa dữ liệu", "success", route('admin.news'));
  }

  /* News delete mutiple */
  public function destroy(Request $request)
  {
    $uploadNews = "public/upload/news/";
    $uploadGallery = "public/upload/gallery/";
    $news = News::where('type', $this->type)->find($request->checkitem);
    $idParent = [];
    foreach ($news as $v) {
      $photo1 = isset($v->photo1) && !empty($v->photo1) ? $v->photo1 : "";
      $photo2 = isset($v->photo2) && !empty($v->photo2) ? $v->photo2 : "";
      $photo3 = isset($v->photo3) && !empty($v->photo3) ? $v->photo3 : "";
      $photo4 = isset($v->photo4) && !empty($v->photo4) ? $v->photo4 : "";
      if (file_exists($uploadNews . $photo1) && !empty($photo1)) unlink($uploadNews . $photo1);
      if (file_exists($uploadNews . $photo2) && !empty($photo2)) unlink($uploadNews . $photo2);
      if (file_exists($uploadNews . $photo3) && !empty($photo3)) unlink($uploadNews . $photo3);
      if (file_exists($uploadNews . $photo4) && !empty($photo4)) unlink($uploadNews . $photo4);
      $idParent[] = $v->id;
    }
    if (count($idParent) > 0) {
      foreach ($idParent as $v) {
        $gallerys = GalleryProduct::where('type', $this->type)->where('id_parent', $v);
        if ($gallerys->get()) {
          foreach ($gallerys->get() as $gallery) {
            $galleryPhoto = isset($gallery->photo) && !empty($gallery->photo) ? $gallery->photo : "";
            if (file_exists($uploadGallery . $galleryPhoto) && !empty($galleryPhoto)) unlink($uploadGallery . $galleryPhoto);
          }
        }
        $gallerys->delete();
      }
    }
    Seo::where('type', $this->type)->whereIn('hash_seo', $request->hashes)->delete();
    News::destroy($request->checkitem);
    return $this->helper->transfer("Xóa dữ liệu", "success", route('admin.news'));
  }

  /* News update number ajax */
  public function updateNumber(Request $request)
  {
    News::where('id', $request->id)->where('type', $this->type)->update(['num' => $request->value]);
  }

  /* News update status ajax */
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

  /* News delete photo */
  public function deletePhoto(Request $request)
  {
    $uploadNews = "public/upload/news/";
    $action = $request->action;
    $photo = News::where('type', $this->type)->find($request->id)->$action;
    $photo = isset($photo) && !empty($photo) ? $photo : "";
    if (file_exists($uploadNews . $photo) && !empty($photo)) unlink($uploadNews . $photo);
    News::where('id', $request->id)->where('type', $this->type)->update([$action => null]);
    return $this->helper->transfer("Xóa dữ liệu", "success", route('admin.news.show', ['id' => $request->id]));
  }

  /* News schema JSON */
  public function schema(Request $request)
  {
    $row = News::where('type', $this->type)->find($request->id);
    $seo = Seo::where('type', $this->type)->where('hash_seo', $row->hash)->first();
    $photo = !empty($row->photo1 ? config('app.asset_url') . "upload/news/$row->photo1" : config('app.url') . "resources/images/noimage.png");
    $schemaJSON = $this->helper->buildSchemaArticle($row->id, $row->title, $photo, Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->format('d/m/Y H:i:s'), Carbon::createFromFormat('Y-m-d H:i:s', $row->updated_at)->format('d/m/Y H:i:s'), 'Tên công ty', config('app.url') . "news/" . $row->slug, "Logo", config('app.url'));
    if ($seo) {
      Seo::where('type', $this->type)->where('hash_seo', $row->hash)->update(['schema' => $schemaJSON]);
      return $this->helper->transfer("Tạo schema JSON Article", "success", route('admin.news.show', ['id' => $row->id]));
    } else {
      echo "<script>alert('Bạn cần có Data SEO để tạo Schema JSON Article')</script>";
      return $this->helper->transfer("Tạo schema JSON Article", "danger", route('admin.news.show', ['id' => $row->id]));
    }
  }

  /* News gallery */
  public function gallery(Request $request)
  {
    $uploadGallery = "public/upload/gallery/";
    if (!file_exists($uploadGallery)) {
      mkdir($uploadGallery, 0777, true);
    }
    $validator = Validator::make(
      $request->all(),
      [
        "file" => ['image', 'mimes:png,jpg,jpeg,svg,webp', 'max:20971520'],
      ],
      [
        'image' => ':attribute chỉ cho phép upload định dạng là hình ảnh.',
        'mimes' => ':attribute chỉ cho phép upload các định dạng :mimes',
        'max' => ':attribute chỉ cho upload tối đa là :max MB',
      ],
      [
        "file" => 'Hình ảnh'
      ]
    );

    if (!$validator->fails()) {
      $manager = new ImageManager(new Driver());
      if ($request->hasFile('file')) {
        $image = $manager->read($request->file)->resize($this->withGallery, $this->heightGallery);
        $photo = hexdec(uniqid()) . "." . $request->file->getClientOriginalName();
        $path = public_path('upload/gallery');
        $image->save($path . "/" . $photo);
        $dataGallery = [
          'photo' => $photo,
          'id_parent' => $request->id,
          'title' => pathinfo($photo, PATHINFO_FILENAME),
          'status' => "hienthi",
          'num' => 0,
          'type' => $this->type
        ];
        GalleryProduct::create($dataGallery);
      }
    } else {
      return $this->helper->transfer("Thêm dữ liệu", "danger", route('admin.news'));
    }
  }

  /* News gallery delete */
  public function deleteGallery(Request $request)
  {
    $uploadGallery = "public/upload/gallery/";
    $galleryPhoto = GalleryProduct::where('type', $this->type)->find($request->id)->photo;
    $galleryPhoto = isset($galleryPhoto) && !empty($galleryPhoto) ? $galleryPhoto : "";
    if (file_exists($uploadGallery . $galleryPhoto) && !empty($galleryPhoto)) unlink($uploadGallery . $galleryPhoto);
    GalleryProduct::where('type', $this->type)->where('id', $request->id)->delete();
    return $this->helper->transfer("Xóa dữ liệu", "success", route('admin.news'));
  }

  /* News gallery update title */
  public function galleryTitle(Request $request)
  {
    @$id = $request->id;
    @$title = $request->value;
    GalleryProduct::where('type', $this->type)->where('id', $id)->update(['title' => $title]);
  }

  /* News gallery update number */
  public function galleryNumber(Request $request)
  {
    @$id = $request->id;
    @$num = $request->value;
    GalleryProduct::where('type', $this->type)->where('id', $id)->update(['num' => $num]);
  }

  /* News filter category */
  public function filterCategory(Request $request)
  {
    @$id = $request->id;
    @$level = $request->level;
    $row = CategoryNews::where('type', $this->type)->where('id_parent', $id)->where('level', $level)->get();
    if ($row->count() > 0) {
      $output = '';
      $output .= '<option>Danh mục cấp ' . $level . '</option>';
      foreach ($row as $v) {
        $output .= '<option value="' . $v->id . '">
                    ' . $v->title . '
                  </option>';
      }
      echo $output;
    } else {
      $row = CategoryNews::where('type', $this->type)->where('level', $level)->get();
      if ($row) {
        $output = '';
        $output .= '<option>Danh mục cấp ' . $level . '</option>';
        foreach ($row as $v) {
          $output .= '<option value="' . $v->id . '">
                      ' . $v->title . '
                    </option>';
        }
        echo $output;
      }
    }
  }
}
