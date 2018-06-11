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
      $table->string('interest', 30);
    });
    
    DB::table('volunteer_interest')->insert([
      'volunteer_id'=>1,
      'interest'=>'Rescuing',
    ]);
    DB::table('volunteer_interest')->insert([
      'volunteer_id'=>1,
      'interest'=>'Rehoming',
    ]);
    
    DB::table('volunteer_interest')->insert([
      'volunteer_id'=>2,
      'interest'=>'Publicity',
    ]);
    DB::table('volunteer_interest')->insert([
      'volunteer_id'=>2,
      'interest'=>'Fund Raising & Events',
    ]);
  
  }
  
  public function down()
  {
    Schema::dropIfExists('volunteer_interest');
  }
}
