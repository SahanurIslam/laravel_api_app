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
        Schema::create('autotask_auto_task_checkboxesworkflodefinitions', function (Blueprint $table) {
            $table->id();
            $table->integer('RecId');
            $table->unsignedBigInteger('parent');
            $table->string('Title')->nullable();
            $table->longText('Description')->nullable();
            $table->boolean('Enforce');
            $table->integer('Sequence');
            $table->string('LinkedForm')->nullable();
            $table->string('LinkedTemplate')->nullable();
            $table->timestamps();
            // $table->foreign('parent')->references('RecId')->on('autotasksworkflowdefinitions')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autotask_auto_task_checkboxesworkflodefinitions');
    }
};
