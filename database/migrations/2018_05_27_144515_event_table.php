<?php

use App\Models\Enums\EventStat;
use App\Models\Enums\EventType;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventTable extends Migration
{
  public function up()
  {
    Schema::create('event', function (Blueprint $table) {
      $table->increments('event_id');
      $table->char('type', 1);
      $table->string('name', 50);
      $table->string('slug', 100);
      $table->string('meta_desc', 100)->nullable();
      $table->string('location', 100);
      $table->date('date');
      $table->string('time', 50);
      $table->string('image', 50)->nullable();
      $table->string('cost', 50)->nullable();
      $table->string('duration', 50)->nullable();
      $table->text('desc')->nullable();
    });
    
    $data = [
      ['name'=>'Basic Obedience Class', 'slug'=>'basic-obedience-class-2', 'location'=>"Bishan Park II", 'date'=>Carbon::now()->subDay(3), 'time'=>'4.30 pm to 6.00pm (1.5hrs)', 'cost'=>"350",
        'duration'=>"6 weeks, every Sunday", 'type'=>EventType::BasicObedienceClass,
        'desc'=>'Our Basic Obedience Foundation Class incorporate the Amichien Bonding (TM) principles which are the foundation of your relationship with your dog. You will also learn effective techniques of communication together with Basic Obedience exercises which will be your tools for communication.'],
      ['name'=>'Basic Obedience Class', 'slug'=>'basic-obedience-class-1', 'location'=>"Bishan Park II", 'date'=>Carbon::now()->addDay(3), 'time'=>'4.30 pm to 6.00pm (1.5hrs)', 'cost'=>"350",
        'duration'=>"6 weeks, every Sunday", 'type'=>EventType::BasicObedienceClass,
        'desc'=>'Our Basic Obedience Foundation Class incorporate the Amichien Bonding (TM) principles which are the foundation of your relationship with your dog. You will also learn effective techniques of communication together with Basic Obedience exercises which will be your tools for communication.'],
      ['name'=>'Basic Obedience Class', 'slug'=>'basic-obedience-class-2', 'location'=>"Bishan Park II", 'date'=>Carbon::now()->addDay(6), 'time'=>'4.30 pm to 6.00pm (1.5hrs)', 'cost'=>"350",
        'duration'=>"6 weeks, every Sunday", 'type'=>EventType::BasicObedienceClass,
        'desc'=>'Our Basic Obedience Foundation Class incorporate the Amichien Bonding (TM) principles which are the foundation of your relationship with your dog. You will also learn effective techniques of communication together with Basic Obedience exercises which will be your tools for communication.'],
      ['name'=>'Jazz For Dogs Concert At the Botanic Gardens', 'slug'=>'Jazz-For-Dogs-Concert-At-the-Botanic-Gardens', 'location'=>"Shaw Foundation Symphony Stage, Singapore Botanic Gardens", 'date'=>'2017-10-29', 'time'=>'5-7.30pm',
        'image'=>"jazz-for-dogs.jpg", 'type'=>EventType::AdoptionDrive,
        'desc'=>"What do dogs and jazz have in common? They have soul and depths of it ! Join us as some of Singapore’s top jazz musicians come together to raise awareness of the plight of the stray and abandoned dogs which still number about 8000.
<br>
To defray the cost of the event, picnic baskets laden with wine, food and other fantastic goodies will be pre sold to complement this wonderful event where you can bring your family and dogs and enjoy this evening of love, joy and song.
<br>
The proceeds will also be used to defray the soaring costs of medical expenses for the 150+ dogs under our care.
<br>
So do join us as a community of animal lovers, of nature, of kindness, of compassion, of all things good and make your presence felt at this momentous event !
<br>
There is also an early bird special for those that sign up early. We don’t want to reveal too much for now, but we can let on that it will be worth at least $80 !
<br>
To purchase this picnic basket which cost $88, and is good for 2 people, please send us an email with the details below. For your beloved fur-kid delicious fresh made food can be purchased at an additional $10 per dog.
<br>
You can order your Picnic Basket and doggie meal online at https://goo.gl/forms/oU1X65i8ldLSttkG3
<br>
Payment can be made via cheque or electronic transfer
<br>
<b>By Cheque</b>
The cheque should be made payable to: Action For Singapore Dogs Society
<br>
and sent to:
ASD c/o Ricky Yeo
3 Jambol Place, Singapore 119330
<br>
<b>By Funds Transfer</b>
Bank: OCBC
Account No: 650322456001
Account Name: Action For Singapore Dogs Society
Branch Code: 650
Bank Code: 7339
Please indicate participant’s name and the code JFD in the comments field
<br>
We will reply with a email receipt once we have received your payment and this email will serve as proof of purchase to collect your picnic basket at the event on the day itself"
    ],
    ['name'=>'ASD A-Dog-Tion Drive', 'slug'=>'asd-a-dog-tion-drive-2018-09-03', 'location'=>"Fountain Plaza, Quayside Isle@Sentosa Cove on 1 July", 'date'=>'2018-09-03', 'time'=>'12pm-4pm',
      'image'=>"adoption-drive.jpg", 'type'=>EventType::AdoptionDrive,
      'desc'=>'Bring out your shades and your sunscreen and head on down to Sentosa on 1 July for our next adoption drive where you will meet a variety of puppies and HDB-approved local cross breed adults!
Our team of Adoption Counsellors will be there to assist you in finding the right companion for your family and there will also be a range of merchandise – including limited edition Singapore Heritage EZ link cards – on sale.'],
      ['name'=>'Singapore Specials Run \'18', 'slug'=>'singapore-specials-run-18', 'location'=>"Activity Lawn, Bishan-Ang Mo Kio Park", 'date'=>'2018-11-11', 'time'=>'4pm',
        'image'=>"singapore-specials-run-18.jpg", 'type'=>EventType::AdoptionDrive,
        'desc'=>'<h3>What is the Singapore Specials Run?</h3>
The Singapore Specials Run, first started in 2010, aims to raise awareness about the plight of the stray and abandoned dogs, who daily traverse long distances under the scorching heat and pouring rain in search of food, shelter and ultimately a home.
<br><br>
The Run hopes to put runners in their paws as to their struggle in life, and with their support to raise hope and funds to help more of these dogs.
<br><br>
Proceeds will be channelled into helping the many that we have rescued and residing at our shelter and foster homes, while awaiting their forever home.
<br><br>
<h3>Who will be at the run?</h3>
We have 2 categories of run for the event – the Paw & Buddy Run (2km) and the Paw Lover Run (5km). We need all your kind support, human or dogs alike, to join us for the activities filled event of the year!
<br>
<h3>Categories and Fees</h3>
<br><br>
Paw Lover Run
(5km human only run)
$45.00 (early bird)
$55.00
<br><br>
Paw & Buddy Run
(2km for 1 human and 1 paw friend)
$55.00 (early bird)
$65.00
<br><br>
Paw & Buddy Run
(2km for every additional human runners)
$45.00 (early bird)
$55.00
<br><br>
Early bird signup ends 15 September 2018 7 October 2018 (extended). Each Paw & Buddy Race signup allows you to bring along one dog for the race.
<br><br>
<h3>Payment Options</h3>
<b>Pay Now</b>
<br>Transfer via pay now to ASD’s corporate account: T02SS0132E	Bank: OCBC
<br><br>
<b>Bank Transfer</b>
<br>Account No: 650322456001
<br>Account Name: Action For Singapore Dogs Society
<br>Branch Code: 650
Bank Code: 7339
<br><br>
<b>Cheque</b>
<br>Payable to: Action For Singapore Dogs Society
<br>Mailing Address:
<br>ASD c/o Ricky Yeo
<br>3 Jambol Place, Singapore 119330
If you have made a bank transfer or a Pay Now transaction, kindly provide us the reference number here during registration.
<br><br>
We will reply with a email receipt once we have received your payment and this email will serve as proof of your purchase.
<br><br>
<h3>What’s in the Race Pack ?</h3>
We have a whole load of goodies packed in our race pack. So do not wait and register your interest in our Singapore Specials Run ’18.
<br><br>
<br>1. A Limited Edition Tote Bag
<br>2. A Limited Dri fit Race Tee
<br>3. Race Bib
<br>4. Bandana (for the Paw Buddy Race only)

<b>Goodies from all our sponsors !</b>
<br>Pet Lovers Centre
<br>Reinbiotech (distributor of Barking Heads)
<br>The Barkery
<br>Real Yoga
<br>Club Pets
<br>Volvo
<br>And more are coming in!
<br><br>
<b>Sponsorship</b>
Reasons to Partner US
It’s about doing GOOD.
Be part of history – It’s a race like no other. Singapore Specials Run is a race where participants run alongside with about 500 dogs of various breeds in support of our Singapore Specials. Support ASD’s goal to raise awareness and integrate our Singapore Specials through sports and recreational activities.
<br><br>
If you believe your brand is a good fit and would like to discuss sponsorship opportunities please email us at ssr@asdsingapore.com.
        '],
  
      ['name'=>'ASD A-Dog-Tion Drive', 'slug'=>'asd-a-dog-tion-drive-2018-11-25', 'location'=>"RedDot BrewHouse @ Dempsey", 'date'=>'2018-11-25', 'time'=>'12pm-4pm',
        'image'=>"RedDot-Adoption-Drive-2.jpg", 'type'=>EventType::AdoptionDrive,
        'desc'=>'Mark your calendars for our upcoming aDOGtion drive on 25 November at RedDot BrewHouse @ Dempsey!
<br>
If you’ve been thinking of bringing a canine companion home, please drop by our adoption drive to find out more. Many of our lovable furbabies will be there to meet and mingle with you.
<br>
Venue: RedDot BrewHouse @ Dempsey
Address: 25A Dempsey Road #01-01, Singapore 247691
Time: 12 noon to 4pm
<br>
Please tag your friends and family who might be keen, and don’t forget to share to spread the word!'
      ]
    ];
      
      foreach($data as $d) {
        DB::table('event')->insert($d);
      }
    }
  
  public function down()
  {
    Schema::dropIfExists('event');
  }
}
