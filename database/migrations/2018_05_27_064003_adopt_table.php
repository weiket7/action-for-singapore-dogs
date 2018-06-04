<?php

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
        $table->string('name', 50);
        $table->string('slug', 50);
        $table->string('breed', 50);
        $table->char('gender', 1);
        $table->char('stat', 1);
        $table->string('image', 50);
        $table->string('posted_by', 30);
        $table->dateTime('posted_on');
        $table->dateTime('birthday');
        $table->boolean('microchip')->nullable();
        $table->boolean('vaccinate')->nullable();
        $table->boolean('hdb')->nullable();
        $table->date('microchip_date')->nullable();
        $table->date('vaccinate_date')->nullable();
        //$table->boolean('has_foster');
        //$table->boolean('can_sponsor');
        $table->string('desc', 250)->nullable();
      });
  
      $sql = "INSERT INTO `adopt` (`stat`, `name`, `slug`, `breed`, `gender`, `hdb`, `image`, `birthday`, `posted_by`, `posted_on`) VALUES
('A', 'Kodomo', 'Kodomo', 'Cross Breed', 'F', 0, 'kodomo.jpg', '2006-05-01', 'admin', '2018-01-01'),
('A', 'Elf', 'Elf', 'Cross Breed', 'F', 0, 'elf.jpg', '2008-02-01', 'admin', '2018-01-01'),
('A', 'Lava', 'Lava', 'Cross Breed', 'F', 0, 'lava.jpg', '2009-05-01', 'admin', '2018-01-01'),
('A', 'Black Bingo', 'Black-Bingo', 'Cross Breed', 'M', 0, 'blackbingo.jpg', '2007-06-01', 'admin', '2018-01-01'),
('A', 'Lucky Strike', 'Lucky-Strike', 'Cross Breed', 'M', 0, 'luckystrike.jpg', '2008-06-01', 'admin', '2018-01-01'),
('A', 'Leo', 'Leo', 'Cross Breed', 'M', 0, 'leo-122.jpg', '2009-01-01', 'admin', '2018-01-01'),
('A', 'Nature', 'Nature', 'Cross Breed', 'F', 0, 'nature.jpg', '2016-05-01', 'admin', '2018-01-01'),
('A', 'Magic', 'Magic', 'Cross Breed', 'M', 1, 'magic.jpg', '2009-07-01', 'admin', '2018-01-01'),
('A', 'Furgie', 'Furgie', 'Cross Breed', 'F', 0, 'furgie.jpg', '2007-10-01', 'admin', '2018-01-01'),
('A', 'Angel', 'Angel', 'Cross Breed', 'F', 0, 'angel.jpg', '2004-06-01', 'admin', '2018-01-01'),
('A', 'Polly', 'Polly', 'Cross Breed', 'F', 0, 'polly.jpg', '2008-06-01', 'admin', '2018-01-01'),
('A', 'Winner', 'Winner', 'Cross Breed', 'M', 0, 'winner.jpg', '2009-03-01', 'admin', '2018-01-01')";
      
      /*$sql = "INSERT INTO `adopt` (`stat`, `name`, `breed`, `gender`, `hdb`, `image`, `birthday`, `posted_by`, `posted_on`) VALUES
('A', 'Kodomo', 'Cross Breed', 'F', 0, 'kodomo.jpg', '2006-05-01', 'admin', '2018-01-01'),
('A', 'Elf', 'Cross Breed', 'F', 0, 'elf.jpg', '2008-02-01', 'admin', '2018-01-01'),
('A', 'Lava', 'Cross Breed', 'F', 0, 'lava.jpg', '2009-05-01', 'admin', '2018-01-01'),
('A', 'Black Bingo', 'Cross Breed', 'M', 0, 'blackbingo.jpg', '2007-06-01', 'admin', '2018-01-01'),
('A', 'Lucky Strike', 'Cross Breed', 'M', 0, 'luckystrike.jpg', '2008-06-01', 'admin', '2018-01-01'),
('A', 'Leo', 'Cross Breed', 'M', 0, 'leo-122.jpg', '2009-01-01', 'admin', '2018-01-01'),
('A', 'Nature', 'Cross Breed', 'F', 0, 'nature.jpg', '2016-05-01', 'admin', '2018-01-01'),
('A', 'Magic', 'Cross Breed', 'M', 1, 'magic.jpg', '2009-07-01', 'admin', '2018-01-01'),
('A', 'Furgie', 'Cross Breed', 'F', 0, 'furgie.jpg', '2007-10-01', 'admin', '2018-01-01'),
('A', 'Angel', 'Cross Breed', 'F', 0, 'angel.jpg', '2004-06-01', 'admin', '2018-01-01'),
('A', 'Polly', 'Cross Breed', 'F', 0, 'polly.jpg', '2008-06-01', 'admin', '2018-01-01'),
('A', 'Winner', 'Cross Breed', 'M', 0, 'winner.jpg', '2009-03-01', 'admin', '2018-01-01'),
('A', 'Noisy', 'Cross Breed', 'M', 0, 'noisy.jpg', '2007-01-01', 'admin', '2018-01-01'),
('A', 'Kranji Girl', 'Cross Breed', 'F', 0, 'kranjigirl.jpg', '2007-01-01', 'admin', '2018-01-01'),
('A', 'Yummie', 'Cross Breed', 'M', 0, 'yummie.jpg', '2008-02-01', 'admin', '2018-01-01'),
('A', 'Moon', 'Cross Breed', 'F', 0, 'moon.jpg', '2008-01-01', 'admin', '2018-01-01'),
('A', 'Biscuit', 'Cross Breed', 'M', 0, 'biscuit.jpg', '2007-10-01', 'admin', '2018-01-01'),
('A', 'Luna', 'Cross Breed', 'F', 1, 'luna.jpg', '2008-06-01', 'admin', '2018-01-01'),
('A', 'Zeus', 'Cross Breed', 'M', 0, 'zeus.jpg', '2007-07-01', 'admin', '2018-01-01'),
('A', 'Mommy Girl', 'Cross Breed', 'F', 1, 'mommygirl.jpg', '2006-01-01', 'admin', '2018-01-01'),
('A', 'Linus', 'Cross Breed', 'F', 0, 'linus.jpg', '2008-01-01', 'admin', '2018-01-01'),
('A', 'Avery', 'Cross Breed', 'F', 0, 'avery.jpg', '2008-01-01', 'admin', '2018-01-01'),
('A', 'Fido', 'Cross Breed', 'M', 0, 'fido.jpg', '2010-02-01', 'admin', '2018-01-01'),
('A', 'Fannie', 'Cross Breed', 'F', 1, 'fannie.jpg', '2010-02-01', 'admin', '2018-01-01'),
('A', 'Jacob', 'Cross Breed', 'M', 1, 'jacob.jpg', '2010-01-01', 'admin', '2018-01-01'),
('A', 'Sheena', 'Cross Breed', 'F', 1, 'sheena.jpg', '2010-04-01', 'admin', '2018-01-01'),
('A', 'Yves', 'Cross Breed', 'M', 0, 'yves.jpg', '2012-07-01', 'admin', '2018-01-01'),
('A', 'Yana', 'Cross Breed', 'F', 0, 'yana.jpg', '2012-07-01', 'admin', '2018-01-01'),
('A', 'Yasmin', 'Cross Breed', 'F', 0, 'yasmin.jpg', '2012-06-01', 'admin', '2018-01-01'),
('A', 'Spotty', 'Cross Breed', 'M', 0, 'spotty.jpg', '2011-09-01', 'admin', '2018-01-01'),
('A', 'Trudy', 'Cross Breed', 'F', 0, 'trudy_65.jpg', '2012-07-01', 'admin', '2018-01-01'),
('A', 'Lucas', 'Cross Breed', 'M', 0, 'lucas.jpg', '2012-01-01', 'admin', '2018-01-01'),
('A', 'Natasha', 'Cross Breed', 'F', 0, 'natasha.jpg', '2013-03-01', 'admin', '2018-01-01'),
('A', 'Chester', 'Cross breed', 'M', 0, 'chester.jpg', '2010-06-01', 'admin', '2018-01-01'),
('A', 'Lucky Hawkins', 'Cross breed', 'M', 1, 'luckyhawkins.jpg', '2012-06-01', 'admin', '2018-01-01'),
('A', 'Siew Mai', 'Cross Breed', 'M', 0, 'siewmai.jpg', '2008-07-01', 'admin', '2018-01-01'),
('A', 'Salt', 'Cross Breed', 'F', 1, 'salt.jpg', '2010-01-01', 'admin', '2018-01-01'),
('A', 'Gucci', 'Cross Breed', 'M', 0, 'gucci_316.jpg', '2013-08-01', 'admin', '2018-01-01'),
('A', 'Lucky Boy', 'Cross Breed', 'M', 0, 'lucky boy_320.jpg', '2008-07-01', 'admin', '2018-01-01'),
('A', 'Louie', 'Cross Breed', 'M', 0, 'louie_332.jpg', '2013-11-01', 'admin', '2018-01-01'),
('A', 'Ai Ai', 'Cross Breed', 'M', 0, 'ai ai_336.jpg', '2013-09-01', 'admin', '2018-01-01'),
('A', 'Kirstie', 'Cross Breed', 'F', 0, 'kirstie_360.JPG', '2014-01-01', 'admin', '2018-01-01'),
('A', 'Bruno', 'Cross Breed', 'M', 0, 'bruno_363.jpg', '2010-01-01', 'admin', '2018-01-01'),
('A', 'Tiffany', 'Cross Breed', 'F', 0, 'tiffany_365.jpg', '2013-09-01', 'admin', '2018-01-01'),
('A', 'Flappy', 'Cross Breed', 'F', 0, 'flappy_370.jpg', '2013-12-01', 'admin', '2018-01-01'),
('A', 'Elly', 'Cross Breed', 'F', 0, 'elly_416.jpg', '2014-02-01', 'admin', '2018-01-01'),
('A', 'Ke Ke', 'Cross Breed', 'M', 1, 'ke ke_335.jpg', '2013-09-01', 'admin', '2018-01-01'),
('A', 'Lucy', 'Cross Breed', 'F', 0, 'lucy_519.jpg', '2014-03-01', 'admin', '2018-01-01'),
('A', 'Lottie', 'Cross Breed', 'F', 0, 'lottie_535.jpg', '2012-01-01', 'admin', '2018-01-01'),
('A', 'Phelix', 'Cross Breed', 'M', 0, 'phelix_544.jpg', '2014-03-01', 'admin', '2018-01-01'),
('A', 'Ding Ding', 'Cross Breed', 'M', 0, 'ding ding_548.jpg', '2014-01-01', 'admin', '2018-01-01'),
('A', 'Bobbi', 'Cross Breed', 'F', 1, 'bobbi_549.jpg', '2012-01-01', 'admin', '2018-01-01'),
('A', 'Hercules', 'Cross Breed', 'M', 0, 'hercules_550.jpg', '2009-01-01', 'admin', '2018-01-01'),
('A', 'Jolene', 'Cross Breed', 'F', 1, 'jolene_551.jpg', '2014-10-01', 'admin', '2018-01-01'),
('A', 'Jace', 'Local Cross', 'M', 0, 'jace.jpg', '2014-08-01', 'admin', '2018-01-01'),
('A', 'Bheen', 'Local Cross', 'M', 0, 'bheen.jpg', '2012-01-01', 'admin', '2018-01-01'),
('A', 'Polo', 'Local Cross', 'M', 0, 'polo.jpg', '2011-01-01', 'admin', '2018-01-01'),
('A', 'Lilibet', 'Local Cross', 'F', 1, 'lilibet.jpg', '2010-01-01', 'admin', '2018-01-01'),
('A', 'Birthday', 'Local Cross', 'F', 0, 'birthday.jpg', '2014-09-01', 'admin', '2018-01-01'),
('A', 'Cara', 'Local Cross', 'F', 1, 'cara.jpg', '2013-12-01', 'admin', '2018-01-01'),
('A', 'Tam', 'Cross Breed', 'M', 0, 'tam_735.jpg', '2013-02-01', 'admin', '2018-01-01'),
('A', 'Lucette', 'Cross Breed', 'F', 1, 'lucette.jpg', '2013-06-01', 'admin', '2018-01-01'),
('A', 'Derby', 'Cross Breed', 'M', 1, 'derby.jpg', '2014-07-01', 'admin', '2018-01-01'),
('A', 'Kadek', 'Cross Breed', 'M', 1, 'kadek.jpg', '2011-01-01', 'admin', '2018-01-01'),
('A', 'Soju', 'Cross Breed', 'M', 0, 'soju.jpg', '2015-05-01', 'admin', '2018-01-01'),
('A', 'Linden', 'Cross Breed', 'M', 0, 'linden.jpg', '2014-12-01', 'admin', '2018-01-01'),
('A', 'Tuassie', 'Cross Breed', 'F', 1, 'tuassie.jpg', '2013-08-01', 'admin', '2018-01-01'),
('A', 'Sterling', 'Cross Breed', 'M', 1, 'sterling.jpg', '2013-01-01', 'admin', '2018-01-01'),
('A', 'Dian Dian', 'Cross Breed', 'F', 1, 'diandian.jpg', '2012-06-01', 'admin', '2018-01-01'),
('A', 'Louisa', 'Cross Breed', 'F', 0, 'louisa.jpg', '2015-10-01', 'admin', '2018-01-01'),
('A', 'Lambert', 'Cross Breed', 'M', 1, 'lambert.jpg', '2015-10-01', 'admin', '2018-01-01'),
('A', 'Dexter', 'Cross Breed', 'M', 0, 'dexter.jpg', '2015-09-01', 'admin', '2018-01-01'),
('A', 'Xiao Bu Dian', 'Cross Breed', 'F', 1, 'xiaobudian.jpg', '2012-01-01', 'admin', '2018-01-01'),
('A', 'Chi Chi', 'Cross Breed', 'M', 1, 'chichi.jpg', '2013-06-01', 'admin', '2018-01-01'),
('A', 'Jordan', 'Cross Breed', 'M', 0, 'jordan.jpg', '2014-12-01', 'admin', '2018-01-01'),
('A', 'Snapper', 'Cross Breed', 'M', 1, 'snapper-1147.jpg', '2008-01-01', 'admin', '2018-01-01'),
('A', 'Prada', 'Cross Breed', 'M', 0, 'prada-1151.jpg', '2013-08-01', 'admin', '2018-01-01'),
('A', 'Sweetheart', 'Cross Breed', 'F', 1, 'sweetheart-1152.jpg', '2011-01-01', 'admin', '2018-01-01'),
('A', 'Fanya', 'Cross Breed', 'F', 1, 'fanya-1165.jpg', '2015-07-01', 'admin', '2018-01-01'),
('A', 'Xiaotiantian', 'Cross Breed', 'F', 1, 'xiaotiantian-1174.jpg', '2011-06-01', 'admin', '2018-01-01'),
('A', 'Christmas', 'Cross Breed', 'F', 1, 'christmas-1256.jpg', '2014-08-01', 'admin', '2018-01-01'),
('A', 'Fee Fee', 'Cross Breed', 'M', 1, 'fee-fee-1261.jpg', '2013-08-01', 'admin', '2018-01-01'),
('A', 'Nelson', 'Cross Breed', 'M', 1, 'nelson-1263.jpg', '2014-01-01', 'admin', '2018-01-01'),
('A', 'Mao Mao', 'Cross Breed', 'M', 1, 'mao-mao-1269.jpg', '2006-01-01', 'admin', '2018-01-01'),
('A', 'Asher', 'Cross Breed', 'M', 1, 'asher-1273.jpg', '2014-03-01', 'admin', '2018-01-01'),
('A', 'Misaki', 'Cross Breed', 'F', 0, 'misaki-1340.jpg', '2016-09-01', 'admin', '2018-01-01'),
('A', 'Dumbo', 'Cross Breed', 'M', 1, 'dumbo-1351.jpg', '2013-01-01', 'admin', '2018-01-01'),
('A', 'Hector', 'Cross Breed', 'M', 1, 'hector-1353.jpg', '2012-01-01', 'admin', '2018-01-01'),
('A', 'Chaplin', 'Cross Breed', 'M', 1, 'chaplin-1357.jpg', '2016-03-01', 'admin', '2018-01-01'),
('A', 'Hua Hua', 'Cross Breed', 'F', 0, 'hua-hua-1418.jpg', '2010-12-01', 'admin', '2018-01-01'),
('A', 'Audemars', 'Cross Breed', 'F', 0, 'audemars-1419.jpg', '2016-11-01', 'admin', '2018-01-01'),
('A', 'Chopard', 'Cross Breed', 'F', 0, 'chopard.jpg', '2016-11-01', 'admin', '2018-01-01'),
('A', 'Cartier', 'Cross Breed', 'M', 0, 'cartier-1421.jpg', '2016-11-01', 'admin', '2018-01-01'),
('A', 'Cider', 'Cross Breed', 'M', 0, 'cider-1425.jpg', '2014-12-01', 'admin', '2018-01-01'),
('A', 'Tissy', 'Cross Breed', 'F', 1, 'tissy-1440.jpg', '2013-07-01', 'admin', '2018-01-01'),
('A', 'Terry', 'Cross Breed', 'M', 1, 'terry-1442.jpg', '2014-10-01', 'admin', '2018-01-01'),
('A', 'Texas', 'Cross Breed', 'M', 0, 'texas-1443.jpg', '2016-12-01', 'admin', '2018-01-01'),
('A', 'Semchi', 'Cross Breed', 'F', 0, 'semchi-1449.jpg', '2014-06-01', 'admin', '2018-01-01'),
('A', 'Tasha', 'Cross Breed', 'F', 1, 'tasha-1451.jpg', '2015-07-01', 'admin', '2018-01-01'),
('A', 'Siao Hei', 'Cross Breed', 'M', 1, 'siao-hei-1492.jpg', '2013-08-01', 'admin', '2018-01-01'),
('A', 'Kathi Boy', 'Cross Breed', 'M', 0, 'kathi-boy-1493.jpg', '2015-06-01', 'admin', '2018-01-01'),
('A', 'Enzo', 'Cross Breed', 'M', 0, 'enzo-1495.jpg', '2017-02-01', 'admin', '2018-01-01'),
('A', 'Mykala', 'Cross Breed', 'F', 1, 'mykala-1496.jpg', '2014-03-01', 'admin', '2018-01-01'),
('A', 'Xiao Hei', 'Cross Breed', 'M', 0, 'xiao-hei-1498.jpg', '2009-01-01', 'admin', '2018-01-01'),
('A', 'Tully', 'Cross Breed', 'M', 0, 'tully-1499.jpg', '2017-02-01', 'admin', '2018-01-01'),
('A', 'Grady', 'Cross Breed', 'M', 1, 'grady-1501.jpg', '2015-02-01', 'admin', '2018-01-01'),
('A', 'Lumi', 'Cross Breed', 'M', 1, 'lumi-1502.jpg', '2017-01-01', 'admin', '2018-01-01'),
('A', 'Freda', 'Cross Breed', 'F', 0, 'freda-1503.jpg', '2017-06-01', 'admin', '2018-01-01'),
('A', 'Milo', 'Cross Breed', 'M', 0, 'milo-1504.jpg', '2017-06-01', 'admin', '2018-01-01'),
('A', 'Konbu', 'Cross Breed', 'M', 1, 'konbu-1505.jpg', '2013-02-01', 'admin', '2018-01-01'),
('A', 'Teddy', 'Cross Breed', 'M', 0, 'teddy-1509.jpg', '2012-01-01', 'admin', '2018-01-01'),
('A', 'Kimchi', 'Cross Breed', 'M', 0, 'kimchi-1510.jpg', '2004-01-01', 'admin', '2018-01-01'),
('A', 'Brown', 'Cross Breed', 'M', 1, 'brown-1517.jpg', '2016-03-01', 'admin', '2018-01-01'),
('A', 'Teddy Boy', 'Cross Breed', 'M', 0, 'teddy-boy-1520.jpg', '2017-08-01', 'admin', '2018-01-01'),
('A', 'Darly', 'Cross Breed', 'F', 0, 'darly-1525.jpg', '2017-06-01', 'admin', '2018-01-01'),
('A', 'Macrae', 'Cross Breed', 'M', 0, 'macrae-1527.jpg', '2015-12-01', 'admin', '2018-01-01'),
('A', 'Nami', 'Cross Breed', 'F', 1, 'nami-1528.jpg', '2014-01-01', 'admin', '2018-01-01'),
('A', 'Wilbur', 'Cross Breed', 'M', 0, 'wilbur-1529.jpg', '2010-07-01', 'admin', '2018-01-01'),
('A', 'Sage', 'Cross Breed', 'M', 1, 'sage-1531.jpg', '2017-03-01', 'admin', '2018-01-01'),
('A', 'Tao Bao', 'Cross Breed', 'F', 0, 'tao-bao-1532.jpg', '2017-05-01', 'admin', '2018-01-01'),
('A', 'Karen', 'Cross Breed', 'F', 0, 'karen-1537.jpg', '2012-01-01', 'admin', '2018-01-01'),
('A', 'Fin', 'Cross Breed', 'M', 0, 'fin-1567.jpg', '2017-06-01', 'admin', '2018-01-01'),
('A', 'Rocky', 'Cross Breed', 'M', 1, 'rocky.jpg', '2008-11-01', 'admin', '2018-01-01'),
('A', 'Eevee', 'Cross Breed', 'F', 1, 'eevee-1569.jpg', '2017-05-01', 'admin', '2018-01-01'),
('A', 'Minion', 'Cross Breed', 'F', 1, 'minion-1570.jpg', '2016-01-01', 'admin', '2018-01-01'),
('A', 'Tricks', 'Cross Breed', 'M', 0, 'tricks-1571.jpg', '2013-04-01', 'admin', '2018-01-01'),
('A', 'Yoko', 'Cross Breed', 'F', 1, 'yoko-1572.jpg', '2012-07-01', 'admin', '2018-01-01'),
('A', 'Girl Girl', 'Cross Breed', 'F', 1, 'girl-girl-1573.jpg', '2014-11-01', 'admin', '2018-01-01'),
('A', 'Joe', 'Cross Breed', 'M', 0, 'joe-1574.jpg', '2010-05-01', 'admin', '2018-01-01'),
('A', 'Cha Cha', 'Cross Breed', 'F', 1, 'cha-cha-1575.jpg', '2014-01-01', 'admin', '2018-01-01'),
('A', 'Lola', 'Cross Breed', 'F', 0, 'lola-1576.jpg', '2012-01-01', 'admin', '2018-01-01'),
('A', 'Tau Sar', 'Cross Breed', 'M', 0, 'tau-sar-1577.jpg', '2014-10-01', 'admin', '2018-01-01'),
('A', 'Leen Yong', 'Cross Breed', 'M', 0, 'leen-yong-1578.jpg', '2013-10-01', 'admin', '2018-01-01'),
('A', 'Jackie Chan', 'Cross Breed', 'M', 0, 'jackie-chan-1579.jpg', '2017-02-01', 'admin', '2018-01-01'),
('A', 'Sunday', 'Cross Breed', 'F', 0, 'sunday-1580.jpg', '2017-11-01', 'admin', '2018-01-01'),
('A', 'Checkers', 'Cross Breed', 'F', 0, 'checkers-1581.jpg', '2017-10-01', 'admin', '2018-01-01'),
('A', 'Guinness', 'Cross Breed', 'M', 0, 'guinness-1582.jpg', '2017-10-01', 'admin', '2018-01-01'),
('A', 'Clovis', 'Cross Breed', 'M', 0, 'clovis-1583.jpg', '2016-02-01', 'admin', '2018-01-01'),
('A', 'Kyla', 'Cross Breed', 'F', 1, 'kyla-1584.jpg', '2017-09-01', 'admin', '2018-01-01'),
('A', 'Brownie', 'Cross Breed', 'M', 1, 'brownie-1585.jpg', '2017-03-01', 'admin', '2018-01-01'),
('A', 'Woody', 'Cross Breed', 'M', 0, 'woody-1586.jpg', '2013-01-01', 'admin', '2018-01-01'),
('A', 'Calbee', 'Cross Breed', 'F', 1, 'calbee-1587.jpg', '2017-07-01', 'admin', '2018-01-01'),
('A', 'Bingsu', 'Cross Breed', 'F', 1, 'bingsu-1588.jpg', '2016-12-01', 'admin', '2018-01-01'),
('A', 'Luke', 'Cross Breed', 'M', 0, 'luke-1589.jpg', '2013-01-01', 'admin', '2018-01-01'),
('A', 'Cheddar', 'Cross Breed', 'M', 0, 'cheddar-1590.jpg', '2017-11-01', 'admin', '2018-01-01'),
('A', 'Marley', 'Cross Breed', 'M', 1, 'marley-1591.jpg', '2017-03-01', 'admin', '2018-01-01'),
('A', 'Kedi', 'Cross Breed', 'F', 0, 'kedi-1592.jpg', '2018-01-01', 'admin', '2018-01-01'),
('A', 'Jobi', 'Cross Breed', 'M', 0, 'jobi-1593.jpg', '2018-01-01', 'admin', '2018-01-01'),
('A', 'Apple', 'Cross Breed', 'F', 1, 'apple-1594.jpg', '2010-12-01', 'admin', '2018-01-01'),
('A', 'Black Black', 'Cross Breed', 'M', 1, 'black-black-1595.jpg', '2013-06-01', 'admin', '2018-01-01'),
('A', 'Blackie', 'Cross Breed', 'M', 0, 'blackie-1596.jpg', '2012-05-01', 'admin', '2018-01-01'),
('A', 'Da Fu', 'Cross Breed', 'F', 1, 'da-fu-1597.jpg', '2013-11-01', 'admin', '2018-01-01'),
('A', 'Harry', 'Cross Breed', 'M', 0, 'harry-1598.jpg', '2012-11-01', 'admin', '2018-01-01'),
('A', 'Mei Mei', 'Cross Breed', 'F', 1, 'mei-mei-1601.jpg', '2011-03-01', 'admin', '2018-01-01'),
('A', 'Nugget', 'Cross Breed', 'M', 0, 'nugget-1599.jpg', '2014-06-01', 'admin', '2018-01-01'),
('A', 'Ron', 'Cross Breed', 'M', 0, 'ron-1600.jpg', '2014-04-01', 'admin', '2018-01-01');";*/
      DB::statement($sql);
    }

    public function down()
    {
      Schema::dropIfExists('adopt');
    }
}
