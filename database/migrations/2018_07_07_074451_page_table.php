<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PageTable extends Migration
{
    public function up()
    {
      Schema::create('page', function (Blueprint $table) {
        $table->increments('page_id');
        $table->string('title', 50);
        $table->string('slug', 50)->nullable();
        $table->string('meta_desc', 10)->nullable();
        $table->text('content');
        $table->char('type', 1);
      });
      
      
      DB::statement(
      "INSERT INTO `page` (`type`, `title`, `slug`, `content`) VALUES
('C', 'Home Banner Title', 'home-banner-title', 'Singapore Specials Run 2018'),
('C', 'Home Banner Content', 'home-banner-content', 'The quadrennial Singapore Specials Run is back! This year’s run will be bigger, better and stronger! This Run hopes to put runners in the paw buddies’ paws as to their struggles in life, and with your support, to raise hope and funds to help more of these paw buddies. Proceeds will be channelled into helping the many that ASD has rescued and rehomed. Join us and run with us on 11.11.2018 from 4.00pm onwards at the Bishan-Ang Mo Kio Park and give our paw buddies your support!'),
('P', 'Who We Are', 'who-we-are', 'Action for Singapore Dogs (ASD) is a registered Charity and was established in December 2000 as a non-profit organization with the mission to improve the welfare of stray and abandoned dogs in Singapore with a strict no-kill policy.

We aim to fulfill our mission through various activities and programs including rescuing, fostering and re-homing of stray and abandoned dogs, advocating sterilization to control the stray population, responsible pet ownership and highlighting the virtues of our local dogs, the Singapore Special.

To date, we have rehomed over 3000 dogs and have about 150 dogs under our care. These dogs are housed at our Adoption & Rescue Centre and in foster homes.

All our work require tremendous amounts of monetary and manpower resources and we hope you can join us in giving these dogs a second chance at life, be it a donation, sponsorship, fostering or adopting or volunteering in the many different aspects of our work.
'),
('P', 'Adoption & Rescue Centre (ARC)', 'adoption-rescue-centre-arc', '
The ASD Adoption Rescue Centre is located in laid back Lim Chu Kang amidst a landscaping nursery.

Comprising 2 wings of kennels back to back, the ARC has a comfortable capacity of 54 dogs. One wing houses the sick and injured dogs while the other houses the happy and healthy puppies and dogs awaiting adoption

The layout of the ARC was envisioned with the physical and psychological well being of our canine residents, and deviates from the conventional face to face and cramped design of today’s kennel designs which optimises space but suffers the dog.

Here at ARC, instead of kennels, we have dormitories, which comprise of two kennels with a shared run area. Each dorm, which measures six meters by two meters, can comfortably house two to three dogs and encourages social interaction, play and excercise. And if they so wish, they can retire into their individual kennels to ponder over world peace.

Adequate ventilation of fresh air is provided for by the overhead fans while the anti slip tiled floors ensure our residents do not suffer from the harsh acidity and rough texture of cement floors. The tiled floors are also cleaner and are easier to clean. The residents are brought out for nature walks once a day by our loving caretakers to ensure they have mental and physcial excercise

This condusive environment will help to prepare our canine residents for a domesticated life with a loving family, so that they may adjust faster and adapt well to a social environment. As we say, a happy dog makes a happy family !
'),
('P', 'Media', 'media', 'Media'),
('P', 'Dog Listener Academy', 'dog-listener-academy', '<p>The love and joy that you can experience from your dog is uniquely special and cannot be described, only experienced. In order to have that fufilling relationship, your dog has to be nurtured and taught to live in harmony and happiness with his human pack, just like a child.</p><p>At the ASD Dog Listener Academy, we believe the best way to have an enriching life with your dog is through communication and cooperation, not conditioning nor coercion. Through our many years of rescue work, we have gained much experience handling and rehabilitating dogs of all types of personality from the highly dominant to the fearful withdrawn. Our goal is to ensure that your dog willingly and happily integrates into your family environment, and understands and cooperates with the social rules.</p><p>We do it without gimmicks and gadgets, and we expound a kind way to dog training. We don’t believe in choking or electrocuting your dog into submission or harsh punishment, but through strong leadership, positive reinforcement and kind correction, your dog will willingly cooperate with you.</p><p>While dogs have a basic set of behavioural traits, no two dogs are alike, and your dog, like yourself, will have his own unique personality traits and habits. As such, we treat each and every dog as a cherished individual.</p><p>Under the Dog Listener Academy, volunteers at the Adoption &amp; Rescue Centre&nbsp; are trained with this philosophy in mind and we conduct educational talks and presentations expounding the benefits of proper training to better understand your dog and to have&nbsp; that fulfilling relationship</p><p>For the&nbsp;Basic Obedience Foundation classes and consultations,&nbsp; we collaborate with a third party dog training school, The Dog Listener Consultancy (www.doglistenerconsultancy.com) who has the same vision and goals.</p><p>At the Basic Obedience Foundation classes and consultations, what diffentiates from the rest is that, on top of learning the basic obedience techniques, you will also learn and apply the all important foundation principles of Amichien (TM) Bonding that will anchor your relationship with your dog.<br><br>Special emphasis will also be placed on individually assessing your dog’s character as well as your relationship with him, and focus will be placed on the areas that will help strenghten your bond with your dog. Time will also be allocated at the end of the class to handle any individual questions or issues.</p><p>For all group courses signed up through the ASD website, The Dog Listener Consultancy will donate 50% of the course fees back to ASD.</p>'),
('P', 'Why Adopt A Dog', 'why-adopt-a-dog', '<p><strong>Cost</strong>&nbsp;<br>It is much cheaper to adopt a dog than to buy one. Versus paying anything from $500 to $2000 from the pet shops or breeders, adopting a dog from ASD only entails a token adoption fee and provides many more benefits. Please refer to the ASD Adoption Package here.&nbsp;<br><br><strong>Telling the truth&nbsp;</strong><br>We are non profit and our priority is the welfare and future of the dogs under our care, it is never about making the sale or about money. As such we are upfront about the character traits and health status of the dog, both good and bad. It is no point masking or hiding certain facts about the dog to accelerate the adoption process only for the new owners to find out about it later, and if they are not prepared for those traits, the dog’s life or future may be in jepordy.&nbsp;<br><br><strong>A Lifetime Of Support&nbsp;</strong><br>Unlike pet shops and breeders, we ‘don’t wash our hands clean once the deal is done’. ASD believes in keeping in contact with their adoptors even past the adoption stage and helping with any problems that may come at various stages.&nbsp;<br><br>However it should be emphasized that this does not provide an avenue for people to ‘try out’ the dog first. Adopting a dog is a lifetime commitment and should be treated seriously. Ultimately, the adoptor needs to have the mindset to work out whatever problems they may face, should there be any. Please refer to the ASD Adoption Package below.&nbsp;<br><br><strong>Low Maintenance&nbsp;</strong><br>Most of our dogs for adoption are cross breed dogs. They are hardy and low maintenace dogs who have been acclimatized to our high humidity and hot environment. They seldom have skin problems or any other genetic defects which are common with pedigree breeds.&nbsp;<br><br><strong>Greater Loyalty</strong>&nbsp;<br>All our dogs are rescued dogs who were either strays or have been abandoned. As a result of their hardship and suffering, most of them are deeply loyal and affectionate because they appreciate the second chance that they are given.</p>'),
('P', 'Adoption Procedure', 'adoption-procedure', '<p>1. From our website www.asdsingapore.com, browse the Dogs For Adoption section where pics of the dogs are posted together with their bio, and note down a few of the dogs you may be interested in.

2. A form will be emailed to you so we can have an idea of your experience and environment to provide a good match. An Adoption Counsellor will then be in touch shortly to discuss with you about your requirements or expectations and in turn give you more information on the dog’s behaviour traits and to highlight areas or aspects which may be pertinent to that dog.

3. A convenient time and date is then set for a non obligatory bonding session where you, the potential adoptor and at least another member of the household will be invited to visit the dog at our Centre or at the foster home. More bonding sessions can also be arranged if you require more time to assess the temperament of the dog.

4. You, the potential adopter then take some time (typically 1-3 days) to discuss with your family members and decide.

5. Should you, the potential adopter decide to adopt, you will come down to the Centre or the foster home to sign an Adoption Agreement and bring the dog back.&nbsp;<br><br>7. The conditions of the Adoption Agreement are:</p><ul><li>To allow home visits, roughly 2 weeks to 1 month after the adoption, the purpose of which is to see if any assistance can be rendered.</li><li>The dog also need to be licensed, vaccinated, microchipped and sterilized and ASD provides a mandatory, comprehensive, subsidized package here</li></ul>'),
('P', 'Adoption Package', 'adoption-package', 'What are the benefits of adopting a dog from ASD ?

<b>Low Adoption Fees</b>
ASD provides a comprehensive Adoption Package for all dogs adopted from ASD which consists of :
1 vaccination
1 microchipping procedure*
1 health checkup
1 sterilization procedure
For more details and benefits of the above procedures, please refer to the sections below. The health/medical procedures are done at reputable private vet clinics and usually at a nearby convenient location.
This package is also subsidized, costing significantly less than if a member of the public were to patronise the same clinic

<b>The cost of the Adoption Package is as:</b>
Male Local Cross Breed Dogs : $230
Female Local Cross Breed Dogs : $250**

Male Pedigree Dogs 3 years and below : $330
Female Pedigree Dogs 3 years and below : $350
Male Pedigree Dogs above 3 years but below 5 yrs : $280
Female Pedigree Dogs above 3 years but below 5 yrs  : $300
Male Pedigree Dogs 5 years and above : $230
Female Pedigree Dogs 5 years and above  : $250*
** The distinction in categories is to deter commercial abuse of pedigree dogs

<b>Project ADORE</b>
Project ADORE (ADOption and REhoming of dogs) is a scheme allowing HDB residents to own local cross breed dogs. It was initiated by ASD and the Society for Prevention of Cruelty to Animals (SPCA) ) in April 2012 and supported by the Ministry of National Development (MND), the Agri-Food & Veterinary Authority of Singapore (AVA) and Housing Development Board (HDB).
Only local cross breed dogs whose height do not exceed 50 cm and weighing not more than 15 kg qualify for this scheme. Puppies are not considered HDB-approved until they reach 6 months of age.

Under Project ADORE, the adopter needs to:
1. Sign an adoption agreement with ASD and pay an adoption fee ($230 for males and $250 for females) which covers 1 vaccination, microchipping and sterilization.
2. Obtain a dog licence for the adopted dog which costs $15 annually (ASD will apply on behalf of the adopter)
3. Sign a Code of Responsible Behavior (CORB)
4. Undergo compulsory Group Basic Obedience Training (at a cost of $250)

<b>Post Adoption Support</b>
ASD believes in keeping in contact with our adoptors even past the adoption stage. Adoptors are welcome to call or email about any problems they face at any time or day or simply call us to chat about their new family member! ASD will provide advice, tips and resources to help adoptors cope with the problems if there are any.

<b>Home Visits</b>
There will be a home visit about a month after the adoption to see if we can be of any assistance. The home visit also gives our experienced personnel an idea of the environment which may be the cause of some problems.

<b>Health Check</b>
All dogs put up for adoption are given a thorough check up by the vet. This includes a physical check of the heart, lungs, bone structure, and they are checked for tick fever and heartworm depending on their previous environment. The full health status of the dog will be told to potential adoptors regardless of whether they are good or bad or whether they can be physically seen. This ensures that the adoptor is fully aware of the condition of the dog when they adopt it.

<b>Subsidised, vaccination and sterilization</b>
Vaccination is mandatory to immunise the dog against fatal diseases, and puppies of 3 months and above need 3 shots one month apart. Thereafter, vaccination is done once a year.
Sterilization is mandatory and reduces significantly the risk of tumours and cancers from developing later in their lives. The procedure is a one time operation and relatively risk free. An unsterilized female dog has a 50% chance of having womb or breast cancer (these statistics have been scientifically proven) while an unsterilized male dog can contract testicular or prostate cancer.
The onset of these cancers or tumours usually occur when they reach middle age (5 years and above) and surgery then would have significant risk.

<b>Microchipping</b>
Microchipping is a painless method of implanting a small microchip in the dog’s neck that will give each dog an individual identification number. This ensures that should the dog be lost and is found by the various organizations or societies, they can be scanned to locate the owner thru this ID number.From 1st June 2004 microchipping will be included in the adoption package.

<b>Subsidized Basic Obedience Course</b>
Conducted by an approved professional trainer at a centralized location on weekends, the course consist of 6 sessions, each 1.5 hour session held on a weekend and limited to 6-10 dogs and their handlers. A home based program is also available.
'),
('P', 'Project Adore', 'project-adore', '<p>In the past, if you were living in a HDB flat and wanted to own a local cross breed dog (Singapore Special), it would not have been possible. Since about 80% of the Singapore population lived in HDB flats, we knew this was an obstacle we had to overcome. So ASD, together with SPCA, embarked on a rehoming project called Project ADORE (ADOption and REhoming of dogs), which is a scheme permitting HDB residents to own local cross breed dogs.&nbsp;<br><br>Project ADORE kicked off in April 2012 as a pilot project and due to its success, was formalised in Parliament on 28 May 2014. As at 31 Dec 2015, ASD had successfully rehomed 192 dogs under this scheme.&nbsp;<br><br>To be approved under Project ADORE, a dog must be at least 7 months old, not more than 50 cm in height (from the shoulder to the ground) and under 15 kg in weight.&nbsp;<br><br>This campaign is aimed at supporting our rescues from the time they are about 2 months old until they are 7 months old. This means we have to support each of these puppies for at least five months.&nbsp;<br><br>Sure, sometimes dogs under this scheme are rescued when they are older and are rehomed within weeks or a couple of months. But sometimes, some of them stay with us for years.&nbsp;<br><br>A conservative estimate of maintaining a rescued dog at a shelter is $200 per month. This includes the basic necessities of food, boarding, and tick, flea and heartworm prevention.&nbsp;<br><br>We hope to rehome many more dogs under Project ADORE in 2016. Raising additional funds for this today would mean we could support more rescues and not have to worry about drawing funds away from the estimated 150 dogs we currently maintain.</p>'),
('P', 'Gone to Loving Homes', 'gone-to-loving-homes', 'Gone to Loving Homes'),
('P', 'Frequently Asked Questions', 'frequently-asked-questions', 'Frequently Asked Questions'),

('C', 'Home Adopt', '', 'Home Adopt At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis um voluptatum deleniti atque'),
('C', 'Home Donate', '', 'Home Donate At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis um voluptatum deleniti atque'),
('C', 'Home Volunteer', '', 'Home Volunteer At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis um voluptatum deleniti atque'),
('C', 'Home Rescue', '', 'Home RescueAt vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis um voluptatum deleniti atque'),
('C', 'Home Rehabilitate', '', 'Home Rehabilitate At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis um voluptatum deleniti atque'),
('C', 'Home Rehome', '', 'Home Rehome At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis um voluptatum deleniti atque'),
('C', 'Volunteer Content', '', 'Ever seen homeless, abused, neglected, abandoned animals looking at you with dispair and resignation in their eyes ? Ever felt helpless and inadequate and wishing you could do something about it ? You can ! We may not be the richest or cleverest people in the world, but every little thing we do for these critters makes a world of difference to them. As a volunteer, we can make a difference between life and death for these critters. We may not solve the animal overpopulation problem overnight, but if each of us do our small part, we can make a tremendous difference.

We have a variety of activities and duties and we are constantly in need of volunteers. If you have the heart and the will to do something for these animals, please click on any of the activities below to learn more about what the duties entail. And if you feel you can commit to them, simply enter your details and we will get in touch with you

If you wish to do a project for your CIP or VIA, you can help us raise awareness through the sale of our merchandise at your school. Ask your teacher for permission to set up a small table with our consigned merchandise and be an ambassador to your peers. Please email us at info@asdsingapore.com'),
('C', 'Volunteer Rescuing', '', ''),
('C', 'Volunteer Rehoming', '', ''),
('C', 'Volunteer Fostering', '', 'Being a foster parent involves caring for and nurturing a puppy or dog for a minimum period of 1 month in your home. During this time, foster parents need to feed the dog regularly with nutritious food and report symptoms of illness or behavioural problems.

Foster parents should also help in domesticating the dog, in terms of paper training him/her, teaching him/her not to bark excessively and not to chew on things. There should also be plenty of interaction with him/her so that he/she is people and dog friendly.

Foster parents need to have a patient, forgiving and tolerant attitude. Common challenges posed by the dog include urinating and defecating at many spots, barking excessively, whining at night, biting or chewing on shoes, slippers, the legs of tables and chairs.

The dog may also be shy and nervous around people. If you do not have experience in domesticating a dog, we will guide you along the way. Medical aid or necessary aid of sorts will be provided by ASD and foster parents need to notify ASD of the dog’s needs.

If the foster parent feels that they can no longer foster the dog, a week’s notice must be given to ASD. If you want to help the homeless strays out there, this is one of the best and noblest ways. Not only will you be shaping the dog’s character and increasing his/her chance of being rehomed, you will also be giving him/her a lifeline.

The choice of dog to be fostered will be at the discretion of ASD and details of the dog will be furnished when you are contacted.

PLEASE CHECK WITH THE PEOPLE IN YOUR HOUSEHOLD FOR APPROVAL TO FOSTER A DOG FIRST AND PLEASE BE CLEAR ABOUT THE TERMS AND CONDITIONS ABOVE. ONLY ENTER YOUR DETAILS WHEN YOU ARE ABSOLUTELY SURE YOU ARE ABLE TO FUFIL THE ABOVE REQUIREMENTS
'),
('C', 'Volunteer Volunteer', '', 'Volunteers who wish to help out at our Adoption & Rescue Centre will have to attend a compulsory training program which last 3 consecutive weeks, every Saturday from 11:30am to 2:00pm.

Chores and tasks include:
1.	Scrubbing the dormitories
2.	Picking up poo (lots of it!) and cleaning up pee (lots of it!)
3.	Show potential adopters and visitors around the facility
4.	Socialising and training dogs
5.	Interacting with and walking dogs
6.	Maintenance chores to ensure that the ARC operates efficiently and effectively

Volunteers should be at least 21 years old and not be afraid of hard work or large and boisterous dogs.

ASD will not be responsible or liable for any incidents at the Adoption & Rescue Centre.
'),
('C', 'Volunteer Fund Raising', '', 'Being self funded and totally reliant on the support of the public and ourselves, we need to constantly organize events, come up with new merchandise that can generate revenue for our rescue, rehoming, medical and sterilization efforts.

<b>Event Organizers</b>
A fund raising volunteer will brainstorm and work in a committee setup to handle an upcoming event. New and innovative ideas need to be constantly thought of to sustain the fund raising drive. The planning, organization, logistics and operational aspects of the event need to be handled and delegated such that the event runs smoothly.

The amount of time and effort needed varies depending on the type of event but generally it intensifies from around 2 weeks before the event date.

Some of the events that we have done include a dog obedience course, an animal behaviourist cum vet talk, a major adoption drive with other animal welfare organizations and we have more planned for the year. Our target is at least 2 ASD organized events a year.

<b>Artists</b>
We are always on the lookout for the creative people who want to help the doggies in a special way. If you are a person who is gifted artistically, we welcome your designs which can be used to grace our ASD Tees, or any other product. The satisfaction come from the many people who buy our merchandise and use them to broadcast our message of kindness to animals.'),
('C', 'Volunteer Publicity', '', 'The ASD website and social media are the central pillars of information dessimination to the public with regard to the needs of the strays and other activities.

These platforms need to be updated frequently with news of new adoptables, our events, happy stories, knowledge related to our furry friends and can be further expanded to encompass more areas of information about animal welfare.

<b>Writers</b>
If you have the ability to write well and have the passion and the conviction to write about these beautiful creatures, be their voice and join us as writers. You will write about their happy tails, their needs, post or write dog related articles and about events that we have participated.
'),
('C', 'Volunteer Logistics', '', 'In order to facilitate the daily operations of ASD, we need volunteers who can help with transportation of dogs to the vet clinics and dog food to foster homes.
These are important roles without which ASD cannot function.
');"
      );
    }

    public function down()
    {
      Schema::dropIfExists('page');
    }
}
