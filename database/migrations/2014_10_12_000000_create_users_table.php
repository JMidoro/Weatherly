<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->json('location');
        });

        //Creating Admin user
        $default_location = (object) array(
            'postal_code' => env('DEFAULT_POSTAL_CODE'),
            'country' => env('DEFAULT_COUNTRY')
        );
        
        User::create([
            'name' => env('ADMIN_ACCOUNT_USERNAME'),
            'email' =>  env('ADMIN_ACCOUNT_EMAIL'),
            'location' =>  json_encode($default_location),
            'password' => Hash::make(env('ADMIN_ACCOUNT_PASS')),
        ]);

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
