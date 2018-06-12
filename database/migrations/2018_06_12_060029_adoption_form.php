<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdoptionForm extends Migration
{
  public function up()
  {
    Schema::create('adoption_form', function (Blueprint $table) {
      $table->increments('adoption_form_id');
      $table->string('name', 50);
      $table->string('email', 50);
      $table->string('mobile', 20);
      $table->string('address', 50);
      $table->string('postal', 10);
      $table->dateTime('birthday');
      $table->dateTime('submitted_on');
    });
    
    DB::table('adoption_form')->insert([
      'adoption_form_id'=>1,
      'name'=>'Ralph 1',
      'email'=>'ralph@gmail.com',
      'mobile'=>'9111 111',
      'address'=>'#01-123, Blk 123, Toa Payoh Ave 2',
      'postal'=>'123456',
      'birthday'=>Carbon::now()->subYear(30),
      'submitted_on'=>Carbon::now()
    ]);
  }
  
  public function down()
  {
    Schema::dropIfExists('adoption_form');
  }
}
