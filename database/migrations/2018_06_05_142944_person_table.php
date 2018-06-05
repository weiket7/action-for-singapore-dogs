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
      'name'=>'Jovial',
      'email'=>'jovial@gmail.com',
      'mobile'=>'9123 4567',
      'address'=>'#01-123, Blk 123, Toa Payoh Ave 2',
      'is_rescuer'=>1,
    ]);
    
    DB::table('person')->insert([
      'name'=>'Stephanie',
      'email'=>'stephanie@gmail.com',
      'mobile'=>'9876 5421',
      'address'=>'#10-232, Blk 259, Ang Mo Kio Ave 3',
      'is_rescuer'=>1,
    ]);
  
    DB::table('person')->insert([
      'name'=>'Misty',
      'email'=>'misty@gmail.com',
      'mobile'=>'9123 4567',
      'address'=>'#01-123, Blk 123, Toa Payoh Ave 2',
      'is_foster'=>1,
    ]);
  
    DB::table('person')->insert([
      'name'=>'Kara',
      'email'=>'kara@gmail.com',
      'mobile'=>'9876 5421',
      'address'=>'#10-232, Blk 259, Ang Mo Kio Ave 3',
      'is_foster'=>1,
    ]);
  }
  
  public function down()
  {
    Schema::dropIfExists('person');
  }
}
