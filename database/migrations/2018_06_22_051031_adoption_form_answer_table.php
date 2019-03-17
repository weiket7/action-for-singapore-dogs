<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdoptionFormAnswerTable extends Migration
{
  public function up()
  {
    Schema::create('adoption_form_answer', function (Blueprint $table) {
      $table->increments('id');
      $table->tinyInteger('question_id');
      $table->integer('adoption_form_id');
      $table->boolean('is_header');
      $table->string('question', 200);
      $table->string('answer', 200);
    });
  
    $answers = [
      ['adoption_form_id'=>2, 'question_id'=>1, 'question'=>'Occupation', 'answer'=>1, 'is_header'=>0],
      ['adoption_form_id'=>2, 'question_id'=>2, 'question'=>'Working Hours', 'answer'=>2, 'is_header'=>0],
      ['adoption_form_id'=>2, 'question_id'=>3, 'question'=>'Experience with dogs', 'answer'=>3, 'is_header'=>1],
      ['adoption_form_id'=>2, 'question_id'=>4, 'question'=>'Have you had dog(s) before?', 'answer'=>4, 'is_header'=>0],
      ['adoption_form_id'=>2, 'question_id'=>5, 'question'=>'Do you currently have dog(s)?', 'answer'=>5, 'is_header'=>0],

      ['adoption_form_id'=>3, 'question_id'=>1, 'question'=>'Occupation', 'answer'=>1, 'is_header'=>0],
      ['adoption_form_id'=>3, 'question_id'=>2, 'question'=>'Working Hours', 'answer'=>2, 'is_header'=>0],
      ['adoption_form_id'=>3, 'question_id'=>3, 'question'=>'Experience with dogs', 'answer'=>3, 'is_header'=>1],
      ['adoption_form_id'=>3, 'question_id'=>4, 'question'=>'Have you had dog(s) before?', 'answer'=>4, 'is_header'=>0],
      ['adoption_form_id'=>3, 'question_id'=>5, 'question'=>'Do you currently have dog(s)?', 'answer'=>5, 'is_header'=>0],
    ];
    foreach($answers as $answer) {
      DB::table('adoption_form_answer')->insert($answer);
    }
  }
  
  public function down()
  {
    Schema::dropIfExists('adoption_form_answer');
  }
}
