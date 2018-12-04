<?php namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use App\Models\Adopt;
use App\Models\AdoptionForm;
use App\Models\Banner;
use App\Models\Enums\AdoptStat;
use App\Models\Enums\EventType;
use App\Models\Event;
use App\Models\Page;
use App\Models\Question;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller {
  public function home(Request $request) {
    if (! $request->session()->get('rand')) {
      $request->session()->put('rand', rand());
    }
    $rand = $request->session()->get('rand');
    $count = 8;
    $data['banners'] = Banner::leftJoin('event', 'event.event_id', '=', 'banner.event_id')
      ->select('banner.name', 'banner.image', 'banner.link_to', 'banner.page_slug', 'event.slug as event_slug')->get();
    //var_dump($data['banners']); exit;
    $data['adopts'] = Adopt::where('stat', AdoptStat::Available)
      ->orderByRaw("rand(".$rand.")")->limit($count)->get();
    $data['adopt_count'] = Adopt::where('stat', AdoptStat::Available)->count();
    $home = DB::table('home')->first();
    if ($home->show == 'E') {
      $data['event'] = Event::find($home->event_id);
    }
    $data['home'] = $home;
    return view('home', $data);
  }
  
  public function contact(Request $request) {
    return view('contact');
  }
  
  public function giftShop(Request $request) {
    $data['gift-shops'] = GiftShop::all();
    return view('gift-shop', $data);
    
  }
  
  public function events(Request $request) {
    $adoption_drives = Event::where('date', '>=', Carbon::today())->where('type', EventType::AdoptionDrive)->get();
    $events = Event::where('date', '>=', Carbon::today())->orderBy('date', "desc")->get();
    $data['events'] = $adoption_drives->merge($events);
    return view('events', $data);
  }
  
  public function event(Request $request, $slug) {
    $event = Event::where('slug', $slug)->first();
    $adopt_ids = DB::table('adoption_drive')->where('event_id', $event->event_id)->pluck('adopt_id');
    $data['adopts'] = Adopt::whereIn('adopt_id', $adopt_ids)->select('adopt_id', 'name', 'slug', 'image', 'birthday', 'gender')->get();
    $data['event'] = $event;
    return view('event', $data);
  }
  
  
  public function iWantToAdopt(Request $request) {
    $adopt_ids = $request->hearts;
    $data['adopts'] = Adopt::whereIn('adopt_id', explode(',', $adopt_ids))->get();
    return view('i-want-to-adopt', $data);
  }
  
  public function adoptionApplication(Request $request, $application_token) {
    $adoption_form = AdoptionForm::where('application_token', $application_token)->first();
    if ($adoption_form->applied_on) {
      throw new Exception('getApplication Adoption form id = ' . $adoption_form->adoption_form_id . ' already applied');
    }
    $question_ids = Question::where('is_header', false)->pluck('question_id');
    $answers = [];
    foreach($question_ids as $question_id) {
      $answers['answer-'.$question_id] = '';
    }
    $data['adoption_form'] = $adoption_form;
    $data['answers'] = $answers;
    $data['questions'] = Question::orderBy('position')->select('content', 'is_header', 'question_id')->get();
    $data['application_token'] = $application_token;
    return view('adoption-application', $data);
  }
  
  public function adoptionAgreement(Request $request, $agreement_token) {
    $adoption_form = AdoptionForm::where('agreement_token', $agreement_token)->first();
    if ($adoption_form->agreed_on) {
      throw new Exception('getAgreement - Adoption form id = ' . $adoption_form->adoption_form_id . ' already agreed');
    }
  
    $data['adoption_form'] = $adoption_form;
    $data['answers'] = DB::table('adoption_form_answer')->where('adoption_form_id', $adoption_form->adoption_form_id)
      ->select('question', 'answer')->get();
    $data['agreement_token'] = $agreement_token;
    return view('adoption-agreement', $data);
  }
  
  public function volunteer(Request $request) {
    return view('volunteer');
  }
  
  public function donate(Request $request) {
    return view('donate');
  }
  
  public function pages(Request $request, $slug) {
    $data['page'] = Page::where('slug', $slug)->first();
    return view('pages', $data);
  }
  
  public function dogsForAdoption(Request $request, $current_page = 1) {
    if (! $request->session()->get('rand')) {
      $request->session()->put('rand', rand());
    }
    $page_limit = 24;
    $offset = ($current_page-1)*$page_limit;
    $rand = $request->session()->get('rand');
    $data['adopts'] = Adopt::where('stat', AdoptStat::Available)
      ->orderByRaw("rand(".$rand.")")->skip($offset)->limit($page_limit)->get();
    $data['adopt_count'] = Adopt::where('stat', AdoptStat::Available)->count();
    $data['adopts_per_page'] = $page_limit;
    return view('adopt', $data);
  }
  
  public function adopt(Request $request, $slug) {
    $data['adopt'] =  Adopt::where('slug', $slug)->first();
    return view('adopt-view', $data);
  }
  
  public function form(ContactRequest $request) {
    Mail::to(env("MAIL_INBOX"))->send(new ContactMail($request->all()));
  }
  
  public function adoptionDrive() {
    $event = Event::where('type', EventType::AdoptionDrive)->orderBy('date', 'desc')->first();
    $adopt_ids = DB::table('adoption_drive')->where('event_id', $event->event_id)->pluck('adopt_id');
    $data['adopts'] = Adopt::whereIn('adopt_id', $adopt_ids)->select('adopt_id', 'name', 'slug', 'image', 'birthday', 'gender')->get();
    $data['event'] = $event;
    return view('event', $data);
  }
  
  public function paypal(Request $request, $amount) {
    $data['amount'] = $amount;
    return view('paypal', $data);
  }
  
}
