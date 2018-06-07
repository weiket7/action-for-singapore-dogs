<?php namespace App\Http\Controllers;

use App\Models\Enums\PersonType;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller {
  public function all(Request $request) {
    $query = Person::select('person_id', 'name', 'email', 'mobile');
    $this->appendType($request->type, $query);
    return $query->get();
  }
  
  public function search(Request $request) {
    $term = $request->term;
    $query = Person::where('name', 'like', '%'.$term.'%');
    $this->appendType($request->type, $query);
    return $query->select(['person_id as id', 'name as text'])
      ->get();
  }
  
  public function get(Request $request, $person_id) {
    return Person::where('person_id', $person_id)
      ->first();
  }
  
  private function appendType($type, $query)
  {
    $type = strtolower($type);
    if ($type == 'rescuer') {
      $query->where('is_rescuer', 1);
    }
    if ($type == 'foster') {
      $query->where('is_foster', 1);
    }
    if ($type == 'adopter') {
      $query->where('is_adopter', 1);
    }
    if ($type == 'sponsor') {
      $query->where('is_sponsor', 1);
    }
  }
}
