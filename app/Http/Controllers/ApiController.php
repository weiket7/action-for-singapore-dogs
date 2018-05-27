<?php namespace App\Http\Controllers;

use App\Models\Adopt;
use Illuminate\Http\Request;

class ApiController extends Controller {
  
  public function adopt(Request $request) {
    return Adopt::all();
  }
  
}
