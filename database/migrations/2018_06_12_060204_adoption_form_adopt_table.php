<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdoptionFormAdoptTable extends Migration
{
  public function up()
  {
    Schema::create('adoption_form_adopt', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('adoption_form_id');
      $table->integer('adopt_id');
    });
    
    DB::table('adoption_form_adopt')->insert([
      'adoption_form_id'=>1,
      'adopt_id'=>1,
    ]);
    DB::table('adoption_form_adopt')->insert([
      'adoption_form_id'=>1,
      'adopt_id'=>2,
    ]);
  }
  
  public function down()
  {
    Schema::dropIfExists('adoption_form_adopt');
  }
}
