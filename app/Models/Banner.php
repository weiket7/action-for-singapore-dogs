<?php namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
  public $table = 'banner';
  protected $primaryKey = 'banner_id';
  public $timestamps = false;
  
  public function saveBanner($input) {
    $this->image = $input['image'];
    $this->url = $input['url'];
    $this->save();
    return $this->banner_id;
  }
  
}