<?php namespace App\Http\Controllers;

use App\Models\Adopt;
use App\Models\Event;
use App\Models\Rescuer;
use Illuminate\Http\Request;

class RescuerController extends Controller {
  public function search(Request $request) {
    $term = $request->term;
    return Rescuer::where('name', 'like', '%'.$term.'%')
      ->select(['rescuer_id as id', 'name as text'])
      ->get();
  }
  
  public function get(Request $request, $rescuer_id) {
    return Rescuer::where('rescuer_id', $rescuer_id)
      ->select(['name', 'mobile', 'address'])
      ->first();
  }
  
  public function adoptView(Request $request, $slug) {
    return Adopt::where('slug', $slug)->first();
  }
  
  public function events(Request $request) {
    return Event::all();
  }
  
}
