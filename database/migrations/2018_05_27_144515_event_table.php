<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventTable extends Migration
{
    public function up()
    {
      Schema::create('event', function (Blueprint $table) {
        $table->increments('event_id');
        $table->string('location', 50);
        $table->dateTime('date');
        $table->string('time', 50);
        $table->string('image', 50);
        $table->string('cost', 50)->nullable();
        $table->string('duration', 50)->nullable();
        $table->string('desc', 250)->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('event');
    }
}
