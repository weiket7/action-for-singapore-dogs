<?php namespace App\Http\Controllers;

use App\Http\Requests\BoardingRequest;
use App\Models\Boarding;

class BoardingController extends Controller {
  public function form(BoardingRequest $request) {
    $boarding = new Boarding();
    return $boarding->saveBoarding($request->all());
  }
  
  
}
