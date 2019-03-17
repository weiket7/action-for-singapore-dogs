<?php namespace App\Http\Controllers;

use App\Http\Requests\TrainingRequest;
use App\Mail\TrainingMail;
use App\Models\Training;
use Illuminate\Support\Facades\Mail;

class TrainingController extends Controller {
  public function form(TrainingRequest $request) {
    $training = new Training();
    $training->saveTraining($request->all());
    Mail::send(new TrainingMail($training));
  }
  
  
}
