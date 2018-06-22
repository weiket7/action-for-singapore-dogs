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
      $table->string('question', 100);
      $table->string('answer', 100);
    });
  
    $answers = [
      ['adoption_form_id'=>1, 'question'=>'Occupation', 'answer'=>1],
      ['adoption_form_id'=>1, 'question'=>'Working Hours', 'answer'=>2],
      ['adoption_form_id'=>1, 'question'=>'Experience with dogs', 'answer'=>3],
      ['adoption_form_id'=>1, 'question'=>'Have you had dog(s) before?', 'answer'=>4],
      ['adoption_form_id'=>1, 'question'=>'Do you currently have dog(s)?', 'answer'=>5],
      ['adoption_form_id'=>1, 'question'=>'Why do you want to adopt a dog?', 'answer'=>6],
      ['adoption_form_id'=>1, 'question'=>'Family and home', 'answer'=>7],
      ['adoption_form_id'=>1, 'question'=>'What type of housing do you live in?', 'answer'=>8],
      ['adoption_form_id'=>1, 'question'=>'Do you have a domestic helper?', 'answer'=>9],
      ['adoption_form_id'=>1, 'question'=>'How many family member(s) stay with you?', 'answer'=>10],
      ['adoption_form_id'=>1, 'question'=>'What age(s) are your family member(s)?', 'answer'=>11],
  
      ['adoption_form_id'=>2, 'question'=>'Occupation', 'answer'=>1],
      ['adoption_form_id'=>2, 'question'=>'Working Hours', 'answer'=>2],
      ['adoption_form_id'=>2, 'question'=>'Experience with dogs', 'answer'=>3],
      ['adoption_form_id'=>2, 'question'=>'Have you had dog(s) before?', 'answer'=>4],
      ['adoption_form_id'=>2, 'question'=>'Do you currently have dog(s)?', 'answer'=>5],
      ['adoption_form_id'=>2, 'question'=>'Why do you want to adopt a dog?', 'answer'=>6],
      ['adoption_form_id'=>2, 'question'=>'Family and home', 'answer'=>7],
      ['adoption_form_id'=>2, 'question'=>'What type of housing do you live in?', 'answer'=>8],
      ['adoption_form_id'=>2, 'question'=>'Do you have a domestic helper?', 'answer'=>9],
      ['adoption_form_id'=>2, 'question'=>'How many family member(s) stay with you?', 'answer'=>10],
      ['adoption_form_id'=>2, 'question'=>'What age(s) are your family member(s)?', 'answer'=>11]
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
