<?php namespace App\Http\Controllers;

use App\Helpers\BackendHelper;
use App\Http\Requests\TestimonialRequest;
use App\Models\Testimonial;
use App\Models\Event;
use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
  public function save(TestimonialRequest $request, $testimonial_id = null) {
    $testimonial = new Testimonial();
    if ($testimonial_id) {
      $testimonial = Testimonial::find($request->get('testimonial_id'));
    }
    $testimonial_id = $testimonial->saveTestimonial(BackendHelper::processInput($request->all()));
    if ($request->image_new) {
      $image_name = "testimonial-".str_slug($testimonial->name)."-".Carbon::now()->format("YmdHis");
      $image_name = BackendHelper::uploadImage("testimonials", $image_name, $request->image_new);
      $testimonial->image = $image_name;
      $testimonial->save();
    }
    return $testimonial_id;
  }
  
  public function get(Request $request, $testimonial_id = null ) {
    $data['testimonial'] = $testimonial_id != null ? Testimonial::find($testimonial_id) : new \ stdClass();
    $events = Event::where('date', '>=', Carbon::today())->get();
    $res = [];
    foreach($events as $event) {
      $res[$event->event_id] = $event->name . ' on ' . Carbon::createFromFormat('Y-m-d', $event->date)->format('d M Y');
    }
    $data['events'] = $res;
    $data['pages'] = Page::pluck('title', 'slug');
    return $data;
  }
  
  public function all()
  {
    $data['testimonials'] = Testimonial::all();
    //$data['testimonial_stats'] = TestimonialStat::$values;
    return $data;
  }
  
  public function delete($testimonial_id) {
    Testimonial::where('testimonial_id', $testimonial_id)->delete();
  }
}