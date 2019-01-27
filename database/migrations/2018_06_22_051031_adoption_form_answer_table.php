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
      $table->integer('adoption_form_id');
      $table->boolean('is_header');
      $table->string('question', 100);
      $table->string('answer', 100);
    });
  
    $answers = [
      ['adoption_form_id'=>2, 'question'=>'Occupation', 'answer'=>1, 'is_header'=>0],
      ['adoption_form_id'=>2, 'question'=>'Working Hours', 'answer'=>2, 'is_header'=>0],
      ['adoption_form_id'=>2, 'question'=>'Experience with dogs', 'answer'=>3, 'is_header'=>1],
      ['adoption_form_id'=>2, 'question'=>'Have you had dog(s) before?', 'answer'=>4, 'is_header'=>0],
      ['adoption_form_id'=>2, 'question'=>'Do you currently have dog(s)?', 'answer'=>5, 'is_header'=>0],
      ['adoption_form_id'=>2, 'question'=>'Why do you want to adopt a dog?', 'answer'=>6, 'is_header'=>0],
      ['adoption_form_id'=>2, 'question'=>'Family and Home', 'answer'=>7, 'is_header'=>1],
      ['adoption_form_id'=>2, 'question'=>'What type of housing do you live in?', 'answer'=>8, 'is_header'=>0],
      ['adoption_form_id'=>2, 'question'=>'Do you have a domestic helper?', 'answer'=>9, 'is_header'=>0],
      ['adoption_form_id'=>2, 'question'=>'How many family member(s) stay with you?', 'answer'=>10, 'is_header'=>0],
      ['adoption_form_id'=>2, 'question'=>'What age(s) are your family member(s)?', 'answer'=>11, 'is_header'=>0],

      ['adoption_form_id'=>3, 'question'=>'Occupation', 'answer'=>1, 'is_header'=>0],
      ['adoption_form_id'=>3, 'question'=>'Working Hours', 'answer'=>2, 'is_header'=>0],
      ['adoption_form_id'=>3, 'question'=>'Experience with dogs', 'answer'=>3, 'is_header'=>1],
      ['adoption_form_id'=>3, 'question'=>'Have you had dog(s) before?', 'answer'=>4, 'is_header'=>0],
      ['adoption_form_id'=>3, 'question'=>'Do you currently have dog(s)?', 'answer'=>5, 'is_header'=>0],
      ['adoption_form_id'=>3, 'question'=>'Why do you want to adopt a dog?', 'answer'=>6, 'is_header'=>0],
      ['adoption_form_id'=>3, 'question'=>'Family and Home', 'answer'=>7, 'is_header'=>1],
      ['adoption_form_id'=>3, 'question'=>'What type of housing do you live in?', 'answer'=>8, 'is_header'=>0],
      ['adoption_form_id'=>3, 'question'=>'Do you have a domestic helper?', 'answer'=>9, 'is_header'=>0],
      ['adoption_form_id'=>3, 'question'=>'How many family member(s) stay with you?', 'answer'=>10, 'is_header'=>0],
      ['adoption_form_id'=>3, 'question'=>'What age(s) are your family member(s)?', 'answer'=>11, 'is_header'=>0],
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
