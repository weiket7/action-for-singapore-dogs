<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
  
  public function rules()
  {
    return [
      'username' => 'required',
    ];
  }
  
  public function messages() {
    return [
      'username.required' => 'Username is required',
    ];
  }
}
