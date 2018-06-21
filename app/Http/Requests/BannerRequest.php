<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
      'image' => 'required_without:banner_id',
    ];
  }
  
  public function messages() {
    return [
      'name.required' => 'Name is required',
      'stat.required' => 'Status is required',
      'image.required_without' => 'Image is required',
    ];
  }
}
