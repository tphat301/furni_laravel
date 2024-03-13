<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function __construct()
  {
    $this->middleware('admin.auth')->only(['dashboard']);
  }

  public function dashboard()
  {
    session(['module_active' => 'dashboard']);
    return view('admin.dashboard.index');
  }
}
