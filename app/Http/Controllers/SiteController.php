<?php namespace App\Http\Controllers;

use App\Models\Adopt;
use App\Models\Banner;
use App\Models\Donation;
use App\Models\Enums\AdoptStat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller {
  public function home(Request $request) {
    if (! $request->session()->get('rand')) {
      $request->session()->put('rand', rand());
    }
    $rand = $request->session()->get('rand');
    $count = 8;
    $data['banners'] = Banner::all();
    $data['adopts'] = Adopt::where('stat', AdoptStat::Available)
      ->orderByRaw("rand(".$rand.")")->limit($count)->get();
    return $data;
  }
  
  public function form(ContactRequest $request) {
    Mail::to("info@asdsingapore.com") //TODO
    ->send(new ContactMail($request->all()));
  }
  
  
}
