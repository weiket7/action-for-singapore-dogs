<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RescuerTable extends Migration
{
  public function up()
  {
    Schema::create('rescuer', function (Blueprint $table) {
      $table->increments('rescuer_id');
      $table->char('stat',  1);
      $table->integer('adopt_id');
      $table->integer('person_id');
      $table->string('remark1', 500)->nullable();
      $table->string('remark2', 500)->nullable();
      $table->string('remark3', 500)->nullable();
    });
    
    DB::table('rescuer')->insert([
      'stat'=>'P',
      'adopt_id'=>1,
      'person_id'=>1,
    ]);
  }
  
  public function down()
  {
    Schema::dropIfExists('rescuer');
  }
}
