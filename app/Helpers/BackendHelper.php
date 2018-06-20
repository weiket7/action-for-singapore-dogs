<?php namespace App\Helpers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class BackendHelper {
  public static function uploadImage($folder, $name, $image) {
    Log::info($image);
    if (App::environment('local')) {
      $base_path = $_SERVER['DOCUMENT_ROOT'] . "/asd/assets/images/";
    } else {
      $base_path = $_SERVER['DOCUMENT_ROOT'] . "/assets/images/";
    }
    
    $destination_path = $base_path . $folder . "/";
    $file_name = str_slug($name).'.'.$image->getClientOriginalExtension();
    $image->move($destination_path, $file_name);
    return $file_name;
  }
}