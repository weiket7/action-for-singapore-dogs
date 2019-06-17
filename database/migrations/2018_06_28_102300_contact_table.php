<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContactTable extends Migration
{
  public function up()
  {
    Schema::create('contact', function (Blueprint $table) {
      $table->increments('contact_id');
      $table->string('name', 50);
      $table->string('email', 100);
      $table->string('mobile', 50);
      $table->string('subject', 50);
      $table->string('message', 500);
      $table->dateTime('sent_on');
    });
  }

  public function down()
  {
    Schema::dropIfExists('contact');
  }
}
