<?php namespace App\Models\Enums;

abstract class AdoptionFormStat {
  const Initial = 'I';
  const Second = 'S';
  const Approved = 'A';
  
  static $values = array(
    self::Initial=>'Initial',
    self::Second=>'Second',
    self::Approved=>'Approved',
  );
}


