<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GiftShopTable extends Migration
{
  public function up()
  {
    Schema::create('gift_shop', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name', 50);
      $table->string('image', 50);
      $table->integer('quantity');
    });
  }
  
  public function down()
  {
    Schema::dropIfExists('gift_shop');
  }
}
