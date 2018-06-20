<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BannerTable extends Migration
{
  public function up()
  {
    Schema::create('banner', function (Blueprint $table) {
      $table->increments('banner_id');
      $table->char('stat', 1);
      $table->integer('position');
      $table->string('image', 50);
      $table->string('url', 100)->nullable();
    });
    
    DB::table('banner')->insert([
      'stat'=>'A',
      'position'=>1,
      'image'=>'banner1.jpg',
    ]);
  
    DB::table('banner')->insert([
      'stat'=>'A',
      'position'=>2,
      'image'=>'banner2.jpg',
    ]);
  
    DB::table('banner')->insert([
      'stat'=>'A',
      'position'=>3,
      'image'=>'banner3.jpg',
    ]);
  
    DB::table('banner')->insert([
      'stat'=>'A',
      'position'=>4,
      'image'=>'banner4.jpg',
    ]);
  }
  
  public function down()
  {
    Schema::dropIfExists('banner');
  }
}
