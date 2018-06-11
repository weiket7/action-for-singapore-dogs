<?php namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Adopt;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller {
  public function save(EventRequest $request, $event_id = null) {
    $event = new Event();
    if ($event_id) {
      $event = Event::find($request->event_id);
    }
    return $event->saveEvent($request->all());
  }
  
  public function all(Request $request) {
    return Event::all();
  }
  
  public function get(Request $request, $event_id) {
    if (is_numeric($event_id)) {
      return Event::where('event_id', $event_id)->first();
    }
    $slug = $event_id;
    return Event::where('slug', $slug)->first();
  }
  
}
