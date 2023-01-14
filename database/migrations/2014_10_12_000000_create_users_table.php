<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('fullName')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->integer('restriction')->comment('1-admin | 2-doctor | 3-user');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('address');
            // $table->string('city');
            // $table->string('gender');
        });

        DB::table('users')->insert(array(
            'fullName' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@admin.admin',
            'restriction' => 1,
            'password' => Hash::make("admin1234")
        ));
        
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
};
