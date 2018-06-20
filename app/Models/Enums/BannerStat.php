<?php namespace App\Models\Enums;

abstract class BannerStat {
  const Active = 'A';
  const Inactive = 'I';
  
  static $values = array(
    self::Active=>'Active',
    self::Inactive=>'Inactive',
  );
}


