<?php namespace App\Http\Controllers;

use App\Helpers\BackendHelper;
use App\Http\Requests\EventRequest;
use App\Models\Adopt;
use App\Models\Enums\EventStat;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller {
  public function save(EventRequest $request, $event_id = null) {
    $event = new Event();
    if ($event_id) {
      $event = Event::find($request->event_id);
    }
    $event_id = $event->saveEvent($request->all());
    if ($request->image_new) {
      $image_name = "event-".str_slug($event->name)."-".Carbon::now()->format("YmdHis");
      $image_name = BackendHelper::uploadImage("events", $image_name, $request->image_new);
      $event->image = $image_name;
      $event->save();
    }
    return $event_id;
  }
  
  public function all(Request $request) {
    $data['events'] = Event::all();
    $data['event_stats'] = EventStat::$values;
    return $data;
  }
  
  public function get(Request $request, $event_id) {
    if (is_numeric($event_id)) {
      return Event::where('event_id', $event_id)->first();
    }
    $slug = $event_id;
    return Event::where('slug', $slug)->first();
  }
  
}
