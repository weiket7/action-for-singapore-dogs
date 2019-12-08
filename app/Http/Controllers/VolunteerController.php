<?php namespace App\Http\Controllers;

use App\Http\Requests\VolunteerRequest;
use App\Mail\VolunteerMail;
use App\Models\Enums\VolunteerStat;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class VolunteerController extends Controller {
  public function save(VolunteerRequest $request) {
    $volunteer = Volunteer::find($request->volunteer_id);
    return $volunteer->saveVolunteer($request->all());
  }
  
  public function form(VolunteerRequest $request) {
    $volunteer = new Volunteer();
    $volunteer->saveVolunteer($request->all());
    Mail::send(new VolunteerMail($volunteer, $request->get('interests')));
  }
  
  public function all(Request $request) {
    $volunteers = Volunteer::select('stat', 'volunteer_id', 'name', 'email', 'mobile', 'created_on')
      ->orderBy('created_on', 'desc')->get();
    $volunteer_interests_data = DB::table('volunteer_interest')->select('volunteer_id', 'interest')->get();
    $volunteer_interests = [];
    foreach($volunteer_interests_data as $interest) {
        $volunteer_interests[$interest->volunteer_id][] = $interest->interest;
    }
    foreach($volunteers as $volunteer) {
        $volunteer->interests = $volunteer_interests[$volunteer->volunteer_id];
    }
    $data['volunteers'] = $volunteers;
    $data['volunteer_stats'] = VolunteerStat::$values;
    return $data;
  }
  
  public function get(Request $request, $volunteer_id) {
    $data['volunteer'] =  Volunteer::where('volunteer_id', $volunteer_id)->first();
    $data['volunteer_stats'] = VolunteerStat::$values;
    $data['interests'] = DB::table('volunteer_interest')->where('volunteer_id', $data['volunteer']->volunteer_id)->pluck('interest');
    return $data;
  }
  
}
