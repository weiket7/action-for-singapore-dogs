<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TestimonialTable extends Migration
{
  public function up()
  {
    Schema::create('testimonial', function (Blueprint $table) {
      $table->increments('testimonial_id');
      $table->string('dog_name', 100);
      $table->string('image', 100);
      $table->string('quote', 500);
      $table->string('content', 500);
    });
    
    DB::table('testimonial')->insert([
      'dog_name'=>'Osho',
      'image'=>'osho.jpg',
      'quote'=>'I was very pleased with the service. Osho liked the Care Counsellor on sight so it was a good start. I think he was well looked after as he came back very happy with no battle scars, unlike a previous bad encounter.',
      'content'=>"Handsome and super friendly Osho came to stay with us over the Chinese New Year period and was showered with lots of love and attention. He loves people and for them to give him chest rubs and massages ! You could tell he was very well loved and taken care of by his family. Here is what Osho’s owner, Vicki had to say :",
    ]);
    
    DB::table('testimonial')->insert([
      'dog_name'=>'Kelly',
      'image'=>'kelly.jpg',
      'quote'=>'I give a rating of 5/5 for the cleanliness of the place, 5/5 for the service level of the Care Counsellors, 5/5 for the cleanliness of my dog and a 5/5 for the relaxed state of my dog after returning home',
      'content'=>"Kelly is a beautiful petite local cross breed that was rescued from the Tuas area and was very fortunate to find a forever home with Pamela and her family within a week. When they have to travel, the natural choice was to have ASD look after their precious poochKelly has since grown into a healthy, happy and confident pooch who loves stomach rubs, basking in the sun and the company of people, especially those that rescued her! Here is what Kelly’s owner, Pamela, had to say:",
    ]);
    
  }
  
  public function down()
  {
    Schema::dropIfExists('testimonial');
  }
}
