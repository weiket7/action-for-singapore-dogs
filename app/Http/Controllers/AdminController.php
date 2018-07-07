<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller {
  public function backend() {
    if (!Auth::check()) {
      return redirect('login');
    }
    return view("admin");
  }
  
  public function login(Request $request) {
    if ($request->isMethod("post")) {
      if (!Auth::attempt(['username'=>$request->username, 'password'=>$request->password])) {
        return view("login", ['error'=>true]);
      } else {
        return redirect("backend");
      }
    }
    return view("login");
  }
  
  public function logout() {
    Auth::logout();
  }
}