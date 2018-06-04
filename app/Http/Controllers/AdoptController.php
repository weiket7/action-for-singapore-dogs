<?php namespace App\Http\Controllers;

use App\Models\Adopt;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdoptController extends Controller {
  public function all(Request $request) {
    return Adopt::all();
  }
  
  public function get(Request $request, $adopt_id) {
    if (is_numeric($adopt_id)) {
      return Adopt::where('adopt_id', $adopt_id)->first();
    }
    $slug = $adopt_id;
    return Adopt::where('slug', $slug)->first();
  }
  
}
