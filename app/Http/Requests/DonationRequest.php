<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonationRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'=>'required',
            'mobile'=>'required',
            'email'=>'required',
            'amount'=>'required',
            'payment_method'=>'required'
        ];
    }
    
    public function authorize()
    {
      return true;
    }
  
}
