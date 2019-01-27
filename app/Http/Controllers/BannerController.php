<?php namespace App\Http\Controllers;

use App\Helpers\BackendHelper;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Enums\BannerStat;
use App\Models\Enums\BlogType;
use App\Models\Event;
use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BannerController extends Controller
{
  public function save(BannerRequest $request, $banner_id = null) {
    $banner = new Banner();
    if ($banner_id) {
      $banner = Banner::find($request->get('banner_id'));
    }
    $banner_id = $banner->saveBanner(BackendHelper::processInput($request->all()));
    if ($request->image_new) {
      $image_name = "banner-".str_slug($banner->name)."-".Carbon::now()->format("YmdHis");
      $image_name = BackendHelper::uploadImage("banners", $image_name, $request->image_new);
      $banner->image = $image_name;
      $banner->save();
    }
    return $banner_id;
  }
  
  public function get(Request $request, $banner_id = null ) {
    $data['banner'] = $banner_id != null ? Banner::find($banner_id) : new \ stdClass();
    $data['banner_stats'] = BannerStat::$values;
    $events = Event::where('date', '>=', Carbon::today())->get();
    $res = [];
    foreach($events as $event) {
      $res[$event->event_id] = $event->name . ' on ' . Carbon::createFromFormat('Y-m-d', $event->date)->format('d M Y');
    }
    $data['events'] = $res;
    $data['blogs'] = Blog::where('type', BlogType::News)->pluck('title', 'blog_id');
    return $data;
  }
  
  public function all(Request $request) {
    if ($request->isMethod("post")) {
      foreach($request->get('banners') as $banner) {
        $target = Banner::find($banner['banner_id']);
        $target->position = $banner['position'];
        $target->save();
      }
    }
    $data['banners'] = Banner::all();
    $data['home_banner_title'] = Page::where('slug', 'home-banner-title')->value('content');
    $data['home_banner_content'] = Page::where('slug', 'home-banner-content')->value('content');
    $data['banner_stats'] = BannerStat::$values;
    return $data;
  }
  
  public function delete($banner_id) {
    Banner::where('banner_id', $banner_id)->delete();
  }
}