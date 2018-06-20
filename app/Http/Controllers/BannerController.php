<?php namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use App\Models\Enums\BannerStat;

class BannerController extends Controller
{
  public function save(BannerRequest $request)
  {
    $banner = new Banner();
    return $banner->saveBanner($request->all());
  }
  
  public function all()
  {
    $data['banners'] = Banner::all();
    $data['banner_stat'] = BannerStat::$values;
    return $data;
  }
}