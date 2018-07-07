<?php

use App\Models\Enums\EventStat;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventTable extends Migration
{
  public function up()
  {
    Schema::create('event', function (Blueprint $table) {
      $table->increments('event_id');
      $table->char('stat', 1);
      $table->string('name', 50);
      $table->string('slug', 50);
      $table->string('location', 50);
      $table->dateTime('date');
      $table->string('time', 50);
      $table->string('image', 50)->nullable();
      $table->boolean('adoption_drive');
      $table->string('cost', 50)->nullable();
      $table->string('duration', 50)->nullable();
      $table->text('desc')->nullable();
    });
    
    $data = [
      ['name'=>'Adoption Drive', 'slug'=>'adoption-drive-1', 'location'=>"Bishan Park II", 'date'=>Carbon::now()->addDay(15), 'time'=>'4.30 pm to 6.00pm (1.5hrs)',
        'image'=>"adoption-drive.jpg", "stat"=> EventStat::Active, 'adoption_drive'=>1],
      ['name'=>'Basic Obedience Class', 'slug'=>'basic-obedience-class-1', 'location'=>"Bishan Park II", 'date'=>Carbon::now()->addDay(3), 'time'=>'4.30 pm to 6.00pm (1.5hrs)', 'cost'=>"350",
        'duration'=>"6 weeks, every Sunday", "stat"=> EventStat::Active, 'adoption_drive'=>0,
        'desc'=>'Our Basic Obedience Foundation Class incorporate the Amichien Bonding (TM) principles which are the foundation of your relationship with your dog. You will also learn effective techniques of communication together with Basic Obedience exercises which will be your tools for communication.'],
      ['name'=>'Basic Obedience Class', 'slug'=>'basic-obedience-class-2', 'location'=>"Bishan Park II", 'date'=>Carbon::now()->addDay(6), 'time'=>'4.30 pm to 6.00pm (1.5hrs)', 'cost'=>"350",
        'duration'=>"6 weeks, every Sunday", "stat"=> EventStat::Active, 'adoption_drive'=>0,
        'desc'=>'Our Basic Obedience Foundation Class incorporate the Amichien Bonding (TM) principles which are the foundation of your relationship with your dog. You will also learn effective techniques of communication together with Basic Obedience exercises which will be your tools for communication.'],
      ];
      
      foreach($data as $d) {
        DB::table('event')->insert($d);
      }
    }
  
  public function down()
  {
    Schema::dropIfExists('event');
  }
}
