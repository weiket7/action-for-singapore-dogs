<?php namespace App\Http\Controllers;

use App\Models\Adopt;
use App\Models\Event;
use Illuminate\Http\Request;

class ApiController extends Controller {
  
  public function adopt(Request $request) {
    return Adopt::all();
  }
  
  public function adoptView(Request $request, $slug) {
    return Adopt::where('slug', $slug)->first();
  }
  
  public function events(Request $request) {
    return Event::all();
  }
  
}
