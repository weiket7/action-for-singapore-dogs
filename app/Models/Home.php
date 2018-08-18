<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Home extends Model
{
  public $table = 'home';
  public $timestamps = false;
  
  public function saveHome($input) {
    $this->show = $input['show'];
    $this->title = $input['title'];
    $this->slug = str_slug($this->title);
    $this->meta_desc = $input['meta_desc'];
    $this->content = $input['content'];
    if ($input['show'] == 'E') {
      $this->event_id = $input['event_id'];
    }
    $this->save();
    
    return $this->page_id;
  }
  
}