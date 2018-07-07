<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonationRequest extends FormRequest
{
  public function rules()
  {
    return [
      'name'=>'required',
      'email'=>'email|required',
      'mobile'=>'required',
      'amount'=>'required|numeric|min:10',
      'payment_method'=>'required',
      'ref_no'=>'required_if:payment_method,B,Q,N',
      'transfer_date'=>'required_if:payment_method,B,Q,N'
    ];
  }
  
  public function messages()
  {
    return [
      'name.required' => 'Name is required',
      'email.email' => 'Email should be abc@example.com',
      'email.required' => 'Email is required',
      'mobile.required' => 'Mobile is required',
      'amount.required' => 'Amount is required',
      'amount.min' => 'Amount minimum is 10',
      'payment_method.required' => 'Payment Method is required',
      'ref_no.required_if' => 'Reference No is required',
      'transfer_date.required_if' => 'Transfer Date is required',
    ];
  }
  
  public function authorize()
  {
    return true;
  }
  
}
