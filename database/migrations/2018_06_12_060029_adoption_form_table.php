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
      $table->char('token', 16);
      $table->dateTime('initial_on');
      $table->dateTime('second_on')->nullable();
    });
    
    DB::table('adoption_form')->insert([
      'adoption_form_id'=>1,
      'stat'=>AdoptionFormStat::Approved,
      'name'=>'Alan 5',
      'email'=>'aaron@gmail.com',
      'mobile'=>'9555 5555',
      'birthday'=>Carbon::now()->subYear(30),
      'gender'=>'M',
      'address'=>'#01-123, Blk 123, Toa Payoh Ave 2',
      'postal'=>'123456',
      'token'=>'zxc',
      'initial_on'=>Carbon::now(),
      'second_on'=>Carbon::now()
    ]);
  
    DB::table('adoption_form')->insert([
      'adoption_form_id'=>2,
      'stat'=>AdoptionFormStat::Second,
      'name'=>'Aaron 6',
      'email'=>'alan@gmail.com',
      'mobile'=>'9666 6666',
      'birthday'=>Carbon::now()->subYear(30),
      'gender'=>'M',
      'address'=>'#10-232, Blk 259, Ang Mo Kio Ave 3',
      'postal'=>'123456',
      'token'=>'abc',
      'initial_on'=>Carbon::now()
    ]);
  }
  
  public function down()
  {
    Schema::dropIfExists('adoption_form');
  }
}
