<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 30);
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
        });
        
        DB::table('users')->insert([
          'username'=>'admin',
          'password'=>Hash::make('123456')
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
