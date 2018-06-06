<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RescueTable extends Migration
{
  public function up()
  {
    Schema::create('rescue', function (Blueprint $table) {
      $table->increments('rescue_id');
      $table->char('stat', 1);
      $table->integer('adopt_id');
      $table->integer('person_id');
    });
    
    DB::table('rescue')->insert([
      'stat'=>'P',
      'adopt_id'=>1,
      'person_id'=>1,
    ]);
  }
  
  public function down()
  {
    Schema::dropIfExists('rescue');
  }
}
