<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersprofilesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('usersprofiles', function (Blueprint $table) {
            $table->id("user_id");
            $table->string("firstname", 255);
            $table->string("lastname", 255);
            $table->string("mi", 2)->nullable();
            $table->enum('gender', ['Male', 'Female', 'Rather not to say'])->nullable();
            $table->date('birthdate')->nullable();
            $table->bigInteger('phonenumber')->nullable();
            $table->string('profile_img', 50)->nullable();
            $table->string('email', 255)->nullable();
            $table->timestamp('date_registered')->useCurrent()->nullable();
            $table->string('username', 255);
            $table->string('password', 100);
            $table->enum('usertype', ['admin', 'customer', 'staff']);
            $table->enum('active_status', ['logout', 'login', ''])->default('logout');
            $table->timestamps();
        });

        DB::table('usersprofiles')->insert([
            [
                'user_id' => 20669931,
                'firstname' => 'John Micky',
                'lastname' => 'Butnandes',
                'mi' => '',
                'gender' => 'Male',
                'birthdate' => '2002-01-06',
                'phonenumber' => 9386834879,
                'profile_img' => 'user_img_6486e0883a260_1682737338692.jpg',
                'email' => 'butnande.johnmicky@gmail.com',
                'date_registered' => '2023-09-14 14:04:54',
                'username' => 'admin@gmail.com',
                'password' => 'admin1',
                'usertype' => 'admin',
                'active_status' => 'logout',
            ],
            [
                'user_id' => 20669932,
                'firstname' => 'Sad',
                'lastname' => 'Boy',
                'mi' => '',
                'gender' => 'Female',
                'birthdate' => '2023-06-10',
                'phonenumber' => 9123455667,
                'profile_img' => null,
                'email' => 'gtfsyczl@gmail.com',
                'date_registered' => '2023-06-15 17:15:27',
                'username' => 'user1@gmail.com',
                'password' => 'user1',
                'usertype' => 'customer',
                'active_status' => 'logout',
            ],
            [
                'user_id' => 20669937,
                'firstname' => 'Robin',
                'lastname' => 'Hood',
                'mi' => 'A',
                'gender' => 'Female',
                'birthdate' => '2023-06-16',
                'phonenumber' => 9386834879,
                'profile_img' => 'user_img_648c708c5f5fb_robinhood.jpg',
                'email' => 'test@gmail.com',
                'date_registered' => '2023-06-16 14:26:41',
                'username' => 'test@gmail.com',
                'password' => '12345',
                'usertype' => 'staff',
                'active_status' => 'logout',
            ],
            [
                'user_id' => 20669938,
                'firstname' => 'Incharge',
                'lastname' => 'Me',
                'mi' => 'A',
                'gender' => 'Female',
                'birthdate' => '2023-06-16',
                'phonenumber' => 9386834879,
                'profile_img' => '',
                'email' => 'incharge1@gmail.com',
                'date_registered' => '2023-06-16 14:26:41',
                'username' => 'incharge1@gmail.com',
                'password' => 'incharge1',
                'usertype' => 'staff',
                'active_status' => 'logout',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('usersprofiles');
    }
}
