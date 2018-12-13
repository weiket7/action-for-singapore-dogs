<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
  public $table = 'testimonial';
  protected $primaryKey = 'testimonial_id';
  public $timestamps = false;
  
  public function saveTestimonial($input) {
    $this->is_header = $input['is_header'];
    $this->content = $input['content'];
    $this->save();
    return $this->testimonial_id;
  }
  
}