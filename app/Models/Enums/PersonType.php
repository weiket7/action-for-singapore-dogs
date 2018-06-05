<?php namespace App\Models\Enums;

abstract class PersonType {
  const Rescuer = 'R';
  const Foster = 'F';
  const Adopter = 'A';
  
  static $values = array(
    self::Rescuer=>'Rescuer',
    self::Foster=>'Foster',
    self::Adopter=>'Adopter',
  );
}


