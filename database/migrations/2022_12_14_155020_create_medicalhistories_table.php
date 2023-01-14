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
        Schema::create('medicalhistories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id');
            $table->string('od');
            $table->string('os');
            $table->string('r');
            $table->string('l');
            $table->string('pd');
            $table->string('tint');
            $table->string('lens');
            $table->mediumText('medicalpres');
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
        Schema::dropIfExists('medicalhistories');
    }
};
