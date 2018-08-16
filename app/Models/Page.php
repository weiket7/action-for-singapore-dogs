<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Page extends Model
{
  public $table = 'page';
  protected $primaryKey = 'page_id';
  public $timestamps = false;
  
  public function savePage($input) {
    $this->title = $input['title'];
    $this->slug = str_slug($this->title);
    $this->meta_desc = $input['meta_desc'];
    $this->content = $input['content'];
    $this->save();
    
    return $this->page_id;
  }
  
}