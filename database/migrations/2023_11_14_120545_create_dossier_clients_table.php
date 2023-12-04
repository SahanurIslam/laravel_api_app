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
        Schema::create('dossier_clients', function (Blueprint $table) {
            $table->id();
            $table->integer('RecId');
            $table->unsignedBigInteger('parent');
            $table->string('LastName')->nullable();
            $table->string('Preposition')->nullable();
            $table->string('GivenNames')->nullable();
            $table->string('FirstName')->nullable();
            $table->dateTime('DateOfBirth');
            $table->string('Bsn')->nullable();
            $table->string('Telephone')->nullable();
            $table->string('MobileTelephone')->nullable();
            $table->string('EmailAddress')->nullable();
            $table->enum('Sex', ["Man", "Vrouw", "Onbekend", "X"]);
            $table->timestamps();
            $table->foreign('parent')->references('RecId')->on('dossiers')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dossier_clients');
    }
};
