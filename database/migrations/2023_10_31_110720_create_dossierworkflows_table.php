<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('dossierworkflows', function (Blueprint $table) {
            $table->id('RecId');
            $table->integer('DossierId');
            $table->string('DossierNumber')->nullable();
            $table->integer('WorkflowId')->nullable();
            $table->string('WorkflowTitle')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dossierworkflows');
    }
};
