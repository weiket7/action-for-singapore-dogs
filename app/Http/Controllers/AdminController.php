<?php namespace App\Http\Controllers;

use App\Helpers\BackendHelper;
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
  
  public function uploadImage(Request $request)
  {
    $image_name = BackendHelper::uploadImage($request->folder, "abc", $request->upload);
    $data['uploaded'] = 1;
    $data['url'] = url('/') . '/assets/images/'.$request->folder.'/'.$image_name;
    return $data;
  }
}