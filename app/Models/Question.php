<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
  public $table = 'question';
  protected $primaryKey = 'question_id';
  public $timestamps = false;
  
  public function saveQuestion($input) {
    $this->is_header = $input['is_header'];
    $this->content = $input['content'];
    $this->save();
    return $this->question_id;
  }
  
}