<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
   public function authorize()
    {
        return true;
    }
  
  public function rules()
  {
    return [
      'username' => 'required|unique:users,username,'.$this->id,
      'password' => 'required_without:id|min:6',
    ];
  }
  
  public function messages() {
    return [
      'username.required' => 'Username is required',
      'username.unique' => 'Username has been taken',
      'password.required_without' => 'Password is required',
      'password.min' => 'Password must be at least 6 characters',
    ];
  }
}
