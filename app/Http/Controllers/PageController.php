<?php namespace App\Http\Controllers;

use App\Models\Enums\EventType;
use App\Models\Event;
use App\Models\Home;
use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller {
  public function all() {
    return Page::all();
  }
  
  public function save(Request $request, $page_id ) {
    $page = Page::find($page_id);
    $page_id = $page->savePage($request->all());
    return $page_id;
  }
  
  public function get(Request $request, $page_id) {
    if (is_numeric($page_id)) {
      return Page::find($page_id);
    }
    $slug = $page_id;
    return Page::where('slug', $slug)->first();
  }
  
  public function getHome(Request $request) {
    $data['home'] = DB::table('home')->first();
    $data['events'] = Event::where('date', '>=', Carbon::now()->subDay())
      ->where('type', EventType::AdoptionDrive)->pluck('name', 'event_id');
    return $data;
  }
  
  public function saveHome(Request $request) {
    $home = Home::first();
    $home->saveHome($request->all());
  }
  
}