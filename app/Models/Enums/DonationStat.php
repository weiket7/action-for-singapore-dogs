<?php namespace App\Models\Enums;

abstract class DonationStat {
  const Pending = 'P';
  const Received = 'R';
  
  static $values = array(
    self::Pending=>'Pending',
    self::Received=>'Received',
  );
}

