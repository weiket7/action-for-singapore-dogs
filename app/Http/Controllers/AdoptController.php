<?php namespace App\Http\Controllers;

use App\Http\Requests\AdoptionFormRequest;
use App\Http\Requests\AdoptRequest;
use App\Mail\AdoptionFormMail;
use App\Models\Adopt;
use App\Models\Adopter;
use App\Models\AdoptionForm;
use App\Models\Enums\AdoptStat;
use App\Helpers\BackendHelper;
use App\Models\Foster;
use App\Models\Question;
use App\Models\Rescuer;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AdoptController extends Controller {
  public function save(AdoptRequest $request, $adopt_id = null) {
    $adopt = new Adopt();
    if ($adopt_id) {
      $adopt = Adopt::find($request->get('adopt_id'));
    }
    $adopt_id = $adopt->saveAdopt(BackendHelper::processInput($request->all()));
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
    return Adopt::where('name', 'like', '%'.$term.'%')->where('stat', AdoptStat::Available)
      ->select(['adopt_id as id', 'name as text'])->get();
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
      ->select('adopt_id', 'foster_id', 'foster.person_id', 'name', 'mobile', 'address', 'email', 'start_date', 'end_date', 'remark1', 'remark2', 'remark3')->get();
    $data['adopters'] = DB::table('adopter')->where('adopt_id', $adopt_id)
      ->join('person', 'adopter.person_id', '=', 'person.person_id')
      ->select('adopt_id', 'adopter_id', 'adopter.person_id', 'name', 'mobile', 'address', 'email', 'adopted_on', 'returned', 'returned_on', 'return_reason', 'remark1', 'remark2', 'remark3')->get();
    $data['rescuers'] = DB::table('rescuer')->where('adopt_id', $adopt_id)
      ->join('person', 'rescuer.person_id', '=', 'person.person_id')
      ->select('adopt_id', 'rescuer_id', 'rescuer.person_id', 'name', 'mobile', 'address', 'email', 'remark1', 'remark2', 'remark3')->get();
    return $data;
  }
  
  public function slug(Request $request, $slug) {
    return Adopt::where('slug', $slug)->first();
  }
  
  public function delete(Request $request, $adopt_id) {
    Adopt::where('adopt_id', $adopt_id)->delete();
    $adoption_form = AdoptionForm::where('adopt_id', $adopt_id)->first();
    if ($adoption_form) {
      DB::table('adoption_form_adopt')->where('adoption_form_id', $adoption_form->adoption_form_id)->delete();
      DB::table('adoption_form_answer')->where('adoption_form_id', $adoption_form->adoption_form_id)->delete();
      $adoption_form->delete();
    }
    Adopter::where('adopt_id', $adopt_id)->delete();
    Foster::where('adopt_id', $adopt_id)->delete();
    Rescuer::where('adopt_id', $adopt_id)->delete();
  }
}
