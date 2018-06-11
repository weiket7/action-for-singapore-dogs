<?php

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
        $table->string('image', 50);
        $table->string('cost', 50)->nullable();
        $table->string('duration', 50)->nullable();
        $table->string('desc', 250)->nullable();
      });
      
      $data = [
        ['name'=>'Basic Obedience Class', 'slug'=>'basic-obedience-class-1', 'location'=>"Bishan Park II", 'date'=>Carbon::now()->addDay(3), 'time'=>'4.30 pm to 6.00pm (1.5hrs)', 'cost'=>"350",
        'duration'=>"6 weeks, every Sunday", 'image'=>"basic-obedience-class.jpg", "stat"=>'A'],
        ['name'=>'Basic Obedience Class', 'slug'=>'basic-obedience-class-2', 'location'=>"Bishan Park II", 'date'=>Carbon::now()->addDay(6), 'time'=>'4.30 pm to 6.00pm (1.5hrs)', 'cost'=>"350",
        'duration'=>"6 weeks, every Sunday", 'image'=>"basic-obedience-class.jpg", "stat"=>'A']
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
