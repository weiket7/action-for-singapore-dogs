<?php

use App\Models\Enums\AdoptStat;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdoptTable extends Migration
{
    public function up()
    {
      Schema::create('adopt', function (Blueprint $table) {
        $table->increments('adopt_id');
        $table->char('stat', 1);
        $table->string('name', 50);
        $table->string('slug', 50);
        $table->char('gender', 1);
        $table->date('birthday');
        $table->string('breed', 50);
        $table->string('colour', 20);
        $table->boolean('microchip');
        $table->boolean('vaccinate');
        $table->boolean('sterilise');
        $table->boolean('hdb');
        $table->string('image', 50);
        $table->string('microchip_no', 40)->nullable();
        $table->date('microchip_date')->nullable();
        $table->date('vaccinate_date1')->nullable();
        $table->date('vaccinate_date2')->nullable();
        $table->date('vaccinate_date3')->nullable();
        $table->date('sterilise_date')->nullable();
        $table->string('vet', 40)->nullable();
        $table->string('location', 30)->nullable();
        $table->string('location_other', 30)->nullable();
        $table->string('health', 500)->nullable();
        $table->string('behaviour', 500)->nullable();
        $table->string('history', 500)->nullable();
        $table->dateTime('rescued_on')->nullable();
        $table->string('posted_by', 30);
        $table->dateTime('posted_on');
        //$table->boolean('has_foster');
        //$table->boolean('can_sponsor');
        $table->string('desc', 250)->nullable();
        $table->softDeletes();
      });
  
      DB::statement("
INSERT INTO `adopt` (`name`, `stat`, `slug`, `gender`, `birthday`, `breed`, `colour`, `microchip`, `vaccinate`, `sterilise`, `hdb`, `image`, `posted_by`, `posted_on`) VALUES
('Natasha', 'A', '', 'F', '2013-03-01', 'Cross Breed', '', 1, 1, 1, 0, 'natasha.jpg', 'admin', '2018-08-15'),
('Lucas', 'A', '', 'M', '2012-01-01', 'Cross Breed', '', 1, 1, 1, 0, 'lucas.jpg', 'admin', '2018-08-15'),
('Trudy', 'A', '', 'F', '2012-07-01', 'Cross Breed', '', 1, 1, 1, 0, 'trudy_65.jpg', 'admin', '2018-08-15'),
('Spotty', 'A', '', 'M', '2011-09-01', 'Cross Breed', '', 1, 1, 1, 0, 'spotty.jpg', 'admin', '2018-08-15'),
('Yasmin', 'A', '', 'F', '2012-06-01', 'Cross Breed', '', 1, 1, 1, 0, 'yasmin.jpg', 'admin', '2018-08-15'),
('Yana', 'A', '', 'F', '2012-07-01', 'Cross Breed', '', 1, 1, 1, 0, 'yana.jpg', 'admin', '2018-08-15'),
('Yves', 'A', '', 'M', '2012-07-01', 'Cross Breed', '', 1, 1, 1, 0, 'yves.jpg', 'admin', '2018-08-15'),
('Sheena', 'A', '', 'F', '2010-04-01', 'Cross Breed', '', 1, 1, 1, 1, 'sheena.jpg', 'admin', '2018-08-15'),
('Jacob', 'A', '', 'M', '2010-01-01', 'Cross Breed', '', 1, 1, 1, 1, 'jacob.jpg', 'admin', '2018-08-15'),
('Fannie', 'A', '', 'F', '2010-02-01', 'Cross Breed', '', 1, 1, 1, 1, 'fannie.jpg', 'admin', '2018-08-15'),
('Fido', 'A', '', 'M', '2010-02-01', 'Cross Breed', '', 1, 1, 1, 0, 'fido.jpg', 'admin', '2018-08-15'),
('Avery', 'A', '', 'F', '2008-01-01', 'Cross Breed', '', 1, 1, 1, 0, 'avery.jpg', 'admin', '2018-08-15'),
('Linus', 'A', '', 'F', '2008-01-01', 'Cross Breed', '', 1, 1, 1, 0, 'linus.jpg', 'admin', '2018-08-15'),
('Mommy Girl', 'A', '', 'F', '2006-01-01', 'Cross Breed', '', 1, 1, 1, 1, 'mommygirl.jpg', 'admin', '2018-08-15'),
('Zeus', 'A', '', 'M', '2007-07-01', 'Cross Breed', '', 1, 1, 1, 0, 'zeus.jpg', 'admin', '2018-08-15'),
('Luna', 'A', '', 'F', '2008-06-01', 'Cross Breed', '', 1, 1, 1, 1, 'luna.jpg', 'admin', '2018-08-15'),
('Biscuit', 'A', '', 'M', '2007-10-01', 'Cross Breed', '', 1, 1, 1, 0, 'biscuit.jpg', 'admin', '2018-08-15'),
('Moon', 'A', '', 'F', '2008-01-01', 'Cross Breed', '', 1, 1, 1, 0, 'moon.jpg', 'admin', '2018-08-15'),
('Yummie', 'A', '', 'M', '2008-02-01', 'Cross Breed', '', 1, 1, 1, 0, 'yummie.jpg', 'admin', '2018-08-15'),
('Kranji Girl', 'A', '', 'F', '2007-01-01', 'Cross Breed', '', 1, 1, 1, 0, 'kranjigirl.jpg', 'admin', '2018-08-15'),
('Noisy', 'A', '', 'M', '2007-01-01', 'Cross Breed', '', 1, 1, 1, 0, 'noisy.jpg', 'admin', '2018-08-15'),
('Winner', 'A', '', 'M', '2009-03-01', 'Cross Breed', '', 1, 1, 1, 0, 'winner.jpg', 'admin', '2018-08-15'),
('Polly', 'A', '', 'F', '2008-06-01', 'Cross Breed', '', 1, 1, 1, 0, 'polly.jpg', 'admin', '2018-08-15'),
('Furgie', 'A', '', 'F', '2007-10-01', 'Cross Breed', '', 1, 1, 1, 0, 'furgie.jpg', 'admin', '2018-08-15'),
('Nature', 'A', '', 'F', '2016-05-01', 'Cross Breed', '', 1, 1, 1, 0, 'nature.jpg', 'admin', '2018-08-15'),
('Leo', 'A', '', 'M', '2009-01-01', 'Cross Breed', '', 1, 1, 1, 0, 'leo-122.jpg', 'admin', '2018-08-15'),
('Lucky Strike', 'A', '', 'M', '2008-06-01', 'Cross Breed', '', 1, 1, 1, 0, 'luckystrike.jpg', 'admin', '2018-08-15'),
('Black Bingo', 'A', '', 'M', '2007-06-01', 'Cross Breed', '', 1, 1, 1, 0, 'blackbingo.jpg', 'admin', '2018-08-15'),
('Lava', 'A', '', 'F', '2009-05-01', 'Cross Breed', '', 1, 1, 1, 0, 'lava.jpg', 'admin', '2018-08-15'),
('Elf', 'A', '', 'F', '2008-02-01', 'Cross Breed', '', 1, 1, 1, 0, 'elf.jpg', 'admin', '2018-08-15'),
('Kodomo', 'A', '', 'F', '2006-05-01', 'Cross Breed', '', 1, 1, 1, 0, 'kodomo.jpg', 'admin', '2018-08-15'),
('Lucky Hawkins', 'A', '', 'M', '2012-06-01', 'Cross breed', '', 1, 1, 1, 1, 'luckyhawkins.jpg', 'admin', '2018-08-15'),
('Siew Mai', 'A', '', 'M', '2008-07-01', 'Cross Breed', '', 1, 1, 1, 0, 'siewmai.jpg', 'admin', '2018-08-15'),
('Salt', 'A', '', 'F', '2010-01-01', 'Cross Breed', '', 1, 1, 1, 1, 'salt.jpg', 'admin', '2018-08-15'),
('Gucci', 'A', '', 'M', '2013-08-01', 'Cross Breed', '', 1, 1, 1, 0, 'gucci_316.jpg', 'admin', '2018-08-15'),
('Lucky Boy', 'A', '', 'M', '2008-07-01', 'Cross Breed', '', 1, 1, 1, 0, 'lucky boy_320.jpg', 'admin', '2018-08-15'),
('Louie', 'A', '', 'M', '2013-11-01', 'Cross Breed', '', 1, 1, 1, 0, 'louie_332.jpg', 'admin', '2018-08-15'),
('Ke Ke', 'A', '', 'M', '2013-09-01', 'Cross Breed', '', 1, 1, 1, 1, 'ke ke_335.jpg', 'admin', '2018-08-15'),
('Ai Ai', 'A', '', 'M', '2013-09-01', 'Cross Breed', '', 1, 1, 1, 0, 'ai ai_336.jpg', 'admin', '2018-08-15'),
('Kirstie', 'A', '', 'F', '2014-01-01', 'Cross Breed', '', 1, 1, 1, 0, 'kirstie_360.JPG', 'admin', '2018-08-15'),
('Bruno', 'A', '', 'M', '2010-01-01', 'Cross Breed', '', 1, 1, 1, 0, 'bruno_363.jpg', 'admin', '2018-08-15'),
('Tiffany', 'A', '', 'F', '2013-09-01', 'Cross Breed', '', 1, 1, 1, 0, 'tiffany_365.jpg', 'admin', '2018-08-15'),
('Flappy', 'A', '', 'F', '2013-12-01', 'Cross Breed', '', 1, 1, 1, 0, 'flappy_370.jpg', 'admin', '2018-08-15'),
('Elly', 'A', '', 'F', '2014-02-01', 'Cross Breed', '', 1, 1, 1, 0, 'elly_416.jpg', 'admin', '2018-08-15'),
('Lucy', 'A', '', 'F', '2014-03-01', 'Cross Breed', '', 1, 1, 1, 0, 'lucy_519.jpg', 'admin', '2018-08-15'),
('Lottie', 'A', '', 'F', '2012-01-01', 'Cross Breed', '', 1, 1, 1, 0, 'lottie_535.jpg', 'admin', '2018-08-15'),
('Phelix', 'A', '', 'M', '2014-03-01', 'Cross Breed', '', 1, 1, 1, 0, 'phelix_544.jpg', 'admin', '2018-08-15'),
('Ding Ding', 'A', '', 'M', '2014-01-01', 'Cross Breed', '', 1, 1, 1, 0, 'ding ding_548.jpg', 'admin', '2018-08-15'),
('Bobbi', 'A', '', 'F', '2012-01-01', 'Cross Breed', '', 1, 1, 1, 1, 'bobbi_549.jpg', 'admin', '2018-08-15'),
('Hercules', 'A', '', 'M', '2009-01-01', 'Cross Breed', '', 1, 1, 1, 0, 'hercules_550.jpg', 'admin', '2018-08-15'),
('Jolene', 'A', '', 'F', '2014-10-01', 'Cross Breed', '', 1, 1, 1, 1, 'jolene_551.jpg', 'admin', '2018-08-15'),
('Jace', 'A', '', 'M', '2014-08-01', 'Local Cross', '', 1, 1, 1, 0, 'jace.jpg', 'admin', '2018-08-15'),
('Bheen', 'A', '', 'M', '2012-01-01', 'Local Cross', '', 1, 1, 1, 0, 'bheen.jpg', 'admin', '2018-08-15'),
('Polo', 'A', '', 'M', '2011-01-01', 'Local Cross', '', 1, 1, 1, 0, 'polo.jpg', 'admin', '2018-08-15'),
('Lilibet', 'A', '', 'F', '2010-01-01', 'Local Cross', '', 1, 1, 1, 1, 'lilibet.jpg', 'admin', '2018-08-15'),
('Birthday', 'A', '', 'F', '2014-09-01', 'Local Cross', '', 1, 1, 1, 0, 'birthday.jpg', 'admin', '2018-08-15'),
('Cara', 'A', '', 'F', '2013-12-01', 'Local Cross', '', 1, 1, 1, 1, 'cara.jpg', 'admin', '2018-08-15'),
('Tam', 'A', '', 'M', '2013-02-01', 'Cross Breed', '', 1, 1, 1, 0, 'tam_735.jpg', 'admin', '2018-08-15'),
('Lucette', 'A', '', 'F', '2013-06-01', 'Cross Breed', '', 1, 1, 1, 1, 'lucette.jpg', 'admin', '2018-08-15'),
('Kadek', 'A', '', 'M', '2011-01-01', 'Cross Breed', '', 1, 1, 1, 1, 'kadek.jpg', 'admin', '2018-08-15'),
('Soju', 'A', '', 'M', '2015-05-01', 'Cross Breed', '', 1, 1, 1, 0, 'soju.jpg', 'admin', '2018-08-15'),
('Tuassie', 'A', '', 'F', '2013-08-01', 'Cross Breed', '', 1, 1, 1, 1, 'tuassie.jpg', 'admin', '2018-08-15'),
('Sterling', 'A', '', 'M', '2013-01-01', 'Cross Breed', '', 1, 1, 1, 1, 'sterling.jpg', 'admin', '2018-08-15'),
('Louisa', 'A', '', 'F', '2015-10-01', 'Cross Breed', '', 1, 1, 1, 0, 'louisa.jpg', 'admin', '2018-08-15'),
('Lambert', 'A', '', 'M', '2015-10-01', 'Cross Breed', '', 1, 1, 1, 1, 'lambert.jpg', 'admin', '2018-08-15'),
('Dexter', 'A', '', 'M', '2015-09-01', 'Cross Breed', '', 1, 1, 1, 0, 'dexter.jpg', 'admin', '2018-08-15'),
('Chi Chi', 'A', '', 'M', '2013-06-01', 'Cross Breed', '', 1, 1, 1, 1, 'chichi.jpg', 'admin', '2018-08-15'),
('Jordan', 'A', '', 'M', '2014-12-01', 'Cross Breed', '', 1, 1, 1, 0, 'jordan.jpg', 'admin', '2018-08-15'),
('Snapper', 'A', '', 'M', '2008-01-01', 'Cross Breed', '', 1, 1, 1, 1, 'snapper-1147.jpg', 'admin', '2018-08-15'),
('Prada', 'A', '', 'M', '2013-08-01', 'Cross Breed', '', 1, 1, 1, 0, 'prada-1151.jpg', 'admin', '2018-08-15'),
('Sweetheart', 'A', '', 'F', '2011-01-01', 'Cross Breed', '', 1, 1, 1, 1, 'sweetheart-1152.jpg', 'admin', '2018-08-15'),
('Xiaotiantian', 'A', '', 'F', '2011-06-01', 'Cross Breed', '', 1, 1, 1, 1, 'xiaotiantian-1174.jpg', 'admin', '2018-08-15'),
('Christmas', 'A', '', 'F', '2014-08-01', 'Cross Breed', '', 1, 1, 1, 1, 'christmas-1256.jpg', 'admin', '2018-08-15'),
('Fee Fee', 'A', '', 'M', '2013-08-01', 'Cross Breed', '', 1, 1, 1, 1, 'fee-fee-1261.jpg', 'admin', '2018-08-15'),
('Nelson', 'A', '', 'M', '2014-01-01', 'Cross Breed', '', 1, 1, 1, 1, 'nelson-1263.jpg', 'admin', '2018-08-15'),
('Asher', 'A', '', 'M', '2014-03-01', 'Cross Breed', '', 1, 1, 1, 1, 'asher-1273.jpg', 'admin', '2018-08-15'),
('Hector', 'A', '', 'M', '2012-01-01', 'Cross Breed', '', 1, 1, 1, 1, 'hector-1353.jpg', 'admin', '2018-08-15'),
('Audemars', 'A', '', 'F', '2016-11-01', 'Cross Breed', '', 1, 1, 1, 0, 'audemars-1419.jpg', 'admin', '2018-08-15'),
('Chopard', 'A', '', 'F', '2016-11-01', 'Cross Breed', '', 1, 1, 1, 0, 'chopard.jpg', 'admin', '2018-08-15'),
('Tissy', 'A', '', 'F', '2013-07-01', 'Cross Breed', '', 1, 1, 1, 1, 'tissy-1440.jpg', 'admin', '2018-08-15'),
('Terry', 'A', '', 'M', '2014-10-01', 'Cross Breed', '', 1, 1, 1, 1, 'terry-1442.jpg', 'admin', '2018-08-15'),
('Texas', 'A', '', 'M', '2016-12-01', 'Cross Breed', '', 1, 1, 1, 0, 'texas-1443.jpg', 'admin', '2018-08-15'),
('Semchi', 'A', '', 'F', '2014-06-01', 'Cross Breed', '', 1, 1, 1, 0, 'semchi-1449.jpg', 'admin', '2018-08-15'),
('Siao Hei', 'A', '', 'M', '2013-08-01', 'Cross Breed', '', 1, 1, 1, 1, 'siao-hei-1492.jpg', 'admin', '2018-08-15'),
('Kathi Boy', 'A', '', 'M', '2015-06-01', 'Cross Breed', '', 1, 1, 1, 0, 'kathi-boy-1493.jpg', 'admin', '2018-08-15'),
('Enzo', 'A', '', 'M', '2017-02-01', 'Cross Breed', '', 1, 1, 1, 0, 'enzo-1495.jpg', 'admin', '2018-08-15'),
('Xiao Hei', 'A', '', 'M', '2009-01-01', 'Cross Breed', '', 1, 1, 1, 0, 'xiao-hei-1498.jpg', 'admin', '2018-08-15'),
('Tully', 'A', '', 'M', '2017-02-01', 'Cross Breed', '', 1, 1, 1, 0, 'tully-1499.jpg', 'admin', '2018-08-15'),
('Freda', 'A', '', 'F', '2017-06-01', 'Cross Breed', '', 1, 1, 1, 0, 'freda-1503.jpg', 'admin', '2018-08-15'),
('Milo', 'A', '', 'M', '2017-06-01', 'Cross Breed', '', 1, 1, 1, 0, 'milo-1504.jpg', 'admin', '2018-08-15'),
('Konbu', 'A', '', 'M', '2013-02-01', 'Cross Breed', '', 1, 1, 1, 1, 'konbu-1505.jpg', 'admin', '2018-08-15'),
('Teddy', 'A', '', 'M', '2012-01-01', 'Cross Breed', '', 1, 1, 1, 0, 'teddy-1509.jpg', 'admin', '2018-08-15'),
('Kimchi', 'A', '', 'M', '2004-01-01', 'Cross Breed', '', 1, 1, 1, 0, 'kimchi-1510.jpg', 'admin', '2018-08-15'),
('Darly', 'A', '', 'F', '2017-06-01', 'Cross Breed', '', 1, 1, 1, 0, 'darly-1525.jpg', 'admin', '2018-08-15'),
('Macrae', 'A', '', 'M', '2015-12-01', 'Cross Breed', '', 1, 1, 1, 0, 'macrae-1527.jpg', 'admin', '2018-08-15'),
('Nami', 'A', '', 'F', '2014-01-01', 'Cross Breed', '', 1, 1, 1, 1, 'nami-1528.jpg', 'admin', '2018-08-15'),
('Wilbur', 'A', '', 'M', '2010-07-01', 'Cross Breed', '', 1, 1, 1, 0, 'wilbur-1529.jpg', 'admin', '2018-08-15'),
('Tao Bao', 'A', '', 'F', '2017-05-01', 'Cross Breed', '', 1, 1, 1, 0, 'tao-bao-1532.jpg', 'admin', '2018-08-15'),
('Karen', 'A', '', 'F', '2012-01-01', 'Cross Breed', '', 1, 1, 1, 0, 'karen-1537.jpg', 'admin', '2018-08-15'),
('Fin', 'A', '', 'M', '2017-06-01', 'Cross Breed', '', 1, 1, 1, 0, 'fin-1567.jpg', 'admin', '2018-08-15'),
('Eevee', 'A', '', 'F', '2017-05-01', 'Cross Breed', '', 1, 1, 1, 1, 'eevee-1569.jpg', 'admin', '2018-08-15'),
('Minion', 'A', '', 'F', '2016-01-01', 'Cross Breed', '', 1, 1, 1, 1, 'minion-1570.jpg', 'admin', '2018-08-15'),
('Tricks', 'A', '', 'M', '2013-04-01', 'Cross Breed', '', 1, 1, 1, 0, 'tricks-1571.jpg', 'admin', '2018-08-15'),
('Yoko', 'A', '', 'F', '2012-07-01', 'Cross Breed', '', 1, 1, 1, 1, 'yoko-1572.jpg', 'admin', '2018-08-15'),
('Joe', 'A', '', 'M', '2010-05-01', 'Cross Breed', '', 1, 1, 1, 0, 'joe-1574.jpg', 'admin', '2018-08-15'),
('Cha Cha', 'A', '', 'F', '2014-01-01', 'Cross Breed', '', 1, 1, 1, 1, 'cha-cha-1575.jpg', 'admin', '2018-08-15'),
('Lola', 'A', '', 'F', '2012-01-01', 'Cross Breed', '', 1, 1, 1, 0, 'lola-1576.jpg', 'admin', '2018-08-15'),
('Tau Sar', 'A', '', 'M', '2014-10-01', 'Cross Breed', '', 1, 1, 1, 0, 'tau-sar-1577.jpg', 'admin', '2018-08-15'),
('Leen Yong', 'A', '', 'M', '2013-10-01', 'Cross Breed', '', 1, 1, 1, 0, 'leen-yong-1578.jpg', 'admin', '2018-08-15'),
('Jackie Chan', 'A', '', 'M', '2017-02-01', 'Cross Breed', '', 1, 1, 1, 0, 'jackie-chan-1579.jpg', 'admin', '2018-08-15'),
('Clovis', 'A', '', 'M', '2016-02-01', 'Cross Breed', '', 1, 1, 1, 0, 'clovis-1583.jpg', 'admin', '2018-08-15'),
('Kyla', 'A', '', 'F', '2017-09-01', 'Cross Breed', '', 1, 1, 1, 1, 'kyla-1584.jpg', 'admin', '2018-08-15'),
('Calbee', 'A', '', 'F', '2017-07-01', 'Cross Breed', '', 1, 1, 1, 1, 'calbee-1587.jpg', 'admin', '2018-08-15'),
('Bingsu', 'A', '', 'F', '2016-12-01', 'Cross Breed', '', 1, 1, 1, 1, 'bingsu-1588.jpg', 'admin', '2018-08-15'),
('Luke', 'A', '', 'M', '2013-01-01', 'Cross Breed', '', 1, 1, 1, 0, 'luke-1589.jpg', 'admin', '2018-08-15'),
('Marley', 'A', '', 'M', '2017-03-01', 'Cross Breed', '', 1, 1, 1, 1, 'marley-1591.jpg', 'admin', '2018-08-15'),
('Apple', 'A', '', 'F', '2010-12-01', 'Cross Breed', '', 1, 1, 1, 1, 'apple-1594.jpg', 'admin', '2018-08-15'),
('Black Black', 'A', '', 'M', '2013-06-01', 'Cross Breed', '', 1, 1, 1, 1, 'black-black-1595.jpg', 'admin', '2018-08-15'),
('Blackie', 'A', '', 'M', '2012-05-01', 'Cross Breed', '', 1, 1, 1, 0, 'blackie-1596.jpg', 'admin', '2018-08-15'),
('Da Fu', 'A', '', 'F', '2013-11-01', 'Cross Breed', '', 1, 1, 1, 1, 'da-fu-1597.jpg', 'admin', '2018-08-15'),
('Harry', 'A', '', 'M', '2012-11-01', 'Cross Breed', '', 1, 1, 1, 0, 'harry-1598.jpg', 'admin', '2018-08-15'),
('Nugget', 'A', '', 'M', '2014-06-01', 'Cross Breed', '', 1, 1, 1, 0, 'nugget-1599.jpg', 'admin', '2018-08-15'),
('Ron', 'A', '', 'M', '2014-04-01', 'Cross Breed', '', 1, 1, 1, 0, 'ron-1600.jpg', 'admin', '2018-08-15'),
('Mei Mei', 'A', '', 'F', '2011-03-01', 'Cross Breed', '', 1, 1, 1, 1, 'mei-mei-1601.jpg', 'admin', '2018-08-15'),
('Brody', 'A', '', 'M', '2014-03-01', 'Cross Breed', '', 1, 1, 1, 1, 'brody-1610.jpg', 'admin', '2018-08-15'),
('Warren', 'A', '', 'M', '2018-01-01', 'Cross Breed', '', 1, 1, 1, 0, 'warren-1611.jpg', 'admin', '2018-08-15'),
('Lara', 'A', '', 'F', '2017-02-01', 'Cross Breed', '', 1, 1, 1, 1, 'lara-1612.jpg', 'admin', '2018-08-15'),
('Meiji', 'A', '', 'F', '2014-05-01', 'Cross Breed', '', 1, 1, 1, 1, 'meiji-1613.jpg', 'admin', '2018-08-15'),
('Ariel', 'A', '', 'F', '2015-03-01', 'Cross Breed', '', 1, 1, 1, 1, 'ariel-1614.jpg', 'admin', '2018-08-15'),
('Bambi', 'A', '', 'F', '2011-02-01', 'Cross Breed', '', 1, 1, 1, 0, 'bambi-1615.jpg', 'admin', '2018-08-15'),
('Bunny', 'A', '', 'F', '2016-03-01', 'Cross Breed', '', 1, 1, 1, 1, 'bunny-1616.jpg', 'admin', '2018-08-15'),
('Sakae', 'A', '', 'M', '2016-03-01', 'Cross Breed', '', 1, 1, 1, 1, 'sakae-1617.jpg', 'admin', '2018-08-15'),
('Nubia', 'A', '', 'F', '2018-02-01', 'Cross Breed', '', 1, 1, 1, 0, 'nubia-1618.jpg', 'admin', '2018-08-15'),
('Jade', 'A', '', 'F', '2011-08-01', 'Cross Breed', '', 1, 1, 1, 1, 'jade-1619.jpg', 'admin', '2018-08-15'),
('Pebble', 'A', '', 'F', '2011-08-01', 'Cross Breed', '', 1, 1, 1, 0, 'pebble-1620.jpg', 'admin', '2018-08-15'),
('Flint', 'A', '', 'M', '2011-08-01', 'Cross Breed', '', 1, 1, 1, 0, 'flint-1621.jpg', 'admin', '2018-08-15'),
('Kimmy', 'A', '', 'F', '2018-03-01', 'Cross Breed', '', 1, 1, 1, 0, 'kimmy-1622.jpg', 'admin', '2018-08-15'),
('Kirin', 'A', '', 'F', '2018-04-01', 'Cross Breed', '', 1, 1, 1, 0, 'kirin-1623.jpg', 'admin', '2018-08-15'),
('Windsor', 'A', '', 'M', '2013-05-01', 'Cross Breed', '', 1, 1, 1, 1, 'windsor-1624.jpg', 'admin', '2018-08-15'),
('Briggs', 'A', '', 'M', '2015-05-01', 'Cross Breed', '', 1, 1, 1, 1, 'briggs-1625.jpg', 'admin', '2018-08-15'),
('Bertie', 'A', '', 'M', '2015-05-01', 'Cross Breed', '', 1, 1, 1, 1, 'bertie-1626.jpg', 'admin', '2018-08-15'),
('Maia', 'A', '', 'F', '2015-06-01', 'Cross Breed', '', 1, 1, 1, 1, 'maia-1627.jpg', 'admin', '2018-08-15'),
('Missy', 'A', '', 'F', '2016-06-01', 'Cross Breed', '', 1, 1, 1, 1, 'missy-1628.jpg', 'admin', '2018-08-15'),
('Starley', 'A', '', 'F', '2017-10-01', 'Cross Breed', '', 1, 1, 1, 1, 'starley-1629.jpg', 'admin', '2018-08-15'),
('Yukee', 'A', '', 'F', '2016-12-01', 'Cross Breed', '', 1, 1, 1, 1, 'yukee-1630.jpg', 'admin', '2018-08-15'),
('Horatio', 'A', '', 'M', '2017-10-01', 'Cross Breed', '', 1, 1, 1, 0, 'horatio-1631.jpg', 'admin', '2018-08-15'),
('Robin', 'A', '', 'M', '2017-01-01', 'Cross Breed', '', 1, 1, 1, 1, 'robin-1632.jpg', 'admin', '2018-08-15'),
('Jumbo', 'A', '', 'M', '2017-05-01', 'Cross Breed', '', 1, 1, 1, 0, 'jumbo-1633.jpg', 'admin', '2018-08-15'),
('King', 'A', '', 'M', '2013-05-01', 'Cross Breed', '', 1, 1, 1, 0, 'king-1634.jpg', 'admin', '2018-08-15'),
('Maka', 'A', '', 'M', '2012-05-01', 'Cross Breed', '', 1, 1, 1, 0, 'maka-1635.jpg', 'admin', '2018-08-15');");
      
      DB::statement("update adopt set slug = lower(replace(name, ' ', '-'))");
    }

    public function down()
    {
      Schema::dropIfExists('adopt');
    }
}
