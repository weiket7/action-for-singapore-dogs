<?php namespace App\Models\Enums;

abstract class AdoptStat {
  const Available = 'A';
  const Adopted = 'D';
  const Hidden = 'H';
  
  static $values = array(
    self::Available=>'Available',
    self::Adopted=>'Adopted',
    self::Hidden=>'Hidden',
  );
}


