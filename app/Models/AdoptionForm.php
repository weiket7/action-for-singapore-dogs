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

  public function saveEnquiry($input) {
    $this->stat = AdoptionFormStat::Enquiry;
    $this->name = $input['name'];
    $this->email = $input['email'];
    $this->mobile = $input['mobile'];
    $this->birthday = $input['birthday'];
    $this->gender = $input['gender'];
    $this->address = $input['address'];
    $this->postal = $input['postal'];
    $this->application_token = str_random();
    $this->enquired_on = Carbon::now();
    $this->save();
    
    foreach($input['hearts'] as $heart) {
      DB::table('adoption_form_adopt')->insert([
        'adoption_form_id'=>$this->adoption_form_id,
        'adopt_id'=>$heart,
      ]);
    }
    return $this->adoption_form_id;
  }
  
  public function saveApplication($input) {
    $this->stat = AdoptionFormStat::Application;
    $this->applied_on = Carbon::now();
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
  
  public function approve($input) {
    $this->stat = AdoptionFormStat::PendingSignature;
    $this->adopt_id = $input['adopt_id'];
    $this->adopted_on = $input['adopted_on'];
    $this->agreement_token = str_random();
    $this->remark = $input['remark'];
    $this->save();
  }
  
  public function saveAgreement($input) {
    $this->stat = AdoptionFormStat::Agreement;
    $this->agreed_on = Carbon::now();
    $this->save();
  }
}