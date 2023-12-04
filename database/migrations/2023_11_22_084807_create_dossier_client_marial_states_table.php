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
        Schema::create('dossier_client_marial_states', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent');
            $table->enum('MaritalStatusTypes', ["Ongehuwd", "Gehuwd", "Geregistreerd_Partnerschap", "Weduwe_Weduwnaar", "Gescheiden", "Onbekend"])->nullable();
            $table->timestamps();
            // $table->foreign('parent')->references('RecId')->on('dossier_clients')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dossier_client_marial_states');
    }
};
