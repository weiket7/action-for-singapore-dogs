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
('C', 'Home Banner Title', 'home-banner-title', 'Action for Singapore Dogs'),
('C', 'Home Banner Content', 'home-banner-content', 'Action for Singapore Dogs (ASD) is a registered Charity and was established in December 2000 as a non-profit organization with the mission to improve the welfare of stray and abandoned dogs in Singapore with a strict no-kill policy.

We aim to fulfill our mission through various activities and programs including rescuing, fostering and re-homing of stray and abandoned dogs, advocating sterilization to control the stray population, responsible pet ownership and highlighting the virtues of our local dogs, the Singapore Specials.'),
('P', 'Who We Are', 'who-we-are', 'Action for Singapore Dogs (ASD) is a registered Charity and was established in December 2000 as a non-profit organization with the mission to improve the welfare of stray and abandoned dogs in Singapore with a strict no-kill policy.

We aim to fulfill our mission through various activities and programs including rescuing, fostering and re-homing of stray and abandoned dogs, advocating sterilization to control the stray population, responsible pet ownership and highlighting the virtues of our local dogs, the Singapore Specials.

To date, we have rehomed over 3000 dogs and have about 150 dogs under our care. These dogs are housed at our Adoption & Rescue Centre and in foster homes.

All our work require tremendous amounts of monetary and manpower resources and we hope you can join us in giving these dogs a second chance at life, be it a donation, sponsorship, fostering or adopting or volunteering in the many different aspects of our work.
'),
('P', 'Adoption & Rescue Centre (ARC)', 'adoption-rescue-centre-arc', 'With ASD rapidly progressing to a larger scale of rescue and re-homing in the earlier years, the initial reliance on a network of foster parents became a challenge, both in terms of scarcity and stability and so the ASD Adoption & Rescue Centre (ARC) was established in June 2007 to provide a safe and stable sanctuary for the many sick and injured dogs to recover fully before finding their forever home. The ARC currently houses 100 dogs.

Running and maintaining the ARC requires a tremendous amount of resources from food, medication, equipment, etc and every little bit counts. Here are some of the ways you can help
'),
('P', 'Media', 'media', 'Media'),
('C', 'Dog Listener Academy', 'dog-listener-academy', 'Dog training is a critical and integral part of the a wholistic approach to the mission and objectives of ASD. When a dog is first rescued, there could be behavioural issues which needs to be identified and managed through rehabilitation or behaviour modification. This approach ensures that potential adopters are fully aware of the character traits of the dog they are interested in and are prepared mentally and physically.

Under the ASD Dog Listener Academy, volunteers at the Adoption & Rescue Centre  are trained with this philosophy in mind, from teaching the dog proper social behaviour to learning how to walk them properly, with the goal of getting them adopted quickly and easily once they are well adapted and adjusted to a domestic environment. Shy, introverted or dogs that do not adapt well to a kennel environment are progressively housed at the Trainer’s home for rehabilitation and socialization in a partnership with the Dog Listener Consultancy.

The benefits of a well trained dog is many fold, and it greatly reduces the rate of returns as well, as the new owners now feel they have the post adoption support that is crucial to ensuring the dog settles quickly and well into their new home and owners understand their dog''s behaviour and are now equipped to handle the issues.

Educational talks and presentations expounding the benefits of proper training are also conducted so that people can better understand and communicate with their dog.

Adopters also have the option to sign up for dog training classes and consultations, of which ASD refers to an external party, Dog Listener Consultancy (<a href=''http://www.doglistenerconsult.com'' target=''blank''>www.doglistenerconsult.com</a>). The Principal Director and Trainer is Ricky Yeo, the current president and founder of ASD.

For all group courses signed up through the ASD website, The Dog Listener Consultancy will donate 50% of the course fees back to ASD. ASD Adopters are offered preferential rates for the group and home based program.

For the schedule and syllabus of the courses, please refer to this link: <a href=''http://www.doglistenerconsult.com'' target=''_blank''>www.doglistenerconsult.com</a>
'),
('P', 'Why Adopt A Dog', 'why-adopt-a-dog', '<b>Cost</b>
It is much cheaper to adopt a dog than to buy one. Versus paying anything from $500 to $2000 from the pet shops or breeders, adopting a dog from ASD only entails a token adoption fee and provides many more benefits. Please refer to the ASD Adoption Package here.

<b>Telling the truth</b>
We are non profit and our priority is the welfare and future of the dogs under our care, it is never about making the sale or about money. As such we are upfront about the character traits and health status of the dog, both good and bad. It is no point masking or hiding certain facts about the dog to accelerate the adoption process only for the new owners to find out about it later, and if they are not prepared for those traits, the dog’s life or future may be in jeopardy.

<b>A Lifetime Of Support</b>
Unlike pet shops and breeders, we ‘don’t wash our hands clean once the deal is done’. ASD believes in keeping in contact with their adoptors even past the adoption stage and helping with any problems that may come at various stages.

However it should be emphasized that this does not provide an avenue for people to ‘try out’ the dog first. Adopting a dog is a lifetime commitment and should be treated seriously. Ultimately, the adoptor needs to have the mindset to work out whatever problems they may face, should there be any. Please refer to the ASD Adoption Package below.

<b>Low Maintenance</b>
Most of our dogs for adoption are cross breed dogs. They are hardy and low maintenace dogs who have been acclimatized to our high humidity and hot environment. They seldom have skin problems or any other genetic defects which are common with pedigree breeds.

<b>Greater Loyalty</b>
All our dogs are rescued dogs who were either strays or have been abandoned. As a result of their hardship and suffering, most of them are deeply loyal and affectionate because they appreciate the second chance that they are given.
'),
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
For more details and benefits of the above procedures, please refer to the sections below. The health/medical procedures are done at reputable private vet clinics and usually at a nearby convenient location. This package is also subsidized, costing significantly less than if a member of the public were to patronise the same clinic.

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
('P', 'Project Adore', 'project-adore', '<p>In the past, if you were living in a HDB flat and wanted to own a local cross breed dog (Singapore Special), it would not have been possible. Since about 80% of the Singapore population lived in HDB flats, we knew this was an obstacle we had to overcome. So ASD, together with SPCA, embarked on a rehoming project called Project ADORE (ADOption and REhoming of dogs), which is a scheme permitting HDB residents to own local cross breed dogs.&nbsp;<br><br>Project ADORE kicked off in April 2012 as a pilot project and due to its success, was formalised in Parliament on 28 May 2014. As at 31 Dec 2015, ASD had successfully rehomed 192 dogs under this scheme.&nbsp;<br><br>To be approved under Project ADORE, a dog must be at least 7 months old, not more than 50 cm in height (from the shoulder to the ground) and under 15 kg in weight.&nbsp;<br><br>This campaign is aimed at supporting our rescues from the time they are about 2 months old until they are 7 months old. This means we have to support each of these puppies for at least five months.&nbsp;<br><br>Sure, sometimes dogs under this scheme are rescued when they are older and are rehomed within weeks or a couple of months. But sometimes, some of them stay with us for years.&nbsp;<br><br>A conservative estimate of maintaining a rescued dog at a shelter is $200 per month. This includes the basic necessities of food, boarding , and tick, flea and heartworm prevention.&nbsp;<br><br>We hope to rehome many more dogs under Project ADORE in 2016. Raising additional funds for this today would mean we could support more rescues and not have to worry about drawing funds away from the estimated 150 dogs we currently maintain.</p>'),
('P', 'Gone to Loving Homes', 'gone-to-loving-homes', 'Gone to Loving Homes'),
('P', 'Frequently Asked Questions', 'frequently-asked-questions', '<h2>Adoptions</h2><p><strong>Where is ASD located?</strong><br>To keep overheads low, ASD does not have an office, but we do have an Adoption &amp; Rescue Centre in the Kranji area</p><p><strong>Where can we go to view the dogs up for adoption?</strong><br>ASD works with a network of foster parents to help us look after the dogs up for adoption individually in their homes, so they are located in different parts of Singapore. As of June 07, ASD also set up the Adoption &amp; Rescue Centre to house some of the dogs there.To view the dog of your interest, please call us first for a further discussion</p><p><strong>How can we view the dogs?</strong><br>If you are genuine and sincere about adoption but wish to view the dogs before making a decison, please call at any of the numbers listed first and our volunteers will be able to help you.</p><p><strong>What is the procedure for adoption?</strong><br>Interested adopters should first consider whether they are ready for a dog, then they should browse through the e-kennels and select 2 or 3 adoptees they are interested in. They should then call any of the numbers listed in the ‘Contact Us’ section. A volunteer would discuss with them their environment and lifestyle and see if there is a good match between them and the adoptee. More information about the adoption process is available here.</p><p><strong>What are the conditions for adoption?</strong><br>Adoptors must sign an adoption agreement which serves to protect the dog against malnutrition and abuse, and vaccination and sterilization is mandatory and at the adoptor’s expense unless the dog has already undergone such procedures.More information about the adoption process is available here</p><p><strong>What is a bonding session?</strong><br>A bonding session is an interaction session between the adoptor and the adoptee and takes place at the foster parent’s home. This is to gauge the chemistry between the potential adoptor and adoptee.</p><p><strong>Are there any charges for adoption?</strong><br>There is a token adoption fee to defray the costs of rescues and initial medical treatment. More information about the adoption process is available here. Are there any small size/breed dogs for adoption? The dogs that are up for adoption all are posted in the e-kennels. If none are available, please join our mailing list to be kept updated of our latest adoptables.</p><p><strong>What is meant by the term local breed?</strong><br>The local breed dog is a mixture of many breeds such that there is no distinct pedigree appearance. They have evolved over many generations and are very aclimatised to our environment, highly intelligent and very hardy.&nbsp;</p><p><strong>How can I help as a volunteer?</strong><br>There are many areas of help that you can be involved in. Please refer to the ‘Join Our Cause’ section for more details. If you wish to contribute in any way, please send us an e-mail or contact us at any of the numbers listed.&nbsp;</p><p><strong>Can you help pick up a stray that I saw recently?</strong><br>We are a small group of volunteers and do not have the resources to answer to every call. As space resources are limited, once they are full, we cannot take in anymore unless some of the dogs are adopted. Our mode of operation is more of a collaborative one, where the rescuer has to help us hold the dog temporarily, then we can start the rehoming process.</p><p><strong>I would like to give up my dog, can you help rehome him?</strong><br>Our philosophy has always been ‘A Dog for Life’ and we advocate a philosophy of responsible pet ownership for the duration of your dog’s life.</p><p>Almost all problems have solutions and it really up to the owner’s mindset to work out the issues. We do not qualify reasons like ‘No time’, ‘Moving house’, ‘Having a baby’, ‘Financial woes’, ‘Dog too old’, ‘Maid is leaving’ or similar premises as genuine.</p><p>If you are experiencing behavioural issues with your dog, we have very effective classes and consultations which which will help you manage and resolve the issues.</p><p>We’d like to stress the point that it is a very traumatic experience for a dog to be separated from its owners after a period of time, and it may cause the dog to alter its personality. We urge everyone to work to overcome the problems and not take the easy way out.&nbsp;</p><p>If you are open to working out the issues so that you can continue keeping your dog, you can email us at info@asdsingapore.com and we will do our best to help you come up with solutions to overcome the problems.&nbsp;</p><p>If you adamant in giving up your dog, these are some of your alternatives :<br>- Contact other animal welfare organizations<br>– Check with your friends and relatives to see if they will like to adopt your dog<br>– Put up posters in the more than 700 pet shops, groomers, vets around Singapore<br>– Put up ads in the e-classifieds or the classified ads in the newspaper<br>– Put your dog in commercial boarding kennels</p><p>Do not abandon your dog, as he has become domesitcated and will lose the instinct to forage. Abandonment is also a crime punishable by law of a year’s jail and $10,000 fine.</p><p>Remember your dog is just like a child and should be treated as part of the family. Will you give up your child for any reason ?</p><h2>Contributions</h2><p><strong>How can I be sure that my contribution will directly benefit the animals?</strong><br>ASD’s financial accounts are audited yearly by a Certified Public Accountant and sent to the IRAS and ROS (Registry of Societies) for auditing as well. Society members get a copy of the annual report which details the financial operations of ASD for that year. The financial report also gives a breakdown of the expenses, and it can be seen that the majority of the expenses are spent on medical, boarding, transport which directly benefit the animals and costs like salaries, administrative expenses are kept to a minimum</p><p><strong>What is the proportion of funds spent on salary and administrative costs?</strong><br>As a guideline, we usually try to keep the salary and administrative costs to 1/3 or less of the total expenditure. This has been achieved for the past few years and is still continuing because all the administrative duties of running the society are done by volunteers</p><p><strong>Do the ASD Committee get paid?</strong><br>No, the ASD Committee of 10 members do not get paid. The regular pool of volunteers who help out at events and the centre also do not get paid. The administrative chores of running the society are distributed amongst the committee members who handle the duties on a fully volunteer basis</p><p><strong>Who are the people in ASD who are paid?</strong><br>At the moment, the caretakers of the Adoption &amp; Rescue Centre in Lim Chu Kang are paid a salary as the amount of work required to look after the dogs requires a full time person</p><p><strong>What is their salary structure like?</strong><br>The salary policy of ASD is to pay a fair wage to be on par with the market and to allow us to retain talent which is difficult to come by in this area of work. At the end of the financial year, if there is a surplus of funds, the committee will decide on an adjustment based on the current market average, which is usually in the form of a one time bonus&nbsp;</p><p>Can’t find what you want? <a href=\"contact\">Contact us</a>!</p>
'),

('C', 'Donate', 'donate', '<p>As a non-profit society, ASD relies soley on the generosity of the public to help fund our rescue, rehabilitation and rehoming acitivities. We receive no government or corporate funding. Being mainly volunteer run, we keep overheads low and channel most of the resources to where it counts, the animals.</p>
<p>Because we believe in giving the animals that we take in the best help possible regardless of their health condition, our major expenditure is on medical aid for the dogs we take in. Other expenses include sterilization, pet transportation, boarding and maintenance fees when our foster homes are full and food to support the stray feeders.</p>
<p>Your contribution can be made by cheque, fund transfer or GIRO, and will ensure that we have the means to continue with the quality care that these dogs require and deserve, and that you will be instrumental in giving them a second chance at life.</p>
<p>Alternatively, you can also donate dog food, flea and tick medication or heartworm medication which can be used for our fostered dogs or to supplement the stray feeders that we support. For donation of dog food or other dog related products, please email us at <a href=\"mailto:info@asdsingapore.com\">info@asdsingapore.com</a> or call us at 6100 2737.</p>'),
('C', 'Contact Us', 'contact-us', '<p>Thanks for swinging by. Do drop us a few words about your thoughts; We’ll appreciate anything constructive!</p>
<p>If you are interested in adopting one of our furry friends, go to Adopt A Dog page to select the dog and we’ll arrange for a bonding session.</p>
<p>If there is anything we can help you with, you may contact us.</p>
<p>However, we may not be able to accede to every request due to the limitations of our resources. We will however, provide alternatives that you may explore.</p>
<p>If you have any queries or are thinking about surrendering your dog or cannot keep a dog that you found, please browse thorough our Frequently Asked Questions here, else you may reach us via email at <a href=\"mailto:info@asdsingapore.com\">info@asdsingapore.com</a></p>
'),
('C', 'Home Adopt', '', 'Thinking of getting a dog? View the many reasons why you should adopt one of these wonderful dogs who will provide a lifetime of love and  joy!'),
('C', 'Home Donate', '', 'It takes a massive amount to keep our rescue, medical and shelter operations going monthly and this will be a great way to be a part of helping these helpless dogs who have no one but us to help them'),
('C', 'Home Volunteer', '', 'Do you feel the passion and the fire to help these dogs ? Use your strengths and passion to really make a difference ! There are so many ways to help, find out more!'),
('C', 'Home Rescue', '', 'It takes a lot to help dogs in need, from prepartory work to actual rescue and many a stray and abandoned dog suffer grave injuries or sickness. Read about them <a href=''blog/dogs-in-need''>here</a> and see how you can help!'),
('C', 'Home Rehabilitate', '', 'After being rescued, the real work starts to help these dogs through their ordeals and to let them know there is still love in life.'),
('C', 'Home Rehome', '', 'This is the final destination of any dog''s life journey, to find that forever home and to live happily ever after. Read about their fairy tale life stories!'),
('C', 'Boarding Form', '', 'This course is conducted by an external party, The Dog Listener Consultancy. The Dog Listener Consultancy will donate back 50% of the course fees signed through this form back to ASD'),
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

<b>Artists</b>
We are always on the lookout for the creative people who want to help the doggies in a special way. If you are a person who is gifted artistically, we welcome your designs which can be used to grace our ASD Tees, or any other product. The satisfaction come from the many people who buy our merchandise and use them to broadcast our message of kindness to animals.'),
('C', 'Volunteer Publicity', '', 'In order for more of our rescued dogs to be re-homed and to reduce the stray dog population, we need to increase the awarness of the public about our work and the benefits and joy that these dogs can bring to their lives, as well as to inculcate responsible pet ownership.

<b>Designers</b>
As a designer volunteer in the publicity committee, we need you to come up with new ideas and designs for adoption or informative brochures, pamphlets,exhibition panels and magazine ads to drive home the message of responsible pet ownership and the adoption of our local cross breed dogs.

<b>Media Producers</b>
You will be exploring different ways of disseminating information in order to ensure that our message reaches the masses. Different types of media can be utilized from Flash snippets to short video clips, teasers or trailers to drive home the message.

<b>Education Counsellors</b>
You will help design and lead the direction of the education program targeted at schools to inculcate values of compassion and kindness to animals. The young ones will be the ones leading the country in years to come and this will be the way to a gracious society, who knows they may even change the mindsets of the adults!
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
