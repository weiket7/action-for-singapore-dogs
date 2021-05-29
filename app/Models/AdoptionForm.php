<?php namespace App\Models;

use App\Models\Enums\AdoptionFormStat;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdoptionForm extends Model
{
    public $table = 'adoption_form';
    protected $primaryKey = 'adoption_form_id';
    public $timestamps = false;

    public function saveEnquiry($input, $browser)
    {
        $this->stat = AdoptionFormStat::Enquiry;
        $this->nationality = $input['nationality'];
        $this->duration_in_sg = $input['duration_in_sg'] ?? "";
        $this->name = $input['name'];
        $this->email = $input['email'];
        $this->mobile = $input['mobile'];
        $this->birthday = $input['birthday'];
        $this->gender = $input['gender'];
        $this->address = $input['address'];
        $this->postal = $input['postal'];
        $this->application_token = str_random();
        $this->enquired_on = Carbon::now();
        $this->browser_enquired = $browser;
        $this->save();
    
        foreach ($input['hearts'] as $heart) {
            DB::table('adoption_form_adopt')->insert([
        'adoption_form_id'=>$this->adoption_form_id,
        'adopt_id'=>$heart,
      ]);
        }
        return $this->adoption_form_id;
    }
  
    public function saveApplication($input, $browser)
    {
        $this->stat = AdoptionFormStat::Application;
        $this->applied_on = Carbon::now();
        $this->browser_applied = $browser;
        $this->save();
    
        $questions = Question::select('question_id', 'content', 'is_header')->get();
        foreach ($questions as $question) {
            DB::table("adoption_form_answer")->insert([
        'adoption_form_id'=>$this->adoption_form_id,
        'is_header'=>$question->is_header,
        'question_id'=>$question->question_id,
        'question'=>$question->content,
        'answer'=>$input['answer-'.$question->question_id]
      ]);
        }
    }
  
    public function approve($input, $username)
    {
        //update adoption_form
        // set stat = 'P', adopt_id = null, adopted_on = null, agreement_token = null, remark1 = null, remark2 = null, remark3 = null, approved_on = null, approved_by = null
        // where adoption_form_id = 3184

        $this->stat = AdoptionFormStat::PendingSignature;
        $this->adopt_id = $input['adopt_id'];
        $this->adopted_on = $input['adopted_on'];
        $this->agreement_token = str_random();
        $this->remark1 = $input['remark1'];
        $this->remark2 = $input['remark2'];
        $this->remark3 = $input['remark3'];
        $this->approved_on = Carbon::now();
        $this->approved_by = $username;
        $this->save();
    }
  
    public function saveAgreement($input)
    {
        $this->stat = AdoptionFormStat::Agreement;
        $this->agreed_on = Carbon::now();
        $this->save();
    }
  
    public function getAnswers($adoption_form_id)
    {
        return DB::table('adoption_form_answer')->where('adoption_form_id', $adoption_form_id)
      ->select('is_header', 'question', 'question_id', 'answer')->orderBy('question_id')->get();
    }
  
    public function getDogsInterestedIn($adoption_form_id)
    {
        return DB::table('adoption_form_adopt as afa')->join('adopt as a', 'afa.adopt_id', '=', 'a.adopt_id')
      ->where('adoption_form_id', $adoption_form_id)->pluck('name', 'afa.adopt_id');
    }
}
