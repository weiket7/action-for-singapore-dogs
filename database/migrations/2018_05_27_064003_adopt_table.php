<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdoptTable extends Migration
{
    public function up()
    {
      Schema::create('adopt', function (Blueprint $table) {
        $table->increments('adopt_id');
        $table->string('name', 50);
        $table->string('slug', 50);
        $table->char('stat', 1);
        $table->char('gender', 1);
        $table->date('birthday');
        $table->string('breed', 50);
        $table->string('colour', 20);
        $table->boolean('microchip')->nullable();
        $table->boolean('vaccinate')->nullable();
        $table->boolean('hdb')->nullable();
        $table->date('microchip_date')->nullable();
        $table->date('vaccinate_date')->nullable();
        $table->string('image', 50);
        $table->string('health', 250)->nullable();
        $table->string('behaviour', 250)->nullable();
        $table->string('posted_by', 30);
        $table->dateTime('posted_on');
        //$table->boolean('has_foster');
        //$table->boolean('can_sponsor');
        $table->string('desc', 250)->nullable();
      });
  
      $adopts = [
        ['stat'=>'A', 'name'=>'Kodomo', 'slug'=>'Kodomo', 'birthday'=>'2006-05-01', 'gender'=>'F', 'hdb'=>'0', 'image'=>'kodomo.jpg'],
        ['stat'=>'A', 'name'=>'Elf', 'slug'=>'Elf', 'birthday'=>'2008-02-01', 'gender'=>'F', 'hdb'=>'0', 'image'=>'elf.jpg'],
        ['stat'=>'A', 'name'=>'Lava', 'slug'=>'Lava', 'birthday'=>'2009-05-01', 'gender'=>'F', 'hdb'=>'0', 'image'=>'lava.jpg'],
        ['stat'=>'A', 'name'=>'Black Bingo', 'slug'=>'Black-Bingo', 'birthday'=>'2007-06-01', 'gender'=>'M', 'hdb'=>'0', 'image'=>'blackbingo.jpg'],
        ['stat'=>'A', 'name'=>'Lucky Strike', 'slug'=>'Lucky-Strike', 'birthday'=>'2008-06-01', 'gender'=>'M', 'hdb'=>'0', 'image'=>'luckystrike.jpg'],
        ['stat'=>'A', 'name'=>'Leo', 'slug'=>'Leo', 'birthday'=>'2009-01-01', 'gender'=>'M', 'hdb'=>'0', 'image'=>'leo-122.jpg'],
        ['stat'=>'A', 'name'=>'Nature', 'slug'=>'Nature', 'birthday'=>'2016-05-01', 'gender'=>'F', 'hdb'=>'0', 'image'=>'nature.jpg'],
        ['stat'=>'A', 'name'=>'Magic', 'slug'=>'Magic', 'birthday'=>'2009-07-01', 'gender'=>'M', 'hdb'=>'1', 'image'=>'magic.jpg'],
        ['stat'=>'A', 'name'=>'Furgie', 'slug'=>'Furgie', 'birthday'=>'2007-10-01', 'gender'=>'F', 'hdb'=>'0', 'image'=>'furgie.jpg'],
        ['stat'=>'A', 'name'=>'Angel', 'slug'=>'Angel', 'birthday'=>'2004-06-01', 'gender'=>'F', 'hdb'=>'0', 'image'=>'angel.jpg'],
        ['stat'=>'A', 'name'=>'Polly', 'slug'=>'Polly', 'birthday'=>'2008-06-01', 'gender'=>'F', 'hdb'=>'0', 'image'=>'polly.jpg'],
        ['stat'=>'A', 'name'=>'Winner', 'slug'=>'Winner', 'birthday'=>'2009-03-01', 'gender'=>'M', 'hdb'=>'0', 'image'=>'winner.jpg']
      ];
      
      $now = Carbon::now();
      foreach($adopts as $adopt) {
        $adopt['breed'] = 'Cross Breed';
        $adopt['colour'] = 'Brown';
        $adopt['posted_by'] = 'admin';
        $adopt['posted_on'] = $now;
        DB::table('adopt')->insert($adopt);
      }
    }

    public function down()
    {
      Schema::dropIfExists('adopt');
    }
}
