<?php namespace App\Models\Enums;

abstract class EventType {
  const AdoptionDrive = 'A';
  const BasicObedienceClass = 'B';
  const Others = 'O';
  
  static $values = array(
    self::AdoptionDrive=>'Adoption Drive',
    self::BasicObedienceClass=>'Basic Obedience Class',
    self::Others=>'Others',
  );
}


