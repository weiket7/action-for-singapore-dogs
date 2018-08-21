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
        $table->string('permission', 30);
      });
      
      $arr = ['Dogs', 'People', 'Adopters', 'Rescuers', 'Fosters', 'Volunteers',
        'Donations', 'Banners', 'Events', 'Adoption', 'Questions',
        'Users', 'Pages', 'Adoption Forms'];
      foreach($arr as $a) {
        DB::table('user_permission')->insert([
          'user_id'=>1,
          'permission'=>$a
        ]);
      }
    }

    public function down()
    {
      Schema::dropIfExists('user_permission');
    }
}
