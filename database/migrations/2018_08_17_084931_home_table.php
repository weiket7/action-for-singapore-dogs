<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HomeTable extends Migration
{
    public function up()
    {
      Schema::create('home', function (Blueprint $table) {
        $table->string('title', 50);
        $table->string('slug', 50);
        $table->string('meta_desc', 10)->nullable();
        $table->text('content');
      });
    }

    public function down()
    {
      Schema::dropIfExists('home');
    }
}
