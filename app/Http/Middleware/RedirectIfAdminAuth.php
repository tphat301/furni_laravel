<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAdminAuth
{
  public function handle(Request $request, Closure $next, $guard = 'admin')
  {
    if (Auth::guard($guard)->check()) {
      return redirect()->route('admin.dashboard');
    }
    return $next($request);
  }
}
