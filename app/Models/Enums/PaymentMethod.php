<?php namespace App\Models\Enums;

abstract class PaymentMethod {
  const PayNow = 'N';
  const Giro = 'G';
  const BankTransfer = 'B';
  const Cheque = 'Q';
  const PayPal = 'P';
  
  static $values = array(
    self::PayNow=>'PayNow',
    self::Giro=>'Giro',
    self::BankTransfer=>'BankTransfer',
    self::Cheque=>'Cheque',
    self::PayPal=>'PayPal',
  );
}


