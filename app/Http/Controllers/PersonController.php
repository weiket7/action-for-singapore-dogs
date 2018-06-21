<?php namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Models\Enums\PersonStat;
use App\Models\Enums\PersonType;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller {
  public function save(PersonRequest $request, $person_id = null) {
    $person = new Person();
    if ($person_id) {
      $person = Person::find($request->person_id);
    }
    return $person->savePerson($request->all());
  }
  
  public function all(Request $request) {
    $query = Person::select('person_id', 'name', 'email', 'mobile', 'stat', 'is_adopter', 'is_rescuer', 'is_foster', 'is_volunteer');
    $data['person_types'] = PersonType::$values;
    if($request->type) {
      $this->appendType($request->type, $query);
    }
    $data['persons'] = $query->get();
    $data['person_stats'] = PersonStat::$values;
    return $data;
  }
  
  public function search(Request $request) {
    $term = $request->term;
    $query = Person::where('name', 'like', '%'.$term.'%');
    $this->appendType($request->type, $query);
    return $query->select(['person_id as id', 'name as text'])
      ->get();
  }
  
  public function get(Request $request, $person_id) {
    $data['person'] = Person::where('person_id', $person_id)->first();
    $data['adopts'] = DB::table('adopter')->where('person_id', $person_id)
      ->join('adopt', 'adopt.adopt_id', '=', 'adopter.person_id')->select('adopt.name', 'adopt.adopt_id', 'adopted_on', 'returned', 'returned_on', 'return_reason')->get();
    $data['fosters'] = DB::table('foster')->where('person_id', $person_id)
      ->join('adopt', 'adopt.adopt_id', '=', 'foster.person_id')->select('adopt.name', 'adopt.adopt_id', 'start_date', 'end_date')->get();
    $data['rescues'] = DB::table('rescuer')->where('person_id', $person_id)
      ->join('adopt', 'adopt.adopt_id', '=', 'rescuer.person_id')->select('adopt.name', 'adopt.adopt_id')->get();
    return $data;
  }
  
  public function getSingle(Request $request, $person_id) {
    return Person::where('person_id', $person_id)->first();
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
