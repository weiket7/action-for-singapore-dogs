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
      
      $this->savePermission($input['permissions']);
    }
  
  
  public function savePermission($permissions) {
    DB::table('user_permission')->where('user_id', $this->id)->delete();
    
    foreach($permissions as $permission) {
      DB::table('user_permission')->insert([
        'user_id'=>$this->id,
        'permission'=>$permission
      ]);
    }
  }
}
