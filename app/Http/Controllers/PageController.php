<?php namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller {
  public function save(Request $request, $page_id ) {
    $page = Page::find($page_id);
    $page_id = $page->savePage($request->all());
    return $page_id;
  }
  
  public function get(Request $request, $page_id) {
    if (is_numeric($page_id)) {
      return Page::find($page_id);
    } else {
      $slug = $page_id;
      return Page::where('slug', $slug)->first();
    }
  }
  
  public function all() {
    return Page::all();
  }
}