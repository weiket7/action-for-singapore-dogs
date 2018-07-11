<?php namespace App\Models\Enums;

abstract class AdoptionFormStat {
  const Enquiry = 'E';
  const Application = 'P';
  const PendingSignature = 'S';
  const Agreement = 'A';
  
  static $values = array(
    self::Enquiry=>'Enquiry',
    self::Application=>'Application',
    self::PendingSignature=>'Pending Signature',
    self::Agreement=>'Agreement',
  );
}


