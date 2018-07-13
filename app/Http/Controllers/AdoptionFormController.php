<?php namespace App\Http\Controllers;

use App\Http\Requests\AdoptionFormRequest;
use App\Http\Requests\AdoptRequest;
use App\Mail\AdoptionAgreementMail;
use App\Mail\AdoptionFormMail;
use App\Models\Adopt;
use App\Models\Adopter;
use App\Models\AdoptionForm;
use App\Models\Enums\AdoptionFormStat;
use App\Models\Person;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AdoptionFormController extends Controller {
  //POST
  public function enquiry(AdoptionFormRequest $request) {
    $adoption_form = new AdoptionForm();
    
    $adoption_form_id = $adoption_form->saveEnquiry($request->all());
    //$user = User::where('email', $registration->email)->firstOrFail();
    $adopt_names = Adopt::whereIn('adopt_id', $request->hearts)->pluck('name')->toArray();
    $str = array_pop($adopt_names);
    if ($adopt_names) {
      $str = implode(', ', $adopt_names)." and ".$str;
    }
    $adoption_form->adopt_names = $str;
    Mail::to(env("MAIL_INBOX"))->send(new AdoptionFormMail($adoption_form));
    
    return $adoption_form_id;
  }
  
  public function token(Request $request, $token) {
    $data['adoption_form'] = AdoptionForm::where('application_token', $token)->first();
    $question_ids = Question::where('is_header', false)->pluck('question_id');
    $answers = [];
    foreach($question_ids as $question_id) {
      $answers['answer-'.$question_id] = '';
    }
    $data['answers'] = $answers;
    $data['questions'] = Question::orderBy('position')->select('content', 'is_header', 'question_id')->get();
    return $data;
  }
  
  //POST
  public function application(Request $request, $token) {
    //Log::info($token);
    $adoption_form = AdoptionForm::where('application_token', $token)->first();
    $adoption_form->saveApplication($request->all());
  }
  
  public function approve(Request $request, $adoption_form_id) {
    $adoption_form = AdoptionForm::where('adoption_form_id', $adoption_form_id)->first();
    $adoption_form->stat = AdoptionFormStat::PendingSignature;
    $adoption_form->adopt_id = $request->adopt_id;
    $adoption_form->adopted_on = $request->adopted_on;
    $adoption_form->agreement_token = str_random();
    $adoption_form->remark = $request->remark;
    $adoption_form->save();
    Log::info($adoption_form);
    Mail::to(env("MAIL_INBOX"))->send(new AdoptionAgreementMail($adoption_form));
  }
  
  public function sign($adoption_form_id) {
    $adoption_form = AdoptionForm::where('adoption_form_id', $adoption_form_id)->first();
    
    $person = new Person();
    $person->saveAdoptionFormAsAdopter($adoption_form);
  
    $adopter = new Adopter();
    $input['person_id'] = $person->person_id;
    $input['adopt_id'] = $adoption_form->adopt_id;
    $input['adopted_on'] = $adoption_form->adopted_on;
    $adopter->saveAdopter($input);
  }
  
  public function save(Request $request, $adoption_form_id) {
    $adoption_form = AdoptionForm::where('adoption_form_id', $adoption_form_id)->first();
    $adoption_form->stat = AdoptionFormStat::Agreement;
    $adoption_form->save();
    
    $person = new Person();
    $person->saveAdoptionFormAsAdopter($adoption_form);
  
    $adopter = new Adopter();
    $input['adopt_id'] = $request->adopt_id;
    $input['person_id'] = $person->person_id;
    $input['adopted_on'] = $request->adopted_on;
    $adopter->saveAdopter($input);
  }
  
  public function get(Request $request, $adoption_form_id) {
    $data['adoption_form'] = AdoptionForm::where('adoption_form_id', $adoption_form_id)->first();
    if ($data['adoption_form']->adopt_id) {
      $data['adopt'] = Adopt::where('adopt_id', $data['adoption_form']->adopt_id)->first();
    }
    $data['answers'] = DB::table('adoption_form_answer')->where('adoption_form_id', $data['adoption_form']->adoption_form_id)->select('question', 'answer')->get();
    $data['adoption_form_stats'] = AdoptionFormStat::$values;
    return $data;
  }
  
  public function all(Request $request) {
    $data['adoption_forms'] = AdoptionForm::all();
    $data['adoption_form_stats'] = AdoptionFormStat::$values;
    return $data;
  }
}
