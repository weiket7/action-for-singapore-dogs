<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
  public function rules()
  {
    return [
      'name'=>'required',
      'email'=>'required',
      'mobile'=>'required',
      'subject'=>'required',
      'message'=>'required',
    ];
  }
  
  public function messages()
  {
    return [
      'name.required' => 'Name is required',
      'email.required' => 'Email is required',
      'mobile.required' => 'Mobile is required',
      'subject.required' => 'Subject is required',
      'message.required' => 'Message is required',
    ];
  }
  
  public function authorize()
  {
    return true;
  }
}
