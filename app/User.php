<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
  use Notifiable;
  
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'email', 'password',
  ];
  
  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];
  
  public function saveUser($input) {
    $this->username = $input['username'];
    if (isset($input['password'])) {
      $this->password = Hash::make($input['password']);
    }
    $this->save();
    
    $this->savePermission($input['user_permissions']);
    return $this->id;
  }
  
  public function getPermissions($user_id) {
    return DB::table('user_permission as up')->join('permission as p', 'up.permission_id', '=', 'p.permission_id')
      ->where('user_id', $user_id)->orderBy('p.permission_id')->select('p.name', 'link', 'icon')->get();
  }
  
  public function savePermission($user_permissions) {
    DB::table('user_permission')->where('user_id', $this->id)->delete();
    
    foreach($user_permissions as $permission_id) {
      DB::table('user_permission')->insert([
        'user_id'=>$this->id,
        'permission_id'=>$permission_id
      ]);
    }
  }
}
