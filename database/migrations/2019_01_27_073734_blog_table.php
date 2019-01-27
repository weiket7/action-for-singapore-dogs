<?php

use App\Models\Enums\BlogType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlogTable extends Migration
{
  public function up()
  {
    Schema::create('blog', function (Blueprint $table) {
      $table->increments('blog_id');
      $table->char('type', 1);
      $table->string('title', 150);
      $table->string('slug', 150);
      $table->string('dog_name', 50)->nullable();
      $table->string('image', 50);
      $table->date('posted_on');
      $table->text('content');
    });
    
    DB::table('blog')->insert([
      'type'=>BlogType::News,
      'title'=>'"Our Singapore Heritage" FlashPay Cards',
      'slug'=>'our-singapore-heritage-flashpay-cards',
      'image'=>'ez-link-heritage-series.jpg',
      'posted_on'=>'2018-12-08',
      'content'=>'As a celebration of the Singapore Special and following the success of our inaugural Singapore Heritage Series of EZLink Cards, we are proud to present the Singapore Heritage Series of NETS FlashPay cards**!

For this series, we have 4 very limited edition designs of our rescued beautiful Singapore Specials at iconic bridges in Singapore.
Pre-order is now open! You can submit your order @ http://bit.ly/asdflashpay. Delivery / postage of orders will take place after 15 Dec. Each card cost only $18 and the sales proceeds will be used to support the work we do for the stray and abandoned furries. A complete set of the 4 designs in a specially designed presentation pack is also available at $88.

The jingle bells have started ringing and Christmas celebrations have began. While we are busy feasting and celebrating the holiday season with our loved ones, let’s not forget the plight of many stray and abandoned furries who do not even have a home to call their own.
We hope you will join us to share some of your holiday season cheer with these furries. Gift the card as a Christmas present to a loved ones or simply bring it along as you commute daily.

**The NETS FlashPay card is an all-in-one-card for your daily transport and retail needs. You can use it at the following locations:
(a) MRT, LRT, public buses, Comfort & CityCab and SMRT taxis;
(b) Food courts, convenience stores, supermarkets and selected hawker centres;
(c) ERP and CEPAS-compliant car park charges.'
    ]);
    
    DB::table('blog')->insert([
      'type'=>'I',
      'title'=>'Totally blind and cruelly abandoned, will Flora’s life disappear into the abyss of darkness?',
      'slug'=>'flora',
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
      'slug'=>'bertha',
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
