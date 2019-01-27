<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlogTable extends Migration
{
  public function up()
  {
    Schema::create('blog', function (Blueprint $table) {
      $table->increments('id');
      $table->char('type', 1);
      $table->string('title', 150);
      $table->string('dog_name', 50);
      $table->string('image', 50);
      $table->dateTime('posted_on');
      $table->text('content');
    });
    
    DB::table('blog')->insert([
      'type'=>'I',
      'title'=>'Totally blind and cruelly abandoned, will Flora’s life disappear into the abyss of darkness?',
      'dog_name'=>'Flora',
      'image'=>'flora.jpg',
      'posted_on'=>'2010-02-15',
      'content'=>'Totally blind and cruelly abandoned, will Flora’s life disappear into the abyss of darkness ?

My world is shaped by you, and by your love, I live, love and die. I am totally dependent on you for food, water, shelter, health and love and through my unconditional love, I hope that you will care and love me as one of your own, just as I have and always will love you. In my prime, I am the joy of your life, you pamper me and loving me was so easy, but as life takes its toll, and my world closes in on me, please do not forsake me, for my world has become a dark and frightening one …

If we can hear their thoughts, this will be the plea and prayer of every dog, as we humans play God and decide how their lives will pan out. And fate was not kind to this tiny little pomeranian we named Flora. A lady had called us horrified to have witnessed a car slowing down along St Michael’s Road, and the occupants opening the door and heartlessly throwing poor little Flora out!

She could not believe her eyes and in her state of shock could only watch as Flora stumbled blindly in a confused state, panicked and shocked by the roar of traffic and the sudden turn of events . It was moments after she composed herself that she scooped Flora to safety and realized that she was totally blind as both her eyes were opaque, overwhelmed by glaucoma

',
    ]);
    
    DB::table('blog')->insert([
      'type'=>'I',
      'title'=>'Constantly darting and dodging the thundering lorries and trucks that stop for nothing',
      'dog_name'=>'Bertha',
      'image'=>'bertha.jpg',
      'posted_on'=>'2012-05-29',
      'content'=>'Constantly darting and dodging the thundering lorries and trucks that stop for nothing, has Bertha finally reached the end of her road ?

A large and dangerous carpark at the junction of Brickland Road and Jalan Lam Sam was what Bertha called home.

Constantly darting and dodging the thundering lorries and trucks that stop for nothing, three year old Bertha’s luck finally ran out.

A stray feeder found her late one Saturday night in May, unable to move, as both her hind legs had sustained serious injuries. One of the paws was a mangled mess. It was torn open and bleeding profusely while her other leg had serious abrasions and had most part of the skin ripped off.

She had to undergo an operation to have the bone in one of the paws removed as it was crushed to fragments.

Despite her pain and hardship, Bertha has a really sweet and gentle disposition. We were worried about having to change her dressing daily, in case she reacted with aggression but she bravely endured the ordeal and only flinched slightly when we flushed and clean her open wounds.

Her wounds do not seem to be healing well and although worried, we take comfort in the fact that she is finally safe and that food and shelter are now the least of her worries. The young mother also has her six month old daughter at the ARC to keep her company.

Bertha was adopted in July 2011. She is now known as Daisy, here she is with Java. She looks the picture of health and very happy.',
    ]);
  }
  
  public function down()
  {
    Schema::dropIfExists('blog');
  }
}
