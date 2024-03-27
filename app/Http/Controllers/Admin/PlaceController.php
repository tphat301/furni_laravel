<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\City;
use App\Models\Admin\District;
use App\Models\Admin\Place;
use App\Models\Admin\Ward;
use App\Utils\Helpers;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
  protected $helper;
  protected $type;
  protected $numberPerPage;
  public function __construct()
  {
    $this->middleware('admin.auth');
    $this->helper = new Helpers();
  }

  /* Handle check request type namespace */
  public function checkRequestType($req)
  {
    if ($req == 'city') {
      $namespace = 'App\Models\Admin\City';
    } elseif ($req == 'district') {
      $namespace = 'App\Models\Admin\District';
    } else {
      $namespace = 'App\Models\Admin\Ward';
    }
    return $namespace;
  }

  /* Place index */
  public function index(Request $request)
  {
    $type = $request->type;
    session(['module_active' => $type . '_index']);
    $numberPerPage = config("admin.place." . $type . ".number_per_page");
    $namespace = $this->checkRequestType($request->type);
    if ($request->input('keyword')) {
      $rows = $namespace::where('name_' . $type, "LIKE", "%{$request->input('keyword')}%")->where('type_' . $type, $type)->orderBy('num', 'ASC')->orderBy('id_' . $type, 'ASC')->paginate($numberPerPage);
    } else {
      $rows = $namespace::where('type_' . $type, $type)->orderBy('num', 'ASC')->orderBy('id_' . $type, 'ASC')->paginate($numberPerPage);
    }
    return view('admin.place.index', compact('rows', 'type'));
  }

  /* City create */
  public function cityCreate()
  {
    session(['module_active' => 'city_create']);
  }

  /* District create */
  public function districtCreate()
  {
    session(['module_active' => 'district_create']);
  }

  /* Place create */
  public function create(Request $request)
  {
    session(['module_active' => 'ward_create']);
    $type = $request->type;
  }

  /* Place update number */
  public function updateNumber(Request $request)
  {
    $namespace = $this->checkRequestType($request->type);
    $namespace::where('id_' . $request->type, $request->id)->where('type_' . $request->type, $request->type)->update(['num' => $request->value]);
  }

  /* Place delete static */
  public function delete(Request $request)
  {
    $namespace = $this->checkRequestType($request->type);
    $direct = "admin.place." . $request->type . ".index";
    $row = $namespace::where('type_' . $request->type, $request->type)->find($request->id);
    $row->delete();
    return $this->helper->transfer("Xóa dữ liệu", "success", route($direct, ['type' => $request->type]));
  }

  /* Place delete multiple */
  public function destroy(Request $request)
  {
    $namespace = $this->checkRequestType($request->type);
    $direct = "admin.place." . $request->type . ".index";
    $namespace::destroy($request->checkitem);
    return $this->helper->transfer("Xóa dữ liệu", "success", route($direct, ['type' => $request->type]));
  }

  /* Place save */
  public function save(Request $request)
  {
  }
}
