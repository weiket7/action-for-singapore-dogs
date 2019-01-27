<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdoptRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }
  
  public function rules()
  {
    return [
      'name' => 'required',
      'stat' => 'required',
      'gender' => 'required',
      'birthday' => 'required',
      'breed' => 'required',
      'image_new' => 'required_without:adopt_id|mimes:jpeg,png,gif|max:1024',
      'location_other' => 'required_if:location,Others'
    ];
  }
  
  public function messages() {
    return [
      'name.required' => 'Name is required',
      'stat.required' => 'Status is required',
      'gender.required' => 'Gender is required',
      'birthday.required' => 'Birthday is required',
      'breed.required' => 'Breed is required',
      'image_new.required_without' => 'Image is required',
      'image_new.mimes' => 'Image must be jpg, png or gif',
      'image_new.max' => 'Image must be less than 1mb size',
      'location_other.required_if' => 'Other Location is required',
    ];
  }
}
