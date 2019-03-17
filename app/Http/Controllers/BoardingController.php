<?php namespace App\Http\Controllers;

use App\Http\Requests\BoardingRequest;
use App\Mail\BoardingMail;
use App\Models\Boarding;
use Illuminate\Support\Facades\Mail;

class BoardingController extends Controller {
  public function form(BoardingRequest $request) {
    $boarding = new Boarding();
    $boarding->saveBoarding($request->all());
    Mail::send(new BoardingMail($boarding));
  }
  
}
