<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PermissionTable extends Migration
{
  public function up()
  {
    Schema::create('permission', function (Blueprint $table) {
      $table->tinyIncrements('permission_id');
      $table->string('name', 30);
      $table->string('link', 20);
      $table->string('icon', 20);
    });
  
    $permissions = [
      ['name' => 'Dogs', 'link' => 'adopt', 'icon' => 'paw'],
      ['name' => 'People', 'link' => 'person', 'icon' => 'users'],
      ['name' => 'Adopters', 'link' => 'adopter', 'icon' => 'user-plus'],
      ['name' => 'Rescuers', 'link' => 'rescuer', 'icon' => 'street-view'],
      ['name' => 'Fosters', 'link' => 'foster', 'icon' => 'user-md'],
      ['name' => 'Volunteers', 'link' => 'volunteer', 'icon' => 'handshake-o'],
      ['name' => 'Adoption Forms', 'link' => 'adoption-form', 'icon' => 'wpforms'],
      /*['name' => 'Sponsorships', 'link' => 'sponsor', 'icon' => 'money'],*/
      ['name' => 'Donations', 'link' => 'donation', 'icon' => 'dollar'],
      ['name' => 'Pages', 'link' => 'page', 'icon' => 'font'],
      ['name' => 'Banners', 'link' => 'banner', 'icon' => 'image'],
      /*['name' => 'Questions', 'link' => 'question', 'icon' => 'question'],*/
      ['name' => 'Events', 'link' => 'event', 'icon' => 'calendar-o'],
      ['name' => 'Blog', 'link' => 'blog', 'icon' => 'calendar-o'],
      ['name' => 'Boarding', 'link' => 'event', 'icon' => 'calendar-o'],
      ['name' => 'Basic Obedience Class', 'link' => 'event', 'icon' => 'calendar-o'],
      ['name' => 'Contact', 'link' => 'event', 'icon' => 'calendar-o'],
      ['name' => 'Gift Shop', 'link' => 'gift', 'icon' => 'user-secret'],
      ['name' => 'Testimonials', 'link' => 'testimonial', 'icon' => 'user-secret'],
      ['name' => 'Users', 'link' => 'user', 'icon' => 'user-secret']
    ];
    
    foreach($permissions as $p) {
      DB::table('permission')->insert($p);
    }
  }
  
  public function down()
  {
    Schema::dropIfExists('permission');
  }
}
