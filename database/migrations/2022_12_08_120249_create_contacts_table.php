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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('fullName');
            $table->string('email');
            $table->string('contactNo', 11);
            $table->longText('message');
            $table->longText('adminRemark')->nullable();
            $table->integer('isRead')->default(0);
            $table->timestamps();
        });
    }

    // for doctor
            // $table->id();
            // $table->string('doctorName');
            // $table->string('specialization');
            // $table->string('address');
            // $table->double('docFees', 6, 2);
            // $table->integer('contactNo', 11);
            // $table->string('docEmail')->unique();
            // $table->string('password');
            // $table->timestamps();

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
};
