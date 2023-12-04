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
        Schema::create('dossier_client_living_situations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent');
            $table->enum('LivingSituationTypes', ["Alleenstaand", "Alleenstaand_met_kinderen", "Samenwonend", "Verblijf_in_instelling", "Zonder_vaste_woonplaats", "Samenwonend_met_kinderen", "Is_inwonend_bij_ouders", "Kostganger", "Onbekend"])->nullable();
            $table->timestamps();
            // $table->foreign('parent')->references('RecId')->on('dossier_clients')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dossier_client_living_situations');
    }
};
