<?php

use App\Models\Enums\PersonStat;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PersonTable extends Migration
{
  public function up()
  {
    Schema::create('person', function (Blueprint $table) {
      $table->increments('person_id');
      $table->char('stat', 1);
      $table->string('name', 50);
      $table->string('email', 50);
      $table->string('mobile', 20);
      $table->dateTime('birthday');
      $table->char('gender', 1);
      $table->string('address', 100);
      $table->string('postal', 10);
      $table->boolean('is_rescuer')->default(0);
      $table->boolean('is_adopter')->default(0);
      $table->boolean('is_foster')->default(0);
      $table->boolean('is_sponsor')->default(0);
      $table->boolean('is_volunteer')->default(0);
      $table->integer('adoption_form_id')->nullable();
      $table->string('desc', 250)->nullable();
    });
    
    DB::table('person')->insert([
      'stat'=>PersonStat::Active,
      'name'=>'Ralph 1',
      'email'=>'ralph@gmail.com',
      'mobile'=>'9111 111',
      'address'=>'#01-123, Blk 123, Toa Payoh Ave 2',
      'postal'=>'123456',
      'birthday'=>Carbon::now()->subYear(30),
      'gender'=>'M',
      'is_rescuer'=>1,
    ]);
    
    DB::table('person')->insert([
      'stat'=>PersonStat::Active,
      'name'=>'Ray 2',
      'email'=>'ray@gmail.com',
      'mobile'=>'9222 2222',
      'address'=>'#10-232, Blk 259, Ang Mo Kio Ave 3',
      'postal'=>'123456',
      'birthday'=>Carbon::now()->subYear(30),
      'gender'=>'M',
      'is_rescuer'=>1,
    ]);
  
    DB::table('person')->insert([
      'stat'=>PersonStat::Active,
      'name'=>'Fable 3',
      'email'=>'fable@gmail.com',
      'mobile'=>'9333 3333',
      'address'=>'#01-123, Blk 123, Toa Payoh Ave 2',
      'postal'=>'123456',
      'birthday'=>Carbon::now()->subYear(30),
      'gender'=>'M',
      'is_foster'=>1,
    ]);
  
    DB::table('person')->insert([
      'stat'=>PersonStat::Active,
      'name'=>'Fabia 4',
      'email'=>'fabia@gmail.com',
      'mobile'=>'9444 4444',
      'address'=>'#10-232, Blk 259, Ang Mo Kio Ave 3',
      'postal'=>'123456',
      'birthday'=>Carbon::now()->subYear(30),
      'gender'=>'M',
      'is_foster'=>1,
    ]);
  
    DB::table('person')->insert([
      'stat'=>PersonStat::Active,
      'name'=>'Alan 5',
      'email'=>'aaron@gmail.com',
      'mobile'=>'9555 5555',
      'address'=>'#01-123, Blk 123, Toa Payoh Ave 2',
      'postal'=>'123456',
      'birthday'=>Carbon::now()->subYear(30),
      'gender'=>'M',
      'is_adopter'=>1,
      'adoption_form_id'=>1
    ]);
  }
  
  public function down()
  {
    Schema::dropIfExists('person');
  }
}
