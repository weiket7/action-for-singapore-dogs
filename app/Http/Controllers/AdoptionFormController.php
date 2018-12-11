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
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
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
  
  public function saveApplication(Request $request, $application_token) {
    $adoption_form = AdoptionForm::where('application_token', $application_token)->first();
    if ($adoption_form->applied_on) {
      throw new Exception('saveApplication Adoption form id = ' . $adoption_form->adoption_form_id . ' already applied');
    }
    
    $adoption_form->saveApplication($request->all());
  }
  
  public function approve(Request $request, $adoption_form_id) {
    $adoption_form = AdoptionForm::where('adoption_form_id', $adoption_form_id)->first();
    if ($adoption_form->approved_on) {
      throw new Exception('approve Adoption form id = ' . $adoption_form->adoption_form_id . ' already approved');
    }
    
    $adoption_form->approve($request->all(), Auth::user()->username);
    Mail::to(env("MAIL_INBOX"))->send(new AdoptionAgreementMail($adoption_form));
  }
  
  public function getAgreement(Request $request, $agreement_token) {
    $adoption_form = AdoptionForm::where('agreement_token', $agreement_token)->first();
    if ($adoption_form->agreed_on) {
      throw new Exception('getAgreement - Adoption form id = ' . $adoption_form->adoption_form_id . ' already agreed');
    }
    
    $data['adoption_form'] = $adoption_form;
    $data['answers'] = DB::table('adoption_form_answer')->where('adoption_form_id', $adoption_form->adoption_form_id)
      ->select('question', 'answer')->get();
    return $data;
  }
  
  public function saveAgreement(Request $request, $agreement_token) {
    $adoption_form = AdoptionForm::where('agreement_token', $agreement_token)->first();
    if ($adoption_form->agreed_on) {
      throw new Exception('saveAgreement Adoption form id = ' . $adoption_form->adoption_form_id . ' already agreed');
    }
    
    $adoption_form->saveAgreement($request->all());

    $person = new Person();
    $person->saveAdoptionFormAsAdopter($adoption_form);

    $adopter = new Adopter();
    $input['person_id'] = $person->person_id;
    $input['adopt_id'] = $adoption_form->adopt_id;
    $input['adopted_on'] = $adoption_form->adopted_on;
    $input['remark1'] = $adoption_form->remark1;
    $input['remark2'] = $adoption_form->remark2;
    $input['remark3'] = $adoption_form->remark3;
    $adopter->saveAdopter($input);
  }
  
  public function get(Request $request, $adoption_form_id) {
    $adoption_form = AdoptionForm::where('adoption_form_id', $adoption_form_id)->first();
    if ($adoption_form->adopt_id) {
      $data['adopt'] = Adopt::where('adopt_id', $adoption_form->adopt_id)->first();
    }
    $data['adoption_form'] = $adoption_form;
    $data['answers'] = DB::table('adoption_form_answer')->where('adoption_form_id', $data['adoption_form']->adoption_form_id)->select('question', 'answer')->get();
    $data['adoption_form_stats'] = AdoptionFormStat::$values;
    return $data;
  }
  
  public function all(Request $request) {
    $data['adoption_forms'] = AdoptionForm::orderBy('enquired_on', 'desc')->get();
    $data['adoption_form_stats'] = AdoptionFormStat::$values;
    return $data;
  }
  
  public function delete($adoption_form_id) {
    DB::table('adoption_form_answer')->where('adoption_form_id', $adoption_form_id)->delete();
    AdoptionForm::where('adoption_form_id', $adoption_form_id)->delete();
  }
}
