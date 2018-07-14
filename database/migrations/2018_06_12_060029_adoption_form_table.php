<?php

use App\Models\Enums\AdoptionFormStat;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdoptionFormTable extends Migration
{
  public function up()
  {
    Schema::create('adoption_form', function (Blueprint $table) {
      $table->increments('adoption_form_id');
      $table->char('stat', 1);
      $table->string('name', 50);
      $table->string('email', 50);
      $table->string('mobile', 20);
      $table->string('address', 50);
      $table->dateTime('birthday');
      $table->char('gender', 1);
      $table->string('postal', 10);
      $table->char('application_token', 16);
      $table->char('agreement_token', 16)->nullable();
      $table->integer('adopt_id')->nullable();
      $table->dateTime('adopted_on')->nullable();
      $table->string('remark1', 500)->nullable();
      $table->string('remark2', 500)->nullable();
      $table->string('remark3', 500)->nullable();
      $table->dateTime('enquired_on');
      $table->dateTime('applied_on')->nullable();
      $table->dateTime('approved_on')->nullable();
      $table->string('approved_by', 30)->nullable();
      $table->dateTime('agreed_on')->nullable();
    });
    
    DB::table('adoption_form')->insert([
      'adoption_form_id'=>1,
      'stat'=>AdoptionFormStat::Enquiry,
      'name'=>'Alan 5',
      'email'=>'aaron@gmail.com',
      'mobile'=>'9555 5555',
      'birthday'=>Carbon::now()->subYear(30),
      'gender'=>'M',
      'address'=>'#01-123, Blk 123, Toa Payoh Ave 2',
      'postal'=>'123456',
      'application_token'=>'zxc',
      'enquired_on'=>Carbon::now()->subDays(3),
    ]);
  
    DB::table('adoption_form')->insert([
      'adoption_form_id'=>2,
      'stat'=>AdoptionFormStat::Application,
      'name'=>'Aaron 6',
      'email'=>'alan@gmail.com',
      'mobile'=>'9666 6666',
      'birthday'=>Carbon::now()->subYear(30),
      'gender'=>'M',
      'address'=>'#10-232, Blk 259, Ang Mo Kio Ave 3',
      'postal'=>'123456',
      'application_token'=>'abc',
      'enquired_on'=>Carbon::now()->subDays(2),
      'applied_on'=>Carbon::now()->subDays(1)
    ]);
  
    DB::table('adoption_form')->insert([
      'adoption_form_id'=>3,
      'stat'=>AdoptionFormStat::Agreement,
      'name'=>'Aaron 6',
      'email'=>'alan@gmail.com',
      'mobile'=>'9666 6666',
      'birthday'=>Carbon::now()->subYear(30),
      'gender'=>'M',
      'address'=>'#10-232, Blk 259, Ang Mo Kio Ave 3',
      'postal'=>'123456',
      'application_token'=>'abc',
      'enquired_on'=>Carbon::now()->subDays(1),
      'applied_on'=>Carbon::now(),
      'agreed_on'=>Carbon::now()
    ]);
  }
  
  public function down()
  {
    Schema::dropIfExists('adoption_form');
  }
}
