<?php

use App\Models\Enums\DonationStat;
use App\Models\Enums\PaymentMethod;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DonationTable extends Migration
{
    public function up()
    {
      Schema::create('donation', function (Blueprint $table) {
        $table->increments('donation_id');
        $table->char('stat', 1);
        $table->string('name', 50);
        $table->string('email', 50);
        $table->string('mobile', 50);
        $table->string('amount', 50);
        $table->string('payment_method', 50);
        $table->string('ref_no', 50)->nullable();
        $table->dateTime('donated_on');
      });
      
      DB::table('donation')->insert([
        'stat'=>DonationStat::Pending,
        'name'=>'David',
        'email'=>'david@gmail.com',
        'mobile'=>'9123 4567',
        'amount'=>10,
        'payment_method'=>PaymentMethod::BankTransfer,
        'ref_no'=>123,
        'donated_on'=>Carbon::now()
      ]);
      DB::table('donation')->insert([
        'stat'=>DonationStat::Received,
        'name'=>'Dakota',
        'email'=>'dakota@gmail.com',
        'mobile'=>'9123 4567',
        'amount'=>1200,
        'payment_method'=>PaymentMethod::PayNow,
        'ref_no'=>456,
        'donated_on'=>Carbon::now()
      ]);
    }

    public function down()
    {
      Schema::dropIfExists('donation');
    }
}
