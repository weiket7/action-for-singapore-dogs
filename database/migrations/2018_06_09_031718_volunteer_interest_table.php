<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VolunteerInterestTable extends Migration
{
  public function up()
  {
    Schema::create('volunteer_interest', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('volunteer_id');
      $table->string('interest', 20);
    });
    
  }
  
  public function down()
  {
    Schema::dropIfExists('volunteer_interest');
  }
}
