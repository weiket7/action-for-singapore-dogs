<?php namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller {
  public function all() {
    return User::all();
  }
  
  public function get($user_id) {
    $data['user'] = User::find($user_id);
    return $data;
  }
  
}