<?php namespace App\Helpers;

use App\Models\Enums\BlogType;

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
  
  public static function blogImageFolder($blog_type) {
    if($blog_type == BlogType::DogsInNeed)
      return 'dogs-in-need';
    elseif($blog_type == BlogType::GoneToLovingHomes)
      return 'gone-to-good-homes';
    else
      return 'news-flash';
  }
  
}