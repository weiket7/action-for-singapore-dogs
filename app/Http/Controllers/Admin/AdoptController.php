<?php namespace App\Http\Controllers\Admin;

use App\Models\Adopt;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdoptController extends Controller {
  public function adopt(Request $request) {
    return Adopt::all();
  }
  
  public function get(Request $request, $adopt_id) {
    return Adopt::where('adopt_id', $adopt_id)->first();
  }
  
}
