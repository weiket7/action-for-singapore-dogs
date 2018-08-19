<?php

use App\Models\Enums\EventStat;
use App\Models\Enums\EventType;
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
      $table->char('type', 1);
      $table->string('name', 50);
      $table->string('slug', 100);
      $table->string('meta_desc', 100)->nullable();
      $table->string('location', 100);
      $table->dateTime('date');
      $table->string('time', 50);
      $table->string('image', 50)->nullable();
      $table->string('cost', 50)->nullable();
      $table->string('duration', 50)->nullable();
      $table->text('short_desc')->nullable();
      $table->text('desc')->nullable();
    });
    
    $data = [
      ['event_id'=>1, 'name'=>'Basic Obedience Class', 'slug'=>'basic-obedience-class-2', 'location'=>"Bishan Park II", 'date'=>Carbon::now()->subDay(3), 'time'=>'4.30 pm to 6.00pm (1.5hrs)', 'cost'=>"350",
        'duration'=>"6 weeks, every Sunday", "stat"=> EventStat::Active, 'type'=>EventType::BasicObedienceClass,
        'desc'=>'Our Basic Obedience Foundation Class incorporate the Amichien Bonding (TM) principles which are the foundation of your relationship with your dog. You will also learn effective techniques of communication together with Basic Obedience exercises which will be your tools for communication.'],
      ['event_id'=>2, 'name'=>'Basic Obedience Class', 'slug'=>'basic-obedience-class-1', 'location'=>"Bishan Park II", 'date'=>Carbon::now()->addDay(3), 'time'=>'4.30 pm to 6.00pm (1.5hrs)', 'cost'=>"350",
        'duration'=>"6 weeks, every Sunday", "stat"=> EventStat::Active, 'type'=>EventType::BasicObedienceClass,
        'desc'=>'Our Basic Obedience Foundation Class incorporate the Amichien Bonding (TM) principles which are the foundation of your relationship with your dog. You will also learn effective techniques of communication together with Basic Obedience exercises which will be your tools for communication.'],
      ['event_id'=>3, 'name'=>'Basic Obedience Class', 'slug'=>'basic-obedience-class-2', 'location'=>"Bishan Park II", 'date'=>Carbon::now()->addDay(6), 'time'=>'4.30 pm to 6.00pm (1.5hrs)', 'cost'=>"350",
        'duration'=>"6 weeks, every Sunday", "stat"=> EventStat::Active, 'type'=>EventType::BasicObedienceClass,
        'desc'=>'Our Basic Obedience Foundation Class incorporate the Amichien Bonding (TM) principles which are the foundation of your relationship with your dog. You will also learn effective techniques of communication together with Basic Obedience exercises which will be your tools for communication.'],
      ['event_id'=>4, 'name'=>'ASD A-Dog-Tion Drive', 'slug'=>'asd-a-dog-tion-drive-03-sep-2018 ', 'location'=>"Fountain Plaza, Quayside Isle@Sentosa Cove on 1 July", 'date'=>Carbon::now()->addDay(15), 'time'=>'12pm-4pm',
        'image'=>"adoption-drive.jpg", "stat"=> EventStat::Active, 'type'=>EventType::AdoptionDrive,
        'desc'=>'Bring out your shades and your sunscreen and head on down to Sentosa on 1 July for our next adoption drive where you will meet a variety of puppies and HDB-approved local cross breed adults!
Our team of Adoption Counsellors will be there to assist you in finding the right companion for your family and there will also be a range of merchandise – including limited edition Singapore Heritage EZ link cards – on sale.'],
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
