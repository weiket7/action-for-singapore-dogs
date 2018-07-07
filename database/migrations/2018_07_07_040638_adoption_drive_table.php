<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdoptionDriveTable extends Migration
{
  public function up()
  {
    Schema::create('adoption_drive', function (Blueprint $table) {
      $table->integer('event_id');
      $table->integer('adopt_id');
    });
    
    DB::table('adoption_drive')->insert([
      'event_id'=>4,
      'adopt_id'=>3,
    ]);
    DB::table('adoption_drive')->insert([
      'event_id'=>4,
      'adopt_id'=>6,
    ]);
    DB::table('adoption_drive')->insert([
      'event_id'=>4,
      'adopt_id'=>9,
    ]);
  }
  
  public function down()
  {
    Schema::dropIfExists('adoption_drive');
  }
}
