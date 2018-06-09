<?php namespace App\Http\Controllers;

use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller {
  public function all(Request $request) {
    return Volunteer::select('volunteer_id', 'name', 'email', 'mobile')->get();
  }
  
  public function get(Request $request, $volunteer_id) {
    return Volunteer::where('volunteer_id', $volunteer_id)
      ->first();
  }
  
}
