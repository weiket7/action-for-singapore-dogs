<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FosterTable extends Migration
{
  public function up()
  {
    Schema::create('foster', function (Blueprint $table) {
      $table->increments('foster_id');
      $table->string('name', 50);
      $table->string('email', 50);
      $table->string('mobile', 50);
      $table->string('address', 50);
      $table->string('desc', 250)->nullable();
    });
  }
  
  public function down()
  {
    Schema::dropIfExists('foster');
  }
}
