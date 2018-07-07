<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PageTable extends Migration
{
    public function up()
    {
      Schema::create('page', function (Blueprint $table) {
        $table->increments('page_id');
        $table->string('name', 50);
        $table->text('content');
      });
      
      DB::table('page')->insert([
        'name'=>'Why Adopt A Dog',
        'content'=>'1
        2
        3'
      ]);
    }

    public function down()
    {
      Schema::dropIfExists('page');
    }
}
