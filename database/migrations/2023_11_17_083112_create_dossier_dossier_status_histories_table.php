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
        Schema::create('dossier_dossier_status_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('RecId');
            $table->unsignedBigInteger('parent');
            $table->integer('DossierId');
            $table->string('DossierStatus')->nullable();
            $table->dateTime('Date');
            $table->timestamps();
            $table->foreign('parent')->references('RecId')->on('dossiers')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dossier_dossier_status_histories');
    }
};
