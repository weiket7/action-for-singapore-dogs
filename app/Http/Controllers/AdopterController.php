<?php namespace App\Http\Controllers;

use App\Models\Adopter;
use App\Models\Enums\VolunteerStat;
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
  
  public function get(Request $request, $volunteer_id) {
    $data['volunteer'] =  Volunteer::where('volunteer_id', $volunteer_id)->first();
    $data['volunteer_stats'] = VolunteerStat::$values;
    return $data;
  }
  
}
