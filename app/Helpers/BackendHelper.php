<?php namespace App\Helpers;

use DateTime;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class BackendHelper {
  public static function processInput($input) {
    foreach($input as $key => $value) {
      if ($input[$key] == "null") {
        $input[$key] = null;
      }
    }
    return $input;
  }

  public static function isDateTime($dateTime) {
      return DateTime::createFromFormat('Y-m-d H:i:s', $dateTime);
  }
  
  public static function uploadImage($folder, $name, $image) {
    if (App::environment('local')) {
      $base_path = $_SERVER['DOCUMENT_ROOT'] . "/action-for-singapore-dogs/public/assets/images/";
    } else {
      $base_path = $_SERVER['DOCUMENT_ROOT'] . "/public/assets/images/";
    }
    
    $destination_path = $base_path . $folder . "/";
    $file_name = str_slug($name).'.'.$image->getClientOriginalExtension();
    $image->move($destination_path, $file_name);
    return $file_name;
  }
  
  public static function getBrowser() {
    //https://www.php.net/manual/en/function.get-browser.php
    //comment by Zed
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    if(empty($user_agent)) {
      return array('nav' => 'NC', 'name' => 'NC', 'version' => 'NC');
    }
  
    $content_nav['name'] = 'Unknown';
  
    if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) {
    
      $content_nav['name'] = 'Opera';
    
      if (strpos($user_agent, 'OPR/')) {
        $content_nav['real_name'] = 'OPR/';
      } else {
        $content_nav['real_name'] = 'Opera';
      }
    
    }
    elseif (strpos($user_agent, 'Edge')) {
      $content_nav['name'] = $content_nav['real_name'] = 'Edge';
    }
    elseif (strpos($user_agent, 'Chrome')) $content_nav['name'] = $content_nav['real_name'] = 'Chrome';
    elseif (strpos($user_agent, 'Safari')) $content_nav['name'] = $content_nav['real_name'] = 'Safari';
    elseif (strpos($user_agent, 'Firefox')) $content_nav['name'] = $content_nav['real_name'] = 'Firefox';
    elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7') || strpos($user_agent, 'Trident/7.0; rv:')) {
      $content_nav['name'] = 'Internet Explorer';
    
      if (strpos($user_agent, 'Trident/7.0; rv:')) {
        $content_nav['real_name'] = 'Trident/7.0; rv:';
      } elseif (strpos($user_agent, 'Trident/7')) {
        $content_nav['real_name'] = 'Trident/7';
      } else {
        $content_nav['real_name'] = 'Opera';
      }
    
    }
  
    $pattern = '#' . $content_nav['real_name'] . '\/*([0-9\.]*)#';
  
    $matches = array();
  
    if(preg_match($pattern, $user_agent, $matches)) {
      $content_nav['version'] = $matches[1];
      return "Name=".$content_nav["name"].", Real Name=".$content_nav["real_name"].", Version=".$content_nav["version"];
      //return $content_nav;
    }
  
    return "Name=".$content_nav["name"].", Version=Inconnu";
    //return array('name' => $content_nav['name'], 'version' => 'Inconnu');
  }
}