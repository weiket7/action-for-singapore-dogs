<?php namespace App\Models\Enums;

abstract class PersonStat {
  const Active = 'A';
  const Inactive = 'I';
  const Blacklisted = 'B';
  
  static $values = array(
    self::Active=>'Active',
    self::Inactive=>'Inactive',
    self::Blacklisted=>'Blacklisted',
  );
}


