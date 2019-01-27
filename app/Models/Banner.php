<?php namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
  public $table = 'banner';
  protected $primaryKey = 'banner_id';
  public $timestamps = false;
  
  public function saveBanner($input) {
    $this->name = $input['name'];
    $this->stat = $input['stat'];
    $this->link_to = $input['link_to'];
    if ($this->link_to == 'Event') {
      $this->event_id = $input['event_id'];
    } else if ($this->link_to == 'Page') {
      $this->page_slug = $input['page_slug'];
    }
    if ($this->banner_id == null) {
      $this->image = "";
      $this->position = Banner::max("position") + 1;
    }
    $this->save();
    return $this->banner_id;
  }
  
}