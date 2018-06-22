<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdopterTable extends Migration
{
  public function up()
  {
    Schema::create('adopter', function (Blueprint $table) {
      $table->increments('adopter_id');
      $table->char('stat', 1);
      $table->integer('adopt_id');
      $table->integer('person_id');
      $table->date('adopted_on');
      $table->boolean('returned');
      $table->date('returned_on')->nullable();
      $table->string('return_reason', 250)->nullable();
    });
    
    DB::table('adopter')->insert([
      'stat'=>'P',
      'adopt_id'=>1,
      'person_id'=>5,
      'adopted_on'=>Carbon::now()->subYear(1),
      'returned'=>1,
      'returned_on'=>Carbon::now()->subYear(1)->subDay(1),
      'return_reason'=>'Moving out of SG'
    ]);
  }
  
  public function down()
  {
    Schema::dropIfExists('adopter');
  }
}
