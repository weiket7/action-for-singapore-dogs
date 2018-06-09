<?php namespace App\Models\Enums;

abstract class VolunteerStat {
  const Potential = 'P';
  const Active = 'A';
  const Inactive = 'I';
  
  static $values = array(
    self::Potential=>'Potential',
    self::Active=>'Active',
    self::Inactive=>'Inactive',
  );
}


