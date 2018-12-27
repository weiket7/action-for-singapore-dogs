<?php namespace App\Helpers;

class ViewHelper
{
  public static function formatDateTime($date)
  {
    return date('d M Y, h:i a', strtotime($date));
  }
  
  public static function formatDate($date)
  {
    return date('d M Y', strtotime($date));
  }
  
  public static function limitContent($content, $limit) {
    $pos=strpos($content, ' ', $limit);
    return substr($content, 0, $pos);
  }
  
}