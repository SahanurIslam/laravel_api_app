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
        Schema::create('childworkflows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('RecId');
            $table->unsignedBigInteger("parent");
            $table->string('DossierNumber')->nullable();
            $table->longText('TaskIds')->nullable();
            $table->timestamps();
            $table->foreign('parent')->references('RecId')->on('workflows')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('childworkflows');
    }
};
