<?php

use App\Models\Enums\VolunteerStat;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VolunteerTable extends Migration
{
  public function up()
  {
    Schema::create('volunteer', function (Blueprint $table) {
      $table->increments('volunteer_id');
      $table->char('stat', 1);
      $table->string('name', 50);
      $table->string('email', 100);
      $table->string('mobile', 20);
      $table->dateTime('birthday');
      $table->char('gender', 1);
      $table->string('occupation', 50);
      $table->string('availability', 100);
      $table->string('vehicle', 50)->nullable();
      $table->string('preferred_dog_size', 50)->nullable();
      $table->string('current_no_of_dogs', 50)->nullable();
      $table->string('publicity_area', 50)->nullable();
      $table->dateTime('created_on');
      $table->string('desc', 250)->nullable();
    });
  
    DB::table('volunteer')->insert([
      'stat'=>VolunteerStat::Potential,
      'name'=>'Vivien',
      'email'=>'vivien@gmail.com',
      'mobile'=>'9123 6666',
      'gender'=>'F',
      'availability'=>'',
      'occupation'=>'',
      'birthday'=>Carbon::now()->subYear(18),
      'created_on'=>Carbon::now(),
    ]);
  
    DB::table('volunteer')->insert([
      'stat'=>VolunteerStat::Active,
      'name'=>'Valora',
      'email'=>'valora@gmail.com',
      'mobile'=>'9876 6666',
      'gender'=>'F',
      'availability'=>'',
      'occupation'=>'',
      'birthday'=>Carbon::now()->subYear(30),
      'created_on'=>Carbon::now(),
    ]);
  }
  
  public function down()
  {
    Schema::dropIfExists('volunteer');
  }
}
