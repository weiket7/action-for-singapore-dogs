<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdoptionAgreementRequest extends FormRequest
{
  public function rules()
  {
    return [
      'adopt_id' => 'required',
      'adopted_on' => 'required',
    ];
  }
  
  public function messages()
  {
    return [
      'adopt_id.required' => 'Dog Name is required',
      'adopted_on.required' => 'Adopted On is required',
    ];
  }
  
  public function authorize()
  {
    return true;
  }
}
