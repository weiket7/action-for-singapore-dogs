<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
  public $table = 'testimonial';
  protected $primaryKey = 'testimonial_id';
  public $timestamps = false;
  
  public function saveTestimonial($input) {
    $this->dog_name = $input['dog_name'];
    $this->quote = $input['quote'];
    $this->content = $input['content'];
    $this->save();
    return $this->testimonial_id;
  }
  
}