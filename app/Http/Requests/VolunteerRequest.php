<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VolunteerRequest extends FormRequest
{
  public function rules()
  {
    return [
      'name' => 'required',
      'stat' => 'sometimes|required',
      'email' => 'required',
      'mobile' => 'required',
      'birthday' => 'required',
      'gender' => 'required',
      'occupation' => 'required',
      'availability' => 'required',
      'interests' => 'required',
    ];
  }
  
  public function messages()
  {
    return [
      'name.required' => 'Name is required',
      'stat.required' => 'Status is required',
      'email.required' => 'Email is required',
      'mobile.required' => 'Mobile is required',
      'birthday.required' => 'Birthday is required',
      'gender.required' => 'Gender is required',
      'occupation.required' => 'Occupation is required',
      'availability.required' => 'Availability is required',
      'interests.required' => 'Interest(s) is required',
    ];
  }
  
  /*public function withValidator($validator) {
    $validator->after(function ($validator) {
      if (in_array('Publicity', $this->interests) && $this->publicity_area == "") {
        $validator->errors()->add('publicity_area', 'Area to help in is required');
      }
      
      if (in_array('Logistics', $this->interests) && $this->vehicle == "") {
        $validator->errors()->add('vehicle', 'vehicle is required');
      }
  
      if (in_array('Fostering', $this->interests) && $this->preferred_dog_size == "") {
        $validator->errors()->add('preferred_dog_size', 'Preferred dog size is required');
      }
  
      if (in_array('Fostering', $this->interests) && $this->current_no_of_dogs == "") {
        $validator->errors()->add('current_no_of_dogs', 'Number of dogs currently is required');
      }
    });
  }*/
  
  public function authorize()
  {
    return true;
  }
}
