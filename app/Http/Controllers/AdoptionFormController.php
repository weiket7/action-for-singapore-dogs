<?php namespace App\Http\Controllers;

use App\Http\Requests\AdoptionFormRequest;
use App\Http\Requests\AdoptRequest;
use App\Mail\AdoptionFormMail;
use App\Models\Adopt;
use App\Models\AdoptionForm;
use App\Models\Enums\AdoptionFormStat;
use App\Models\Enums\AdoptStat;
use App\Helpers\BackendHelper;
use App\Models\Question;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AdoptionFormController extends Controller {
  public function initial(AdoptionFormRequest $request) {
    $adoption_form = new AdoptionForm();
    
    $adoption_form_id = $adoption_form->saveAdoptionForm($request->all());
    //$user = User::where('email', $registration->email)->firstOrFail();
    $adopt_names = Adopt::whereIn('adopt_id', $request->hearts)->pluck('name')->toArray();
    $str = array_pop($adopt_names);
    if ($adopt_names) {
      $str = implode(', ', $adopt_names)." and ".$str;
    }
    $adoption_form->adopt_names = $str;
    Mail::to("wei_ket@hotmail.com") //TODO
    ->send(new AdoptionFormMail($adoption_form));
    
    return $adoption_form_id;
  }
  
  public function token(Request $request, $token) {
    $data['adoption_form'] = AdoptionForm::where('token', $token)->first();
    $question_ids = Question::where('is_header', false)->pluck('question_id');
    $answers = [];
    foreach($question_ids as $question_id) {
      $answers['answer-'.$question_id] = '';
    }
    $data['answers'] = $answers;
    $data['questions'] = Question::orderBy('position')->select('content', 'is_header', 'question_id')->get();
    return $data;
  }
  
  public function second(Request $request, $token) {
    //Log::info($token);
    $adoption_form = AdoptionForm::where('token', $token)->first();
    $adoption_form->saveSecondForm($request->all());
  }
  
  public function get(Request $request, $adoption_form_id) {
    $data['adoption_form'] = AdoptionForm::where('adoption_form_id', $adoption_form_id)->first();
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
