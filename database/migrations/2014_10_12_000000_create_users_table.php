<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('verified')->default(false);
            $table->string('role')->default('visitor');
            $table->string('mobile')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert(
            array(
                'email' => 'dezinerbilal@outlook.com',
                'verified' => true,
                'password'=>bcrypt('A123456a*'),
                'name' => 'Bilal',
                'role' => 'admin',
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
