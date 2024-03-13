<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function __construct()
  {
    $this->middleware('admin.auth');
  }

  /* Product list */
  public function index()
  {
    session(['module_active' => 'product_index']);
    return view('admin.product.index');
  }

  /* Product create */
  public function create()
  {
    session(['module_active' => 'product_create']);
    return view('admin.product.create');
  }
}
