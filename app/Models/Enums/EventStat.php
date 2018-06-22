<?php namespace App\Models\Enums;

abstract class EventStat {
  const Active = 'A';
  const Inactive = 'I';
  
  static $values = array(
    self::Active=>'Active',
    self::Inactive=>'Inactive',
  );
}


