<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function __construct()
  {
    $this->middleware('admin.auth');
  }

  /* Criteria index */
  public function criteriaIndex()
  {
    session(['module_active' => 'criteria_index']);
    return view('admin.post.criteria_index');
  }

  /* Criteria create */
  public function criteriaCreate()
  {
    session(['module_active' => 'criteria_create']);
    return view('admin.post.criteria_create');
  }

  /* Policy index */
  public function policyIndex()
  {
    session(['module_active' => 'policy_index']);
    return view('admin.post.policy_index');
  }

  /* Policy create */
  public function policyCreate()
  {
    session(['module_active' => 'policy_create']);
    return view('admin.post.policy_create');
  }
}
