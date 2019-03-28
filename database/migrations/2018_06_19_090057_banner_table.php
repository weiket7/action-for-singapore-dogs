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
      $table->string('image', 100);
      $table->string('link_to', 10);
      $table->integer('event_id')->nullable();
      $table->integer('blog_id')->nullable();
    });
  
    DB::table('banner')->insert([
      'name'=>'Our Singapore Heritage FlashPay Cards',
      'stat'=>'A',
      'position'=>1,
      'image'=>'ez-link-heritage-series.jpg',
      'link_to'=>'Blog',
      'blog_id'=>1,
    ]);
    
    DB::table('banner')->insert([
      'name'=>'Our Singapore Heritage FlashPay Cards',
      'stat'=>'A',
      'position'=>2,
      'image'=>'asd_19calad.jpg',
      'link_to'=>'Blog',
      'blog_id'=>1,
    ]);
  
    DB::table('banner')->insert([
      'name'=>'Our Singapore Heritage FlashPay Cards',
      'stat'=>'A',
      'position'=>3,
      'image'=>'asd-project-adore.jpg',
      'link_to'=>'Blog',
      'blog_id'=>1,
    ]);
  
    DB::table('banner')->insert([
      'name'=>'Our Singapore Heritage FlashPay Cards',
      'stat'=>'A',
      'position'=>4,
      'image'=>'asd-adopt-a-dog.jpg',
      'link_to'=>'Blog',
      'blog_id'=>1,
    ]);
  
    DB::table('banner')->insert([
      'name'=>'Our Singapore Heritage FlashPay Cards',
      'stat'=>'A',
      'position'=>5,
      'image'=>'asd-sponsorship.jpg',
      'link_to'=>'Blog',
      'blog_id'=>1,
    ]);
  
    DB::table('banner')->insert([
      'name'=>'Our Singapore Heritage FlashPay Cards',
      'stat'=>'A',
      'position'=>6,
      'image'=>'asd-dog-listener-academy.jpg',
      'link_to'=>'Blog',
      'blog_id'=>1,
    ]);
  
    DB::table('banner')->insert([
      'name'=>'Our Singapore Heritage FlashPay Cards',
      'stat'=>'A',
      'position'=>7,
      'image'=>'asd-volunteer.jpg',
      'link_to'=>'Blog',
      'blog_id'=>1,
    ]);
  }
  
  public function down()
  {
    Schema::dropIfExists('banner');
  }
}
