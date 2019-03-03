<?php namespace App\Http\Controllers;

use App\Http\Requests\TrainingRequest;
use App\Models\Training;

class TrainingController extends Controller {
  public function form(TrainingRequest $request) {
    $training = new Training();
    return $training->saveTraining($request->all());
  }
  
  
}
