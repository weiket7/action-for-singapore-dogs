<?php namespace App\Http\Controllers;

use App\Helpers\BackendHelper;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use App\Models\Enums\BannerStat;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BannerController extends Controller
{
  public function save(BannerRequest $request, $banner_id = null) {
    $banner = new Banner();
    if ($banner_id) {
      $banner = Banner::find($request->get('banner_id'));
    }
    $banner_id = $banner->saveBanner($request->all());
    if ($request->image_new) {
      $image_name = "banner-".str_slug($banner->name)."-".Carbon::now()->format("YmdHis");
      $image_name = BackendHelper::uploadImage("banners", $image_name, $request->image_new);
      $banner->image = $image_name;
      $banner->save();
    }
    return $banner_id;
  }
  
  public function get(Request $request, $banner_id) {
    $data['banner'] = Banner::find($banner_id);
    $data['banner_stats'] = BannerStat::$values;
    return $data;
  }
  
  public function all()
  {
    $data['banners'] = Banner::all();
    $data['banner_stats'] = BannerStat::$values;
    return $data;
  }
}