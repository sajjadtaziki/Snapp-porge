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
        Schema::create('the_drivers', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Family');
            $table->string('Code_meli');
            $table->string('Number_p');
            $table->string('Image')->nullable();
            $table->string('phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('the_drivers');
    }
};
