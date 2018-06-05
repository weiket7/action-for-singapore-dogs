<?php namespace App\Http\Controllers;

use App\Models\Adopt;
use App\Models\Enums\AdoptStat;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdoptController extends Controller {
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
    $s =  "SELECT * from adopt order by rand($rand) limit :offset, :page_limit";
    $p['offset'] = $offset;
    $p['page_limit'] = $page_limit;
    $data['adopts'] = DB::select($s, $p);
    $data['adopt_count'] = Adopt::where('stat', AdoptStat::Available)->count();
    return $data;
  }
  
  public function get(Request $request, $adopt_id) {
    if (is_numeric($adopt_id)) {
      return Adopt::where('adopt_id', $adopt_id)->first();
    }
    $slug = $adopt_id;
    return Adopt::where('slug', $slug)->first();
  }
  
}
