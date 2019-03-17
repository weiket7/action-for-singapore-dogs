<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserPermissionTable extends Migration
{
    public function up()
    {
      Schema::create('user_permission', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('user_id');
        $table->tinyInteger('permission_id');
      });
      
      $permission_ids = DB::table('permission')->pluck('permission_id');
      
      foreach($permission_ids as $p) {
        DB::table('user_permission')->insert([
          'user_id'=>1,
          'permission_id'=>$p
        ]);
      }
    }

    public function down()
    {
      Schema::dropIfExists('user_permission');
    }
}
