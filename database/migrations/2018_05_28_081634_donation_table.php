<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DonationTable extends Migration
{
    public function up()
    {
      Schema::create('donation', function (Blueprint $table) {
        $table->increments('donation_id');
        $table->string('name', 50);
        $table->string('email', 50);
        $table->string('mobile', 50);
        $table->string('amount', 50);
        $table->string('payment_method', 50);
        $table->string('ref_no', 50);
      });
    }

    public function down()
    {
      Schema::dropIfExists('donation');
    }
}
