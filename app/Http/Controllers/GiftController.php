<?php namespace App\Http\Controllers;

use App\Helpers\BackendHelper;
use App\Http\Requests\GiftRequest;
use App\Models\Gift;
use App\Models\Event;
use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GiftController extends Controller
{
  public function save(GiftRequest $request, $gift_id = null) {
    $gift = new Gift();
    if ($gift_id) {
      $gift = Gift::find($request->get('gift_id'));
    }
    $gift_id = $gift->saveGift(BackendHelper::processInput($request->all()));
    if ($request->image_new) {
      $image_name = "gift-".str_slug($gift->name)."-".Carbon::now()->format("YmdHis");
      $image_name = BackendHelper::uploadImage("gifts", $image_name, $request->image_new);
      $gift->image = $image_name;
      $gift->save();
    }
    return $gift_id;
  }
  
  public function get(Request $request, $gift_id) {
    $data['gift'] = $gift_id != 'undefined' ? Gift::find($gift_id) : new \ stdClass();
    $events = Event::where('date', '>=', Carbon::today())->get();
    $res = [];
    foreach($events as $event) {
      $res[$event->event_id] = $event->name . ' on ' . Carbon::createFromFormat('Y-m-d', $event->date)->format('d M Y');
    }
    $data['events'] = $res;
    $data['pages'] = Page::pluck('title', 'slug');
    return $data;
  }
  
  public function all(Request $request) {
    if ($request->isMethod("post")) {
      //vaR_dump($request->get('banners')); exit;
      foreach($request->get('gifts') as $gift) {
        $target = Gift::find($gift['gift_id']);
        $target->position = $gift['position'];
        $target->save();
      }
    }
    $data['gifts'] = Gift::all();
    //$data['gift_stats'] = GiftStat::$values;
    return $data;
  }
  
  public function delete($gift_id) {
    Gift::where('gift_id', $gift_id)->delete();
  }
}