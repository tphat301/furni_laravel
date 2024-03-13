<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{

  use AuthenticatesUsers;

  public function __construct()
  {
    $this->middleware('admin.guest')->except('logout');
  }

  protected function guard()
  {
    return Auth::guard('admin');
  }

  public function showLoginForm()
  {
    return view('admin.auth.login');
  }

  protected function redirectTo()
  {
    return route('admin.dashboard');
  }

  protected function loggedOut(Request $request)
  {
    return $request->wantsJson()
      ? new JsonResponse([], 204)
      : redirect('admin/login');
  }
}
