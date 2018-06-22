<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
{
  public function rules()
  {
    return [
      'is_header'=>'required',
      'content'=>'required'
    ];
  }
  public function messages() {
    return [
      'is_header.required' => 'Is Header is required',
      'content.required' => 'Content is required',
    ];
  }
  
  public function authorize()
  {
    return true;
  }
  
}
