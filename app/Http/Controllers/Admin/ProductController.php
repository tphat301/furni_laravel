<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\CategoryProduct;
use App\Models\Admin\GalleryProduct;
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
  public function index(Request $request)
  {
    session(['module_active' => 'product_index']);
    $row1 = CategoryProduct::where('type', config('admin.product.category.category1.type'))->where('level', 1)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->get();
    $row2 = CategoryProduct::where('type', config('admin.product.category.category2.type'))->where('level', 2)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->get();
    $row3 = CategoryProduct::where('type', config('admin.product.category.category3.type'))->where('level', 3)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->get();
    $row4 = CategoryProduct::where('type', config('admin.product.category.category4.type'))->where('level', 4)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->get();

    if ($request->input('keyword')) {
      $rows = Product::where("title", "LIKE", "%{$request->input('keyword')}%")->where('type', config('admin.product.type'))->orderBy('num', 'ASC')->orderBy('id', 'ASC')->paginate(config('admin.product.number_per_page'))->appends(['category1' => $request->category1, 'category2' => $request->category2, 'category3' => $request->category3, 'category4' => $request->category4]);
    } else {
      if ($request->category1) {
        $rows = Product::where('type', config('admin.product.type'))->where('id_parent1', $request->category1)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->paginate(config('admin.product.number_per_page'))->appends(['category1' => $request->category1, 'category2' => $request->category2, 'category3' => $request->category3, 'category4' => $request->category4]);
      } elseif ($request->category2) {
        $rows = Product::where('type', config('admin.product.type'))->where('id_parent2', $request->category2)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->paginate(config('admin.product.number_per_page'))->appends(['category1' => $request->category1, 'category2' => $request->category2, 'category3' => $request->category3, 'category4' => $request->category4]);
      } elseif ($request->category3) {
        $rows = Product::where('type', config('admin.product.type'))->where('id_parent3', $request->category3)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->paginate(config('admin.product.number_per_page'))->appends(['category1' => $request->category1, 'category2' => $request->category2, 'category3' => $request->category3, 'category4' => $request->category4]);
      } elseif ($request->category4) {
        $rows = Product::where('type', config('admin.product.type'))->where('id_parent4', $request->category4)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->paginate(config('admin.product.number_per_page'))->appends(['category1' => $request->category1, 'category2' => $request->category2, 'category3' => $request->category3, 'category4' => $request->category4]);
      } else {
        $rows = Product::where('type', config('admin.product.type'))->orderBy('num', 'ASC')->orderBy('id', 'ASC')->paginate(config('admin.product.number_per_page'))->appends(['category1' => $request->category1, 'category2' => $request->category2, 'category3' => $request->category3, 'category4' => $request->category4]);
      }
    }
    return view('admin.product.index', compact('rows', 'row1', 'row2', 'row3', 'row4'));
  }

  /* Product create */
  public function create()
  {
    $row1 = CategoryProduct::where('type', config('admin.product.category.category1.type'))->where('level', 1)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->get();
    $row2 = CategoryProduct::where('type', config('admin.product.category.category2.type'))->where('level', 2)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->get();
    $row3 = CategoryProduct::where('type', config('admin.product.category.category3.type'))->where('level', 3)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->get();
    $row4 = CategoryProduct::where('type', config('admin.product.category.category4.type'))->where('level', 4)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->get();
    session(['module_active' => 'product_create']);
    return view('admin.product.create', compact('row1', 'row2', 'row3', 'row4'));
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
        'id_parent4' => !empty($request->input('id_parent4')) ? $request->input('id_parent4') : 0,
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
      return redirect()->route('admin.product.create')->withErrors($validator)->withInput();
    }
  }

  /* Product detail */
  public function show(Request $request)
  {
    $row = Product::where('type', config('admin.product.type'))->find($request->id);
    $row1 = CategoryProduct::where('type', config('admin.product.category.category1.type'))->where('level', 1)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->get();
    $row2 = CategoryProduct::where('type', config('admin.product.category.category2.type'))->where('level', 2)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->get();
    $row3 = CategoryProduct::where('type', config('admin.product.category.category3.type'))->where('level', 3)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->get();
    $row4 = CategoryProduct::where('type', config('admin.product.category.category4.type'))->where('level', 4)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->get();
    $rowSeo = Seo::where('type', config('admin.product.type'))->where('hash_seo', $row->hash)->first();
    $rowGallery = GalleryProduct::where('type', config('admin.product.type'))->where('id_parent', $request->id)->orderBy('num', 'ASC')->orderBy('id', 'ASC')->get();
    return view('admin.product.show', compact('row', 'row1', 'row2', 'row3', 'row4', 'rowSeo', 'rowGallery'));
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
      'id_parent1' => !empty($request->input('id_parent1')) ? $request->input('id_parent1') : 0,
      'id_parent2' => !empty($request->input('id_parent2')) ? $request->input('id_parent2') : 0,
      'id_parent3' => !empty($request->input('id_parent3')) ? $request->input('id_parent3') : 0,
      'id_parent4' => !empty($request->input('id_parent4')) ? $request->input('id_parent4') : 0,
    ];
    $product = Product::where('type', config('admin.product.type'))->find($request->id);
    $dataSeo = [
      'title_seo' => !empty($request->input('title_seo')) ? htmlspecialchars($request->input('title_seo')) : null,
      'keywords' => !empty($request->input('keywords')) ? htmlspecialchars($request->input('keywords')) : null,
      'description_seo' => !empty($request->input('description_seo')) ? htmlspecialchars($request->input('description_seo')) : null,
      'schema' => !empty($request->input('schema')) ? htmlspecialchars($request->input('schema')) : null,
      'hash_seo' => $product->hash,
      'type' => config('admin.product.type'),
      'id_parent' => !empty($product->id) ? $product->id  : null
    ];
    $product->update($data);
    $seo = Seo::where('hash_seo', $product->hash)->first();
    if ($seo) {
      Seo::where('hash_seo', $product->hash)->update($dataSeo);
    } else {
      Seo::create($dataSeo);
    }
    return $this->helper->transfer("Cập nhật dữ liệu", "success", route('admin.product.show', ['id' => $product->id]));
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
        'status' => 'hienthi',
        'id_parent1' => !empty($row->id_parent1) ? $row->id_parent1 : 0,
        'id_parent2' => !empty($row->id_parent2) ? $row->id_parent2 : 0,
        'id_parent3' => !empty($row->id_parent3) ? $row->id_parent3 : 0,
        'id_parent4' => !empty($row->id_parent4) ? $row->id_parent4 : 0,
      ]
    );
    return $this->helper->transfer("Sao chép dữ liệu", "success", route('admin.product'));
  }

  /* Product delete static */
  public function delete($id, $hash)
  {
    $uploadProduct = "public/upload/product/";
    $uploadGallery = "public/upload/gallery/";
    $product = Product::where('type', config('admin.product.type'))->where('hash', $hash)->find($id);
    $seo = SEO::where('type', config('admin.product.type'))->where('hash_seo', $hash);
    $gallerys = GalleryProduct::where('type', config('admin.product.type'))->where('id_parent', $id);
    $photo1 = isset($product->photo1) && !empty($product->photo1) ? $product->photo1 : "";
    $photo2 = isset($product->photo2) && !empty($product->photo2) ? $product->photo2 : "";
    $photo3 = isset($product->photo3) && !empty($product->photo3) ? $product->photo3 : "";
    $photo4 = isset($product->photo4) && !empty($product->photo4) ? $product->photo4 : "";
    if (file_exists($uploadProduct . $photo1) && !empty($photo1)) unlink($uploadProduct . $photo1);
    if (file_exists($uploadProduct . $photo2) && !empty($photo2)) unlink($uploadProduct . $photo2);
    if (file_exists($uploadProduct . $photo3) && !empty($photo3)) unlink($uploadProduct . $photo3);
    if (file_exists($uploadProduct . $photo4) && !empty($photo4)) unlink($uploadProduct . $photo4);
    if ($gallerys->get()) {
      foreach ($gallerys->get() as $gallery) {
        $galleryPhoto = isset($gallery->photo) && !empty($gallery->photo) ? $gallery->photo : "";
        if (file_exists($uploadGallery . $galleryPhoto) && !empty($galleryPhoto)) unlink($uploadGallery . $galleryPhoto);
      }
    }
    Product::where('type', config('admin.product.type'))->where('hash', $hash)->delete($id);
    $seo->delete();
    $gallerys->delete();
    return $this->helper->transfer("Xóa dữ liệu", "success", route('admin.product'));
  }

  /* Product delete mutiple */
  public function destroy(Request $request)
  {
    $uploadProduct = "public/upload/product/";
    $uploadGallery = "public/upload/gallery/";
    $product = Product::where('type', config('admin.product.type'))->find($request->checkitem);
    $idParent = [];
    foreach ($product as $v) {
      $photo1 = isset($v->photo1) && !empty($v->photo1) ? $v->photo1 : "";
      $photo2 = isset($v->photo2) && !empty($v->photo2) ? $v->photo2 : "";
      $photo3 = isset($v->photo3) && !empty($v->photo3) ? $v->photo3 : "";
      $photo4 = isset($v->photo4) && !empty($v->photo4) ? $v->photo4 : "";
      if (file_exists($uploadProduct . $photo1) && !empty($photo1)) unlink($uploadProduct . $photo1);
      if (file_exists($uploadProduct . $photo2) && !empty($photo2)) unlink($uploadProduct . $photo2);
      if (file_exists($uploadProduct . $photo3) && !empty($photo3)) unlink($uploadProduct . $photo3);
      if (file_exists($uploadProduct . $photo4) && !empty($photo4)) unlink($uploadProduct . $photo4);
      $idParent[] = $v->id;
    }
    if (count($idParent) > 0) {
      foreach ($idParent as $v) {
        $gallerys = GalleryProduct::where('type', config('admin.product.type'))->where('id_parent', $v);
        if ($gallerys->get()) {
          foreach ($gallerys->get() as $gallery) {
            $galleryPhoto = isset($gallery->photo) && !empty($gallery->photo) ? $gallery->photo : "";
            if (file_exists($uploadGallery . $galleryPhoto) && !empty($galleryPhoto)) unlink($uploadGallery . $galleryPhoto);
          }
        }
        $gallerys->delete();
      }
    }
    Seo::where('type', config('admin.product.type'))->whereIn('hash_seo', $request->hashes)->delete();
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
  public function schema(Request $request)
  {
    $row = Product::where('type', config('admin.product.type'))->find($request->id);
    $seo = Seo::where('type', config('admin.product.type'))->where('hash_seo', $row->hash)->first();
    $photo = !empty($row->photo1 ? config('app.asset_url') . "upload/product/$row->photo1" : config('app.url') . "resources/images/noimage.png");
    $schemaJSON = $this->helper->buildSchemaProduct($row->id, $row->title, $photo, $row->code, 'Tên hãng', htmlspecialchars_decode($row->desc), $row->sale_price, 'Tên tác giả Developer', config('app.url') . "product/" . $row->slug);
    if ($seo) {
      Seo::where('type', config('admin.product.type'))->where('hash_seo', $row->hash)->update(['schema' => $schemaJSON]);
      return $this->helper->transfer("Tạo schema JSON", "success", route('admin.product.show', ['id' => $row->id]));
    } else {
      echo "<script>alert('Bạn cần có Data SEO để tạo Schema JSON Product')</script>";
      return $this->helper->transfer("Tạo schema JSON", "danger", route('admin.product.show', ['id' => $row->id]));
    }
  }

  /* Product gallery */
  public function gallery(Request $request)
  {
    $typeAllow = ['png', 'jpg', 'jpeg', 'gif', 'webp'];
    $uploadGallery = "public/upload/gallery/";
    if ($this->helper->hasFile("file")) {
      $fileResult = $this->helper->uploadFile("file", $typeAllow, $uploadGallery);
      $dataGallery = [
        'photo' => $fileResult,
        'id_parent' => $request->id,
        'title' => pathinfo($fileResult, PATHINFO_FILENAME),
        'status' => "hienthi",
        'num' => 0,
        'type' => config('admin.product.type')
      ];
      GalleryProduct::create($dataGallery);
    }
  }

  /* Product gallery delete */
  public function deleteGallery(Request $request)
  {
    $uploadGallery = "public/upload/gallery/";
    $galleryPhoto = GalleryProduct::where('type', config('admin.product.type'))->find($request->id)->photo;
    $galleryPhoto = isset($galleryPhoto) && !empty($galleryPhoto) ? $galleryPhoto : "";
    if (file_exists($uploadGallery . $galleryPhoto) && !empty($galleryPhoto)) unlink($uploadGallery . $galleryPhoto);
    GalleryProduct::where('type', config('admin.product.type'))->where('id', $request->id)->delete();
    return $this->helper->transfer("Xóa dữ liệu", "success", route('admin.product'));
  }

  /* Product gallery update title */
  public function galleryTitle(Request $request)
  {
    @$id = $request->id;
    @$title = $request->value;
    GalleryProduct::where('type', config('admin.product.type'))->where('id', $id)->update(['title' => $title]);
  }

  /* Product gallery update number */
  public function galleryNumber(Request $request)
  {
    @$id = $request->id;
    @$num = $request->value;
    GalleryProduct::where('type', config('admin.product.type'))->where('id', $id)->update(['num' => $num]);
  }

  /* Product filter category */
  public function filterCategory(Request $request)
  {
    @$id = $request->id;
    @$level = $request->level;
    $row = CategoryProduct::where('type', config('admin.product.type'))->where('id_parent', $id)->where('level', $level)->get();
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
      $row = CategoryProduct::where('type', config('admin.product.type'))->where('level', $level)->get();
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
