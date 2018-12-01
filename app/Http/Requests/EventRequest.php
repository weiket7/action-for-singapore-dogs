<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
  public function rules()
  {
    return [
      'name'=>'required',
      'type'=>'required',
      'location'=>'required',
      'date'=>'required',
      'time'=>'required',
    ];
  }
  
  public function messages() {
    return [
      'name.required'=>'Name is required',
      'type.required'=>'Type is required',
      'location.required'=>'Location is required',
      'date.required'=>'Date  is required',
      'time.required'=>'Time is required',
    ];
  }
  
  public function authorize()
  {
    return true;
  }
  
}
