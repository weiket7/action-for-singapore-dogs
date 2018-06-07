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
    ];
  }
  
  public function messages() {
    return [
      'name.required' => 'Name is required',
      'stat.required' => 'Status is required',
      'gender.required' => 'Gender is required',
    ];
  }
}
