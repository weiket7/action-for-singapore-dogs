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
            'payment_method'=>'required',
            'ref_no'=>'required_if:payment_method,banktransfer,cheque,paynow',
            'transfer_date'=>'required_if:payment_method,banktransfer,cheque,paynow,paypal'
        ];
    }
    
    public function authorize()
    {
      return true;
    }
  
}
