<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VolunteerRequest extends FormRequest
{
  public function rules()
  {
    return [
      'name' => 'required',
      'email' => 'required',
      'mobile' => 'required',
      'gender' => 'required',
      'birthday' => 'required',
    ];
  }
  
  public function messages()
  {
    return [
      'name.required' => 'Name is required',
      'email.required' => 'Email is required',
      'mobile.required' => 'Mobile is required',
      'gender.required' => 'Gender is required',
      'birthday.required' => 'Birthday is required',
    ];
  }
  
  public function authorize()
  {
    return true;
  }
}
