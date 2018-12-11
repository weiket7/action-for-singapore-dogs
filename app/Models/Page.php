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
    $this->meta_desc = $input['meta_desc'];
    $this->content = $input['content'];
    $this->save();
    
    return $this->page_id;
  }
  
  public static function getContents() {
    $raw_contents = Page::where('type', 'C')->get();
    $contents = [];
    foreach($raw_contents as $d) {
      $contents[$d->title] = $d->content;
    }
    return $contents;
  }
  
}