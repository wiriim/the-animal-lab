<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // yang gak include => 'gestation period', 'offspring per birth'
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('height'); // cm
            $table->string('weight'); // kg
            $table->string('color');
            $table->string('lifespan'); // years
            $table->string('diet');
            $table->string('habitat');
            $table->string('predators');
            $table->string('avgspeed'); // km/h
            $table->string('topspeed'); // km/h
            $table->string('countries');
            $table->string('conservationStatus');
            $table->string('family');
            $table->string('gestationPeriod'); //days
            $table->string('socialStructure');
            $table->string('image');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
