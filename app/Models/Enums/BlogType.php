<?php namespace App\Models\Enums;

abstract class BlogType {
  const News = 'N';
  const DogsInNeed = 'I';
  const GoneToLovingHomes = 'G';
  
  static $values = array(
    self::News=>'News',
    self::DogsInNeed=>'Dogs In Need',
    self::GoneToLovingHomes=>'Gone To Loving Homes',
  );
}


