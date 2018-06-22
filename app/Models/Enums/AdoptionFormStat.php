<?php namespace App\Models\Enums;

abstract class AdoptionFormStat {
  const Initial = 'I';
  const Second = 'C';
  const Success = 'S';
  
  static $values = array(
    self::Initial=>'Initial',
    self::Second=>'Second',
    self::Success=>'Success',
  );
}


