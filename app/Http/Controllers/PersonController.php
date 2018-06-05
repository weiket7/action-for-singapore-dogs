<?php namespace App\Http\Controllers;

use App\Models\Enums\PersonType;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller {
  public function all() {
    return Person::all();
  }
  
  public function search(Request $request) {
    $term = $request->term;
    $query = Person::where('name', 'like', '%'.$term.'%');
    $type = strtoupper($request->type);
    if($type == PersonType::Rescuer) {
      $query->where('is_rescuer', 1);
    }
    if($type == PersonType::Foster) {
      $query->where('is_foster', 1);
    }
    if($type == PersonType::Adopter) {
      $query->where('is_adopter', 1);
    }
    return $query->select(['person_id as id', 'name as text'])
      ->get();
  }
  
  public function get(Request $request, $person_id) {
    return Person::where('person_id', $person_id)
      ->select(['name', 'mobile', 'address'])
      ->first();
  }
}
