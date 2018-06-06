<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FosterTable extends Migration
{
  public function up()
  {
    Schema::create('foster', function (Blueprint $table) {
      $table->increments('foster_id');
      $table->char('stat', 1);
      $table->integer('adopt_id');
      $table->integer('person_id');
      $table->dateTime('start_date');
      $table->dateTime('end_date')->nullable();
    });
    
    DB::table('foster')->insert([
      'stat'=>'P',
      'adopt_id'=>1,
      'person_id'=>3,
      'start_date'=>Carbon::now()->subDays(10),
      'end_date'=>Carbon::now()->subDays(1),
    ]);
  
    DB::table('foster')->insert([
      'stat'=>'C',
      'adopt_id'=>1,
      'person_id'=>4,
      'start_date'=>Carbon::now(),
    ]);
  }
  
  public function down()
  {
    Schema::dropIfExists('foster');
  }
}
