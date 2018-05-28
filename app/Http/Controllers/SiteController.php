<?php namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class SiteController extends Controller {
  public function adoptView(Request $request, $slug) {
    $data['slug'] = $slug;
    return view('adopt-view', $data);
  }
  
  public function donate(Request $request) {
    $input = $request->all();
    $donation = new Donation();
    $donation->name = $input['name'];
    $donation->mobile = $input['mobile'];
    $donation->email = $input['email'];
    $donation->amount = $input['amount'];
    $donation->payment_method = $input['payment_method'];
    $donation->save();
  }
  
}
