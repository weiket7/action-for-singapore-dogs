<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BoardingTable extends Migration
{
    public function up()
    {
      Schema::create('boarding', function (Blueprint $table) {
        $table->increments('boarding_id');
        $table->string('name', 50);
        $table->string('email', 50);
        $table->string('mobile', 20);
        $table->date('start_date');
        $table->date('end_date');
        $table->string('breed', 50);
        $table->char('gender', 1);
        $table->char('sterilised', 1);
        $table->dateTime('created_on');
      });
    }

    public function down()
    {
      Schema::dropIfExists('boarding');
    }
}
