<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller {
  public function adoptView(Request $request, $slug) {
    $data['slug'] = $slug;
    return view('adopt-view', $data);
  }
  
}
