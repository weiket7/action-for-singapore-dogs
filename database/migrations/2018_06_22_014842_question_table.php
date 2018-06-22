<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuestionTable extends Migration
{
  public function up()
  {
    Schema::create('question', function (Blueprint $table) {
      $table->increments('question_id');
      $table->string('content', 100);
      $table->boolean('is_header')->nullable();
      $table->integer('position');
    });
    
    $questions = [
      ['content'=>'Occupation', 'position'=>1, 'is_header'=>0],
      ['content'=>'Working Hours', 'position'=>2, 'is_header'=>0],
      ['content'=>'Experience with dogs', 'position'=>3, 'is_header'=>1],
      ['content'=>'Have you had dog(s) before?', 'position'=>4, 'is_header'=>0],
      ['content'=>'Do you currently have dog(s)?', 'position'=>5, 'is_header'=>0],
      ['content'=>'Why do you want to adopt a dog?', 'position'=>6, 'is_header'=>0],
      ['content'=>'Family and home', 'position'=>7, 'is_header'=>1],
      ['content'=>'What type of housing do you live in?', 'position'=>8, 'is_header'=>0],
      ['content'=>'Do you have a domestic helper?', 'position'=>9, 'is_header'=>0],
      ['content'=>'How many family member(s) stay with you?', 'position'=>10, 'is_header'=>0],
      ['content'=>'What age(s) are your family member(s)?', 'position'=>11, 'is_header'=>0]
    ];
    foreach($questions as $question) {
      DB::table('question')->insert($question);
    }
  }
  
  public function down()
  {
    Schema::dropIfExists('question');
  }
}
