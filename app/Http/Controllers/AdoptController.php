<?php namespace App\Http\Controllers;

use App\Http\Requests\AdoptionFormRequest;
use App\Http\Requests\AdoptRequest;
use App\Mail\AdoptionFormMail;
use App\Models\Adopt;
use App\Models\AdoptionForm;
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

class AdoptController extends Controller {
  public function saveInitialForm(AdoptionFormRequest $request) {
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
  
  public function form(Request $request, $token) {
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
  
  public function saveSecondForm(Request $request, $token) {
    Log::info($token);
    $adoption_form = AdoptionForm::where('token', $token)->first();
    $adoption_form->saveSecondForm($request->all());
  }
  
  public function save(AdoptRequest $request, $adopt_id = null) {
    $adopt = new Adopt();
    if ($adopt_id) {
      $adopt = Adopt::find($request->get('adopt_id'));
    }
    $adopt_id = $adopt->saveAdopt($request->all());
    if ($request->image_new) {
      $image_name = $adopt->slug."-".Carbon::now()->format("YmdHis");
      $image_name = BackendHelper::uploadImage("adopts", $image_name, $request->image_new);
      $adopt->image = $image_name;
      $adopt->save();
    }
    return $adopt_id;
  }
  
  public function all(Request $request) {
    $data['adopts'] = Adopt::all();
    $data['adopt_stats'] = AdoptStat::$values;
    return $data;
  }
  
  public function list(Request $request, $adopt_ids) {
    return Adopt::whereIn('adopt_id', explode(',', $adopt_ids))->get();
  }
  
  public function search(Request $request) {
    $term = $request->term;
    return Adopt::where('name', 'like', '%'.$term.'%')->select(['adopt_id as id', 'name as text'])->get();
  }
  
  public function getSingle(Request $request, $adopt_id) {
    return Adopt::where('adopt_id', $adopt_id)->first();
  }
  
  public function page(Request $request) {
    if (! $request->session()->get('rand')) {
      $request->session()->put('rand', rand());
    }
    $current_page = $request->get('current_page') ?? 1;
    $page_limit = 12;
    $offset = ($current_page-1)*$page_limit;
    $rand = $request->session()->get('rand');
    
    $data['adopts'] = Adopt::where('stat', AdoptStat::Available)
      ->orderByRaw("rand(".$rand.")")->skip($offset)->limit($page_limit)->get();
    $data['adopt_count'] = Adopt::where('stat', AdoptStat::Available)->count();
    return $data;
  }
  
  public function get(Request $request, $adopt_id) {
    $adopt = Adopt::where('adopt_id', $adopt_id)->first();
    $data['adopt'] = $adopt;
    $data['fosters'] = DB::table('foster')->where('adopt_id', $adopt_id)
      ->join('person', 'foster.person_id', '=', 'person.person_id')
      ->select('foster_id', 'foster.person_id', 'name', 'mobile', 'address', 'email', 'start_date', 'end_date')->get();
    $data['adopters'] = DB::table('adopter')->where('adopt_id', $adopt_id)
      ->join('person', 'adopter.person_id', '=', 'person.person_id')
      ->select('adopter_id', 'adopter.person_id', 'name', 'mobile', 'address', 'email', 'adopted_on', 'returned', 'returned_on', 'return_reason')->get();
    $data['rescuers'] = DB::table('rescuer')->where('adopt_id', $adopt_id)
      ->join('person', 'rescuer.person_id', '=', 'person.person_id')
      ->select('rescuer_id', 'rescuer.person_id', 'name', 'mobile', 'address', 'email')->get();
    return $data;
  }
  
  public function slug(Request $request, $slug) {
    return Adopt::where('slug', $slug)->first();
  }
}
