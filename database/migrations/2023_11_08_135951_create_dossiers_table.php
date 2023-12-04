<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Afwikkelstatus	

     */
    public function up(): void
    {
        Schema::create('dossiers', function (Blueprint $table) {
            $table->id('RecId');
            $table->string('DossierNumber')->nullable();
            $table->string('Dossiertype')->nullable();
            $table->string('MainUser')->nullable();
            $table->dateTime('IntakeDate')->nullable();
            $table->dateTime('Closed')->nullable();
            $table->string('Afwikkelstatus')->nullable();
            $table->string('Status')->nullable();
            $table->string('AanmeldReden')->nullable();
            $table->boolean('ToegangClient')->nullable();
            $table->boolean('ToegangDerden')->nullable();
            $table->string('DossierGroupList')->nullable();
            $table->string('AfsluitReden')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dossiers');
    }
};
