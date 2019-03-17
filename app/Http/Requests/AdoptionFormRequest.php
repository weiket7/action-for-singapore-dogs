<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdoptionFormRequest extends FormRequest
{
  public function rules()
  {
    return [
      'identification_number' => 'required',
      'name' => 'required',
      'email' => 'required',
      'mobile' => 'required',
      'gender' => 'required',
      'birthday' => 'required',
      'address' => 'required',
      'postal' => 'required',
    ];
  }
  
  public function messages()
  {
    return [
      'identification_number.required' => 'NRIC / FIN is required',
      'name.required' => 'Name is required',
      'email.required' => 'Email is required',
      'mobile.required' => 'Mobile is required',
      'gender.required' => 'Gender is required',
      'birthday.required' => 'Birthday is required',
      'address.required' => 'Address is required',
      'postal.required' => 'Postal is required',
    ];
  }
  
  public function authorize()
  {
    return true;
  }
}
