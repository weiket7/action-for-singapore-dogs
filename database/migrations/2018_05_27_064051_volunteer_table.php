<?php

use App\Models\Enums\VolunteerStat;
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
      $table->string('email', 50);
      $table->string('mobile', 20);
      $table->string('address', 100);
      $table->string('desc', 250)->nullable();
    });
  
    DB::table('volunteer')->insert([
      'stat'=>VolunteerStat::Potential,
      'name'=>'Vivien',
      'email'=>'vivien@gmail.com',
      'mobile'=>'9123 6666',
      'address'=>'#01-123, Blk 123, Toa Payoh Ave 2',
    ]);
  
    DB::table('volunteer')->insert([
      'stat'=>VolunteerStat::Active,
      'name'=>'Valora',
      'email'=>'valora@gmail.com',
      'mobile'=>'9876 6666',
      'address'=>'#10-232, Blk 259, Ang Mo Kio Ave 3',
    ]);
  }
  
  public function down()
  {
    Schema::dropIfExists('volunteer');
  }
}
