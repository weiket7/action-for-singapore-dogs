<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GiftRequest extends FormRequest
{
  public function authorize()
  {
    return true;
  }
  
  public function rules()
  {
    return [
      'name' => 'required',
      'price' => 'required',
      'quantity' => 'required',
      'image_new' => 'required_without:gift_id',
    ];
  }
  
  public function messages()
  {
    return [
      'name.required' => 'Name is required',
      'price.required' => 'Price is required',
      'quantity.required' => 'Quantity is required',
      'image_new.required_without' => 'Image is required',
    ];
  }
}
