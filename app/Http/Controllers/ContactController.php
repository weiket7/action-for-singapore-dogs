<?php namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\RescuerRequest;
use App\Mail\ContactMail;

class ContactController extends Controller {
  public function save(ContactRequest $request, $rescuer_id = null) {
    Mail::to("wei_ket@hotmail.com") //TODO
    ->send(new ContactMail($request->all()));
  }
  
}
