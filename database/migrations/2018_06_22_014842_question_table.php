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
      $table->string('content', 200);
      $table->boolean('is_header')->nullable();
      $table->integer('position');
    });
    
    $questions = [
      ['content'=>'Personal Info', 'position'=>0, 'is_header'=>1],
      ['content'=>'What is your occupation?', 'position'=>1, 'is_header'=>0],
      ['content'=>'What are your working hours?', 'position'=>2, 'is_header'=>0],
      /*['content'=>'How many days in a month do you work overtime?', 'position'=>3, 'is_header'=>0],
      ['content'=>'How many weeks/months in a year do you travel for work/leisure?', 'position'=>4, 'is_header'=>0],
      ['content'=>'How many people in the household, and what are their ages? ', 'position'=>5, 'is_header'=>0],
      ['content'=>'Please state their exposure / experience with pets', 'position'=>6, 'is_header'=>0],
      ['content'=>'Do you have a domestic helper?', 'position'=>7, 'is_header'=>0],
      ['content'=>'What is her nationality & religion? (N/A if you do not have a domestic helper)', 'position'=>8, 'is_header'=>0],
      ['content'=>'Does she have any experience with dogs? (N/A if you do not have a domestic helper)', 'position'=>9, 'is_header'=>0],

      ['content'=>'Previous and Current Pet History', 'position'=>10, 'is_header'=>0],
      ['content'=>'Why do you want to adopt a dog?', 'position'=>11, 'is_header'=>0],
      ['content'=>'What pets do you currently have at home? (N.A if not applicable)', 'position'=>12, 'is_header'=>0],
      ['content'=>'Have you ever owned pet(s) before?', 'position'=>13, 'is_header'=>0],
      ['content'=>'If you’ve owned pet(s) before, what type, when, and for how long? (N.A if not applicable)', 'position'=>14, 'is_header'=>0],
      ['content'=>'If previous pet(s) are deceased, at what age did they pass away? (N.A if not applicable)', 'position'=>15, 'is_header'=>0],
      ['content'=>'Have you ever given up your previous pet(s) for any reason, such as to a shelter, or for private adoption? If Yes, please state the reason. (N.A if not applicable)', 'position'=>16, 'is_header'=>0],
      ['content'=>'Are you current pets (cats or dogs) sterilized? If not, please state the reason. (N.A if not applicable)', 'position'=>17, 'is_header'=>0],
      ['content'=>'Do you live in a house, HDB or private apartment? Kindly state if residence is owned or rented too. *', 'position'=>18, 'is_header'=>0],
      ['content'=>'How will your dog get exercise? ', 'position'=>19, 'is_header'=>0],
      ['content'=>'Will your dog live inside or outside? If outside, what shelter is provided to keep the dog out of the sun/rain?', 'position'=>20, 'is_header'=>0],
      ['content'=>'Who will be responsible for the dog’s daily care (feeding/grooming/exercising)? What is his/her age?', 'position'=>21, 'is_header'=>0],
      ['content'=>'On a typical day, how many hours will the dog be alone?', 'position'=>22, 'is_header'=>0],
      ['content'=>'Who will look after the dog when you are out of town?', 'position'=>23, 'is_header'=>0],
      
      ['content'=>'Are you prepared to accept the expenses of owning a pet? This includes food, annual check ups and vaccinations, emergency treatment when dog is sick or injured.', 'position'=>24, 'is_header'=>0],
      ['content'=>'Do you have the time available to commit to caring for a dog?', 'position'=>25, 'is_header'=>0],
      ['content'=>'Have you considered the damage that a dog/puppy can do? (Soiling, biting, scratching doors, chewing, etc?)', 'position'=>26, 'is_header'=>0],
      ['content'=>'Do you realise that some dogs can shed, drool, smell and bark excessively?', 'position'=>27, 'is_header'=>0],
      ['content'=>'If you have to move house, are you prepared to consider the dog’s needs when choosing a new home?', 'position'=>28, 'is_header'=>0],
      ['content'=>'If you are an expat, are you prepared to bring the dog with you to the next country ? Relocation costs can be between SG$2000 to SG$5000 for a medium sized dog.', 'position'=>6, 'is_header'=>0],
      ['content'=>'Are you aware that you could be making a 10 year commitment, or longer?', 'position'=>29, 'is_header'=>0],
      ['content'=>'Are you willing to let ASD visit you at home before & after the adoption takes place?', 'position'=>30, 'is_header'=>0],
      ['content'=>'Please tell us why you are considering adopting a rescued dog, and why you are a good home to place a puppy/dog in.', 'position'=>32, 'is_header'=>0],
      
      ['content'=>'Please prioritize the following 5 attributes in order of importance to you with 1 being the most important and 5 being the least important. Note: Do not repeat the numbers.', 'position'=>33, 'is_header'=>1],
      ['content'=>'Breed of Dog', 'position'=>34, 'is_header'=>0],
      ['content'=>'Appearance of dog', 'position'=>35, 'is_header'=>0],
      ['content'=>'Temperament of dog', 'position'=>36, 'is_header'=>0],
      ['content'=>'Cost of maintaining a dog', 'position'=>37, 'is_header'=>0],
      ['content'=>'Health of dog', 'position'=>38, 'is_header'=>0],
      
      ['content'=>'Given any of these hypothetical situations that may apply to you please state whether your dog will be affected and how the situation will be handled?', 'position'=>39, 'is_header'=>1],
      ['content'=>'Situation 1 : You lost your job', 'position'=>40, 'is_header'=>0],
      ['content'=>'Situation 2 : You are evicted from your place of dwelling', 'position'=>41, 'is_header'=>0],
      ['content'=>'Situation 3 : You are assigned to work overseas for at least 1 year', 'position'=>42, 'is_header'=>0],
      ['content'=>'Situation 4 : You are separated from your spouse', 'position'=>43, 'is_header'=>0],
      ['content'=>'Situation 5 : You have a baby in the family', 'position'=>44, 'is_header'=>0],
      ['content'=>'Situation 6 : You or a member of your household develops an allergy to your dog', 'position'=>45, 'is_header'=>0],*/
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
