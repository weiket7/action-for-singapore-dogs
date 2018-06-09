<?php namespace App\Http\Controllers;

use App\Http\Requests\FosterRequest;
use App\Models\Foster;
use App\Models\Person;
use Illuminate\Http\Request;

class FosterController extends Controller {
  public function save(FosterRequest $request, $foster_id = null) {
    $foster = new Foster();
    if ($foster_id) {
      $foster = Foster::find($request->get('foster_id'));
    }
    return $foster->saveFoster($request->all());
  }
  
  public function get(Request $request, $foster_id) {
    $foster = Foster::where('foster_id', $foster_id)->first();
    $data['adopt'] = Foster::find($foster->adopt_id);
    $data['person'] = Person::find($foster->person_id);
    $data['foster'] = $foster;
    return $data;
  }
  
}
