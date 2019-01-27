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
      $table->string('name', 50);
      $table->char('stat', 1);
      $table->integer('position');
      $table->string('image', 50);
      $table->string('link_to', 10);
      $table->integer('event_id')->nullable();
      $table->string('page_slug', 100)->nullable();
    });
    
    DB::table('banner')->insert([
      'name'=>'name1',
      'stat'=>'A',
      'position'=>1,
      'image'=>'banner1.jpg',
      'link_to'=>'Event',
      'event_id'=>4,
    ]);
  
    /*DB::table('banner')->insert([
      'name'=>'name2',
      'stat'=>'A',
      'position'=>2,
      'image'=>'banner2.jpg',
    ]);
  
    DB::table('banner')->insert([
      'name'=>'name3',
      'stat'=>'A',
      'position'=>3,
      'image'=>'banner3.jpg',
    ]);
  
    DB::table('banner')->insert([
      'name'=>'name4',
      'stat'=>'A',
      'position'=>4,
      'image'=>'banner4.jpg',
    ]);*/
  }
  
  public function down()
  {
    Schema::dropIfExists('banner');
  }
}
