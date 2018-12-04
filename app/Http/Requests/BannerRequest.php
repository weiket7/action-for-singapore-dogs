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
      'link_to' => 'required',
      'image_new' => 'required_without:banner_id',
      'event_id' => 'required_if:link_to,Event'
    ];
  }
  
  public function messages() {
    return [
      'name.required' => 'Name is required',
      'stat.required' => 'Status is required',
      'link_to.required' => 'Link To is required',
      'event_id.required_if' => 'Event is required',
      'image_new.required_without' => 'Image is required',
    ];
  }
}
