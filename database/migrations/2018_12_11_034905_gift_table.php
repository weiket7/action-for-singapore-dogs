<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GiftTable extends Migration
{
  public function up()
  {
    Schema::create('gift', function (Blueprint $table) {
      $table->increments('gift_id');
      $table->string('name', 100);
      $table->string('image', 150);
      $table->decimal('price', 9, 2);
      $table->integer('quantity');
      $table->integer('position');
    });
  
    DB::table('gift')->insert([
      'name'=>'10th Anniversary Coffee Table Book',
      'image'=>'10thAnnBookCover.jpg',
      'price'=>10,
      'quantity'=>10,
      'position'=>1,
    ]);
    DB::table('gift')->insert([
      'name'=>'Trolley Coin Keychains',
      'image'=>'ASD-Trolley-Coin-Keychains.jpg',
      'price'=>10,
      'quantity'=>20,
      'position'=>2,
    ]);
    DB::table('gift')->insert([
      'name'=>'T Shirt (TS1)',
      'image'=>'ASD-T-Shirt-TS1.jpg',
      'price'=>10,
      'quantity'=>30,
      'position'=>3,
    ]);
    
  }
  
  public function down()
  {
    Schema::dropIfExists('gift');
  }
}
