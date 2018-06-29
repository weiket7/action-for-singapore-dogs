<?php namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\RescuerRequest;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller {
  public function form(ContactRequest $request) {
    Mail::to("info@asdsingapore.com") //TODO
      ->send(new ContactMail($request->all()));
  }
  
}
