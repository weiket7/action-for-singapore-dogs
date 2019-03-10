<?php namespace App\Http\Controllers;

use App\Http\Requests\BoardingRequest;
use App\Mail\BoardingMail;
use App\Models\Boarding;
use Illuminate\Support\Facades\Mail;

class BoardingController extends Controller {
  public function form(BoardingRequest $request) {
    $boarding = new Boarding();
    Mail::to(env("MAIL_INBOX"))->send(new BoardingMail($request->all()));
    return $boarding->saveBoarding($request->all());
  }
  
}
