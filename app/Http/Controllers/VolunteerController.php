<?php namespace App\Http\Controllers;

use App\Http\Requests\VolunteerRequest;
use App\Models\Enums\VolunteerStat;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VolunteerController extends Controller {
  public function save(VolunteerRequest $request) {
    $volunteer = Volunteer::find($request->volunteer_id);
    return $volunteer->saveVolunteer($request->all());
  }
  
  public function form(VolunteerRequest $request) {
    $volunteer = new Volunteer();
    return $volunteer->saveVolunteer($request->all());
  }
  
  public function all(Request $request) {
    $data['volunteers'] = Volunteer::select('stat', 'volunteer_id', 'name', 'email', 'mobile')->get();
    $data['volunteer_stats'] = VolunteerStat::$values;
    return $data;
  }
  
  public function get(Request $request, $volunteer_id) {
    $data['volunteer'] =  Volunteer::where('volunteer_id', $volunteer_id)->first();
    $data['volunteer_stats'] = VolunteerStat::$values;
    $data['interests'] = DB::table('volunteer_interest')->where('volunteer_id', $data['volunteer']->volunteer_id)->pluck('interest');
    return $data;
  }
  
  public function delete($volunteer_id) {
    Volunteer::where('volunteer_id', $volunteer_id)->delete();
  }
  
}
