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
        Schema::create('dossier_partner_marial_states', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('RecId');
            $table->enum('MaritalStatusTypes', ["Ongehuwd", "Gehuwd", "Geregistreerd_Partnerschap", "Weduwe_Weduwnaar", "Gescheiden", "Onbekend"])->nullable();
            $table->timestamps();
            // $table->foreign('parent')->references('RecId')->on('dossier_partners')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dossier_partner_marial_states');
    }
};
