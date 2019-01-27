<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }
  
  public function rules()
  {
    return [
      'title' => 'required',
      'type' => 'required',
      'image_new' => 'required_without:blog_id',
    ];
  }
  
  public function messages() {
    return [
      'title.required' => 'Title is required',
      'type.required' => 'Type is required',
      'image_new.required_without' => 'Image is required',
    ];
  }
}
