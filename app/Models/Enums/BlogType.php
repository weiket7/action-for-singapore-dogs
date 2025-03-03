<?php namespace App\Models\Enums;

abstract class BlogType {
  const News = 'N';
  const InLovingMemory = 'I';
  const GoneToLovingHomes = 'G';
  
  static $values = array(
    self::News=>'News',
    self::InLovingMemory=>'In Loving Memory',
    self::GoneToLovingHomes=>'Gone to Loving Homes',
  );
}


