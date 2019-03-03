<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrainingRequest extends FormRequest
{
  public function rules()
  {
    return [
      'name' => 'required',
      'email' => 'required',
      'mobile' => 'required',
      'breed' => 'required',
      'gender' => 'required',
      'sterilised' => 'required',
      'date' => 'required',
    ];
  }
  
  public function messages()
  {
    return [
      'name.required' => 'Name is required',
      'email.required' => 'Email is required',
      'mobile.required' => 'Mobile is required',
      'breed.required' => 'Breed is required',
      'gender.required' => 'Gender is required',
      'sterilised.required' => 'Whether dog is sterilised is required',
      'date.required' => 'Date is required',
    ];
  }
  
  public function authorize()
  {
    return true;
  }
}
