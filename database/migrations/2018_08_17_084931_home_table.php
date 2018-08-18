<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HomeTable extends Migration
{
    public function up()
    {
      Schema::create('home', function (Blueprint $table) {
        $table->increments('id');
        $table->string('title', 50);
        $table->string('slug', 50);
        $table->string('meta_desc', 10)->nullable();
        $table->integer('event_id')->nullable();
        $table->char('show', 1);
        $table->text('content');
      });
      
      DB::table('home')->insert([
        'show'=>'F',
        'title'=>'Singapore Specials Run 2018',
        'slug'=>'singapore-specials-run-2018',
        'content'=>'The quadrennial Singapore Specials Run is back! This year’s run will be bigger, better and stronger!

This Run hopes to put runners in the paw buddies’ paws as to their struggles in life, and with your support, to raise hope and funds to help more of these paw buddies. Proceeds will be channelled into helping the many that ASD has rescued and rehomed.

Join us and run with us on 11.11.2018 from 4.00pm onwards at the Bishan-Ang Mo Kio Park and give our paw buddies your support!

'
      ]);
    }

    public function down()
    {
      Schema::dropIfExists('home');
    }
}
