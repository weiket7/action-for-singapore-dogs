<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SettingTable extends Migration
{
  public function up()
  {
    Schema::create('setting', function (Blueprint $table) {
      $table->increments('setting_id');
      $table->string('key', 50);
      $table->string('value', 500);
    });
  
    DB::table('setting')->insert([
      'key'=>'main_email',
      'value'=>'info@asdsingapore.com',
    ]);
    DB::table('setting')->insert([
      'key'=>'adoption_form_recipients',
      'value'=>'info@asdsingapore.com,cooper.myhre@gmail.com',
    ]);
    DB::table('setting')->insert([
      'key'=>'volunteer_form_arc_recipients',
      'value'=>'dancingjoeyz@gmail.com',
    ]);
  }
  
  public function down()
  {
    Schema::dropIfExists('setting');
  }
}
