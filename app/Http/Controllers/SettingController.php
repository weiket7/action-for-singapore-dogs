<?php namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Home;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller {
  public function all() {
    return Setting::where('slug', '!=', 'home-banner-title')->where('slug', '!=', 'home-banner-content')->get();
  }
  
  public function save(Request $request, $page_id ) {
    $page = Setting::find($page_id);
    $page_id = $page->saveSetting($request->all());
    return $page_id;
  }
  
  public function get(Request $request, $page_id) {
    if (is_numeric($page_id)) {
      return Setting::find($page_id);
    }
    $slug = $page_id;
    return Setting::where('slug', $slug)->first();
  }
  
  public function getHome(Request $request) {
    $data['home'] = DB::table('home')->first();
    $data['events'] = Event::where('date', '>=', Carbon::now()->subDay())->pluck('name', 'event_id');
    return $data;
  }
  
  public function saveHome(Request $request) {
    $home = Home::first();
    $home->saveHome($request->all());
  }
  
}