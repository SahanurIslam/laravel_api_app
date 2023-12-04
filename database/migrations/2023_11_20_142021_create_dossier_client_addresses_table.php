<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 

     */
    public function up(): void
    {
        Schema::create('dossier_client_addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('RecId');
            $table->unsignedBigInteger('parent');
            $table->string('Streetname')->nullable();
            $table->string('Housenumber')->nullable();
            $table->string('PostalCode')->nullable();
            $table->string('City')->nullable();
            $table->timestamps();
            //  $table->foreign('parent')->references('RecId')->on('dossier_clients')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dossier_client_addresses');
    }
};
