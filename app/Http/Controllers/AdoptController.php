<?php namespace App\Http\Controllers;

use App\Http\Requests\AdoptRequest;
use App\Models\Adopt;
use App\Models\Enums\AdoptStat;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdoptController extends Controller {
  public function save(AdoptRequest $request, $adopt_id = null) {
    $adopt = new Adopt();
    if ($adopt_id) {
      $adopt = Adopt::find($request->get('adopt_id'));
    }
    return $adopt->saveAdopt($request->all());
  }
  
  public function all(Request $request) {
    return Adopt::all();
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
  
  public function temp(Request $request, $count) {
    if (! $request->session()->get('rand')) {
      $request->session()->put('rand', rand());
    }
    $rand = $request->session()->get('rand');
    return Adopt::where('stat', AdoptStat::Available)
      ->orderByRaw("rand(".$rand.")")->limit($count)->get();
    return $data;
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
      ->select('foster_id', 'foster.person_id', 'name', 'mobile', 'address', 'start_date', 'end_date')->get();
    $data['adopters'] = DB::table('adopter')->where('adopt_id', $adopt_id)
      ->join('person', 'adopter.person_id', '=', 'person.person_id')
      ->select('adopter_id', 'adopter.person_id', 'name', 'mobile', 'address', 'adopted_on', 'returned', 'returned_on', 'return_reason')->get();
    $data['rescuers'] = DB::table('rescuer')->where('adopt_id', $adopt_id)
      ->join('person', 'rescuer.person_id', '=', 'person.person_id')
      ->select('rescuer_id', 'rescuer.person_id', 'name', 'mobile', 'address')->get();
    return $data;
  }
  
  public function slug(Request $request, $slug) {
    return Adopt::where('slug', $slug)->first();
  }
}
