<?php namespace App\Models;

use App\Models\Enums\AdoptionFormStat;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdoptionForm extends Model
{
  public $table = 'adoption_form';
  protected $primaryKey = 'adoption_form_id';
  public $timestamps = false;

  public function saveAdoptionForm($input) {
    $this->stat = AdoptionFormStat::Initial;
    $this->name = $input['name'];
    $this->email = $input['email'];
    $this->mobile = $input['mobile'];
    $this->birthday = $input['birthday'];
    $this->gender = $input['gender'];
    $this->address = $input['address'];
    $this->postal = $input['postal'];
    $this->token = str_random();
    $this->initial_on = Carbon::now();
    $this->save();
    
    foreach($input['hearts'] as $heart) {
      DB::table('adoption_form_adopt')->insert([
        'adoption_form_id'=>$this->adoption_form_id,
        'adopt_id'=>$heart,
      ]);
    }
    return $this->adoption_form_id;
  }
  
  public function saveSecondForm($input) {
    $this->stat = AdoptionFormStat::Second;
    $this->second_on = Carbon::now();
    $this->save();
    
    $questions = Question::select('question_id', 'content')->get();
    foreach($questions as $question) {
      DB::table("adoption_form_answer")->insert([
        'adoption_form_id'=>$this->adoption_form_id,
        'question'=>$question->content,
        'answer'=>$input['answer-'.$question->question_id] ?? ""
      ]);
    }
  }
}