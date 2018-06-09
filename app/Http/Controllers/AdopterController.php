<?php namespace App\Http\Controllers;

use App\Models\Adopt;
use App\Models\Adopter;
use App\Models\Enums\VolunteerStat;
use App\Models\Person;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class AdopterController extends Controller {
  public function save(Request $request, $adopter_id) {
    $adopter = new Adopter();
    if ($adopter_id) {
      $adopter = Adopt::find($request->get('adopter_id'));
    }
    return $adopter->saveAdopt($request->all());
  }
  
  public function get(Request $request, $adopter_id) {
    $adopter = Adopter::where('adopter_id', $adopter_id)->first();
    $data['adopt'] = Adopt::find($adopter->adopt_id);
    $data['person'] = Person::find($adopter->person_id);
    $data['adopter'] = $adopter;
    return $data;
  }
  
}
