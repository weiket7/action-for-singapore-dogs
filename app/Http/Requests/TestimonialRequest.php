<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }
  
  public function rules()
  {
    return [
      'dog_name' => 'required',
      'quote' => 'required',
      'content' => 'required',
      'image_new' => 'required_without:testimonial_id',
    ];
  }
  
  public function messages()
  {
    return [
      'dog_name.required' => 'Dog Name is required',
      'quote.required' => 'Quote is required',
      'content.required' => 'Content is required',
      'image_new.required' => 'Image is required',
    ];
  }
}
