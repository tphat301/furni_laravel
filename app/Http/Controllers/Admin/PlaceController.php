<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Place;
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

  public function city()
  {
  }

  /* Place create */
  public function create()
  {
  }

  /* Place detail */
  public function show()
  {
  }

  public function ward()
  {
  }

  /* Place delete static */
  public function delete()
  {
  }

  /* Place delete multiple */
  public function destroy()
  {
  }

  /* Place save */
  public function save(Request $request)
  {
  }
}
