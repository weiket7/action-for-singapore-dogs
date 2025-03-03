<?php namespace App\Models\Enums;

abstract class AdoptStat
{
    const Available = 'A';
    const LongTermFostering = 'F';
    const Adopted = 'D';
    const PassedAway = 'P';
    const UnavailableHealth = 'H';
    const UnavailableTemperament = 'T';
    const Sponsor = 'S';
  
    public static $values = array(
      self::Available=>'Available',
      self::LongTermFostering=>'Long Term Fostering',
      self::Adopted=>'Adopted',
      self::PassedAway=>'Passed Away',
      self::UnavailableHealth=>'Unavailable (Health)',
      self::UnavailableTemperament=>'Unavailable (Temperament)',
      self::Sponsor=>'Sponsor',
    );
}
