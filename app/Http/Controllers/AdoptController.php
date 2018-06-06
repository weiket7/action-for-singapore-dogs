<?php namespace App\Http\Controllers;

use App\Models\Adopt;
use App\Models\Enums\AdoptStat;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdoptController extends Controller {
  public function save(Request $request) {
    $adopt = new Adopt();
    if ($request->get('adopt_id')) {
      $adopt = Adopt::find($request->get('adopt_id'));
    }
  }
  
  public function all(Request $request) {
    return Adopt::all();
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
      ->select('foster.person_id', 'name', 'mobile', 'address', 'start_date', 'end_date')->get();
    $data['adopters'] = DB::table('adopter')->where('adopt_id', $adopt_id)
      ->join('person', 'adopter.person_id', '=', 'person.person_id')
      ->select('adopter.person_id', 'name', 'mobile', 'address', 'adopted_on', 'returned', 'returned_on', 'return_reason')->get();
    $data['rescuers'] = DB::table('rescuer')->where('adopt_id', $adopt_id)
      ->join('person', 'rescuer.person_id', '=', 'person.person_id')
      ->select('rescuer.person_id', 'name', 'mobile', 'address')->get();
    return $data;
  }
  
  public function slug(Request $request, $slug) {
    return Adopt::where('slug', $slug)->first();
  }
}
