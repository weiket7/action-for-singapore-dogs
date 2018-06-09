<?php namespace App\Models\Enums;

abstract class PersonType {
  const Rescuer = 'R';
  const Foster = 'F';
  const Adopter = 'A';
  const Sponsor = 'S';
  const Volunteer = 'V';
  const Donator = 'D';
  
  static $values = array(
    self::Rescuer=>'Rescuer',
    self::Foster=>'Foster',
    self::Adopter=>'Adopter',
    self::Sponsor=>'Sponsor',
    self::Volunteer=>'Volunteer',
    self::Donator=>'Donator',
  );
}


