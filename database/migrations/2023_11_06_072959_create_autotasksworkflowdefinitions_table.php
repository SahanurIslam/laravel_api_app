<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * RecId	

     */
    public function up(): void
    {
        Schema::create('autotasksworkflowdefinitions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('RecId');
            $table->unsignedBigInteger('parent');
            $table->string('Title')->nullable();
            $table->longText('Description')->nullable();
            $table->string('ActionType')->nullable();
            $table->integer('AmountDaysStart');
            $table->integer('AmountDaysDeadLine');
            $table->string('PriorityType')->nullable();
            $table->boolean('Active');
            $table->string('Rubriek')->nullable();
            $table->integer('ParentAutoTaskRecId')->nullable();
            $table->timestamps();
            $table->foreign('parent')->references('RecId')->on('workflowdefinitions')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autotasksworkflowdefinitions');
    }
};
