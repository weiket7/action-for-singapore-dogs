<?php namespace App\Http\Controllers;

use App\Http\Requests\DonationRequest;
use App\Mail\DonationAdminMail;
use App\Mail\DonationMail;
use App\Models\Donation;
use App\Models\Enums\DonationStat;
use App\Models\Enums\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DonationController extends Controller {
  public function save(DonationRequest $request) {
    $donation = Donation::find($request->donation_id);
    return $donation->saveDonation($request->all());
  }
  
  public function form(DonationRequest $request) {
    $donation = new Donation();
    $donation->saveDonation($request->all());
    Mail::to(env("MAIL_INBOX"))->send(new DonationAdminMail($donation));
    Mail::to($donation->email)->send(new DonationMail($donation));
    return $donation->donation_id;
  }
  
  public function all() {
    $data['donations'] = Donation::orderBy('donated_on', 'desc')->get();
    $data['payment_methods'] = PaymentMethod::$values;
    $data['donation_stats'] = DonationStat::$values;
    return $data;
  }
  
  public function get(Request $request, $donation_id) {
    $data['donation'] = Donation::where('donation_id', $donation_id)->first();
    $data['donation_stats'] = DonationStat::$values;
    $data['payment_methods'] = PaymentMethod::$values;
    return $data;
  }
  
  public function delete($donation_id) {
    Donation::where('donation_id', $donation_id)->delete();
  }
  
}
