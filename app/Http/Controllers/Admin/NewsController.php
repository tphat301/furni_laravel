<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
  public function __construct()
  {
    $this->middleware('admin.auth');
  }

  /* News list */
  public function index()
  {
    session(['module_active' => 'news_index']);
    return view('admin.news.index');
  }

  /* News create */
  public function create()
  {
    session(['module_active' => 'news_create']);
    return view('admin.news.create');
  }

  /* News show */
  public function show($id)
  {
    return $id;
  }
}
