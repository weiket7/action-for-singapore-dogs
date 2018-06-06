<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PersonTable extends Migration
{
  public function up()
  {
    Schema::create('person', function (Blueprint $table) {
      $table->increments('person_id');
      $table->string('name', 50);
      $table->string('email', 50);
      $table->string('mobile', 20);
      $table->string('address', 100);
      $table->boolean('is_rescuer')->nullable();
      $table->boolean('is_adopter')->nullable();
      $table->boolean('is_foster')->nullable();
      $table->boolean('is_sponsor')->nullable();
      $table->boolean('is_volunteer')->nullable();
      $table->string('desc', 250)->nullable();
    });
    
    DB::table('person')->insert([
      'name'=>'Ralph 1',
      'email'=>'ralph@gmail.com',
      'mobile'=>'9111 111',
      'address'=>'#01-123, Blk 123, Toa Payoh Ave 2',
      'is_rescuer'=>1,
    ]);
    
    DB::table('person')->insert([
      'name'=>'Ray 2',
      'email'=>'ray@gmail.com',
      'mobile'=>'9222 2222',
      'address'=>'#10-232, Blk 259, Ang Mo Kio Ave 3',
      'is_rescuer'=>1,
    ]);
  
    DB::table('person')->insert([
      'name'=>'Fable 3',
      'email'=>'fable@gmail.com',
      'mobile'=>'9333 3333',
      'address'=>'#01-123, Blk 123, Toa Payoh Ave 2',
      'is_foster'=>1,
    ]);
  
    DB::table('person')->insert([
      'name'=>'Fabia 4',
      'email'=>'fabia@gmail.com',
      'mobile'=>'9444 4444',
      'address'=>'#10-232, Blk 259, Ang Mo Kio Ave 3',
      'is_foster'=>1,
    ]);
  
    DB::table('person')->insert([
      'name'=>'Alan 5',
      'email'=>'aaron@gmail.com',
      'mobile'=>'9555 5555',
      'address'=>'#01-123, Blk 123, Toa Payoh Ave 2',
      'is_adopter'=>1,
    ]);
  
    DB::table('person')->insert([
      'name'=>'Aaron 6',
      'email'=>'alan@gmail.com',
      'mobile'=>'9666 6666',
      'address'=>'#10-232, Blk 259, Ang Mo Kio Ave 3',
      'is_adopter'=>1,
    ]);
  }
  
  public function down()
  {
    Schema::dropIfExists('person');
  }
}
