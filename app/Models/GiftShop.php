<?php namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class GiftShop extends Model
{
  public $table = 'gift_shop';
  protected $primaryKey = 'gift_shop_id';
  public $timestamps = false;
  
  public function saveGiftShop($input) {
    $this->name = $input['name'];
    $this->stat = $input['stat'];
    $this->link_to = $input['link_to'];
    if ($this->link_to == 'Event') {
      $this->event_id = $input['event_id'];
    } else {
      $this->page_slug = $input['page_slug'];
    }
    if ($this->gift_shop_id == null) {
      $this->image = "";
      $this->position = Banner::max("position") + 1;
    }
    $this->save();
    return $this->gift_shop_id;
  }
  
}