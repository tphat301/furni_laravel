<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Utils\Helpers;

class NewsletterController extends Controller
{
  protected $type;
  protected $helper;
  public function __construct()
  {
    $this->middleware('admin.auth');
    $this->helper = new Helpers();
  }

  public function index()
  {
  }

  public function create()
  {
  }

  public function show(Request $request)
  {
  }

  public function save(Request $request)
  {
  }

  public function update(Request $request)
  {
  }
}
