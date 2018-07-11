<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PageTable extends Migration
{
    public function up()
    {
      Schema::create('page', function (Blueprint $table) {
        $table->increments('page_id');
        $table->string('title', 50);
        $table->string('slug', 50);
        $table->text('content');
      });
      
      
      $arr = [
        'Who We Are',
        'Adoption & Rescue Centre (ARC)',
        'Boarding Services',
        'Media',
        'Dog Listener Academy',
        'Why Adopt A Dog',
        'Adoption Procedure',
        'Project Adore',
        'Gone to Loving Homes',
        'Sponsor',
        'Gift Shop',
        'Dogs in Need',
      ];
      foreach($arr as $a) {
        DB::table('page')->insert([
          'title'=>$a,
          'slug'=>str_slug($a),
          'content'=>$a
        ]);
      }
    }

    public function down()
    {
      Schema::dropIfExists('page');
    }
}
