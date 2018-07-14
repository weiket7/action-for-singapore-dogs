<?php namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller {
  public function save(UserRequest $request, $user_id = null) {
    $user = $user_id == null ? new User() : User::find($request->user_id);
    return $user->saveUser($request->all());
  }
  
  public function all() {
    return User::all();
  }
  
  public function get($user_id) {
    $data['user'] = User::find($user_id);
    $data['permissions'] = DB::table('user_permission')->where('user_id', $user_id)->pluck('permission');
    return $data;
  }
  
  public function delete($user_id) {
    User::where('id', $user_id)->delete();
    DB::table('user_permission')->where('user_id', $user_id)->delete();
  }
  
}