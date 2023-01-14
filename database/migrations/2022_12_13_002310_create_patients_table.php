<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id');
            $table->string('user_email');
            $table->foreign('user_email')->references('email')->on('users');
            $table->string('fullName');
            $table->string('gender');
            $table->string('contactno', 11);
            $table->string('address');
            $table->integer('age');
            $table->longText('medhistory');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
};
