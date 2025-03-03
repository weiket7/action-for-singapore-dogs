<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VolunteerAddStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('volunteer', function (Blueprint $table) {
            $table->string('students_average_age')->nullable();
        });

        DB::statement("
            INSERT INTO `page` (`type`, `title`, `slug`, `content`) VALUES
            ('C', 'Home Sponsor', 'sponsor', 'Can''t bring a dog home but want to help a specific dog that has caught your eye – please consider sponsoring him / her and make a tangible difference to their lives. '),
            ('C', 'Sponsor', 'sponsor', ''),
            ('C', 'Volunteer Students', '', ''),
            ('C', 'Volunteer Corporate', '', '');
        ");

        Schema::table('blog', function (Blueprint $table) {
            $table->boolean('archive');
        });

        Schema::table('adopt', function (Blueprint $table) {
            $table->string('image2', 250)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('volunteer', function (Blueprint $table) {
            $table->dropColumn('students_average_age');
        });
    }
}
