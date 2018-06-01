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
      $table->string('name', 50);
      $table->string('email', 50);
      $table->string('mobile', 20);
      $table->string('address', 100);
      $table->string('desc', 250)->nullable();
    });
    
    DB::table('rescuer')->insert([
      'name'=>'Jovial',
      'email'=>'jovial@gmail.com',
      'mobile'=>'9123 4567',
      'address'=>'#01-123, Blk 123, Toa Payoh Ave 2'
    ]);
  
    DB::table('rescuer')->insert([
      'name'=>'Stephanie',
      'email'=>'stephanie@gmail.com',
      'mobile'=>'9876 5421',
      'address'=>'#10-232, Blk 259, Ang Mo Kio Ave 3'
    ]);
  }
  
  public function down()
  {
    Schema::dropIfExists('rescuer');
  }
}
