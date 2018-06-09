<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
{
  public function rules()
  {
    return [
      'name' => 'required',
      'mobile' => 'required',
      'address' => 'required',
    ];
  }
  
  public function messages() {
    return [
      'name.required' => 'Name is required',
      'mobile.required' => 'Mobile is required',
      'address.required' => 'Address is required',
    ];
  }
  
  public function authorize()
  {
    return true;
  }
}
