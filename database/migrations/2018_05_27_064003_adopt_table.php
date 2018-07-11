<?php

use App\Models\Enums\AdoptStat;
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
        $table->char('stat', 1);
        $table->string('name', 50);
        $table->string('slug', 50);
        $table->char('gender', 1);
        $table->date('birthday');
        $table->string('breed', 50);
        $table->string('colour', 20);
        $table->boolean('microchip');
        $table->boolean('vaccinate');
        $table->boolean('sterilise');
        $table->boolean('hdb');
        $table->string('microchip_no',40)->nullable();
        $table->date('microchip_date')->nullable();
        $table->date('vaccinate_date1')->nullable();
        $table->date('vaccinate_date2')->nullable();
        $table->date('vaccinate_date3')->nullable();
        $table->date('sterilise_date')->nullable();
        $table->string('vet',40)->nullable();
        $table->string('location', 30)->nullable();
        $table->string('image', 50);
        $table->string('health', 250)->nullable();
        $table->string('behaviour', 250)->nullable();
        $table->dateTime('rescued_on')->nullable();
        $table->string('posted_by', 30);
        $table->dateTime('posted_on');
        //$table->boolean('has_foster');
        //$table->boolean('can_sponsor');
        $table->string('desc', 250)->nullable();
      });
  
      $adopts = [
        ['stat'=>AdoptStat::Available, 'name'=>'Kodomo', 'slug'=>'Kodomo', 'rescued_on'=>'2006-05-01', 'birthday'=>'2006-05-01', 'gender'=>'F', 'microchip'=>1, 'vaccinate'=>1, 'hdb'=>0, 'sterilise'=>1,
          'location'=>'ARC', 'image'=>'kodomo.jpg'],
        ['stat'=>AdoptStat::Available, 'name'=>'Elf', 'slug'=>'Elf', 'rescued_on'=>'2008-02-01', 'birthday'=>'2008-02-01', 'gender'=>'F', 'microchip'=>1, 'vaccinate'=>1, 'hdb'=>0, 'sterilise'=>1,
          'location'=>'ARC', 'image'=>'elf.jpg'],
        ['stat'=>AdoptStat::Available, 'name'=>'Lava', 'slug'=>'Lava', 'rescued_on'=>'2009-05-01', 'birthday'=>'2009-05-01', 'gender'=>'F', 'microchip'=>1, 'vaccinate'=>1, 'hdb'=>0, 'sterilise'=>1,
          'location'=>'ARC', 'image'=>'lava.jpg'],
        ['stat'=>AdoptStat::Available, 'name'=>'Black Bingo', 'slug'=>'Black-Bingo', 'rescued_on'=>'2007-06-01', 'birthday'=>'2007-06-01', 'gender'=>'M', 'microchip'=>1, 'vaccinate'=>1, 'hdb'=>0, 'sterilise'=>1,
          'location'=>'ARC', 'image'=>'blackbingo.jpg'],
        ['stat'=>AdoptStat::Available, 'name'=>'Lucky Strike', 'slug'=>'Lucky-Strike', 'rescued_on'=>'2008-06-01', 'birthday'=>'2008-06-01', 'gender'=>'M', 'microchip'=>1, 'vaccinate'=>1, 'hdb'=>0, 'sterilise'=>1,
          'location'=>'ARC', 'image'=>'luckystrike.jpg'],
        ['stat'=>AdoptStat::Available, 'name'=>'Leo', 'slug'=>'Leo', 'rescued_on'=>'2009-01-01', 'birthday'=>'2009-01-01', 'gender'=>'M', 'microchip'=>1, 'vaccinate'=>1, 'hdb'=>0, 'sterilise'=>1,
          'location'=>'ARC', 'image'=>'leo-122.jpg'],
        ['stat'=>AdoptStat::Available, 'name'=>'Nature', 'slug'=>'Nature', 'rescued_on'=>'2016-05-01', 'birthday'=>'2016-05-01', 'gender'=>'F', 'microchip'=>1, 'vaccinate'=>1, 'hdb'=>0, 'sterilise'=>1,
          'location'=>'ARC', 'image'=>'nature.jpg'],
        ['stat'=>AdoptStat::Available, 'name'=>'Magic', 'slug'=>'Magic', 'rescued_on'=>'2009-07-01', 'birthday'=>'2009-07-01', 'gender'=>'M', 'microchip'=>1, 'vaccinate'=>1, 'hdb'=>1, 'sterilise'=>1,
          'location'=>'ARC', 'image'=>'magic.jpg'],
        ['stat'=>AdoptStat::Available, 'name'=>'Furgie', 'slug'=>'Furgie', 'rescued_on'=>'2007-10-01', 'birthday'=>'2007-10-01', 'gender'=>'F', 'microchip'=>1, 'vaccinate'=>1, 'hdb'=>0, 'sterilise'=>1,
          'location'=>'ARC', 'image'=>'furgie.jpg'],
        ['stat'=>AdoptStat::Available, 'name'=>'Angel', 'slug'=>'Angel', 'rescued_on'=>'2004-06-01', 'birthday'=>'2004-06-01', 'gender'=>'F', 'microchip'=>1, 'vaccinate'=>1, 'hdb'=>0, 'sterilise'=>1,
          'location'=>'ARC', 'image'=>'angel.jpg'],
        ['stat'=>AdoptStat::Available, 'name'=>'Polly', 'slug'=>'Polly', 'rescued_on'=>'2008-06-01', 'birthday'=>'2008-06-01', 'gender'=>'F', 'microchip'=>1, 'vaccinate'=>1, 'hdb'=>0, 'sterilise'=>1,
          'location'=>'ARC', 'image'=>'polly.jpg'],
        ['stat'=>AdoptStat::Adopted, 'name'=>'Winner', 'slug'=>'Winner', 'rescued_on'=>'2009-03-01', 'birthday'=>'2009-03-01', 'gender'=>'M', 'microchip'=>1, 'vaccinate'=>1, 'hdb'=>0, 'sterilise'=>1,
          'location'=>'ARC', 'image'=>'winner.jpg']
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
