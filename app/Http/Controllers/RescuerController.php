<?php namespace App\Http\Controllers;

use App\Http\Requests\RescuerRequest;
use App\Models\Adopt;
use App\Models\Rescuer;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RescuerController extends Controller {
  public function save(RescuerRequest $request, $rescuer_id = null) {
    $rescuer = new Rescuer();
    if ($rescuer_id) {
      $rescuer = Rescuer::find($rescuer_id);
    }
    return $rescuer->saveRescuer($request->all());
  }
  
  public function get(Request $request, $rescuer_id) {
    $rescuer = Rescuer::where('rescuer_id', $rescuer_id)->first();
    $data['adopt'] = Adopt::find($rescuer->adopt_id);
    $data['person'] = Person::find($rescuer->person_id);
    $data['rescuer'] = $rescuer;
    return $data;
  }
  
}
