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
        Schema::create('task_task_checkboxes', function (Blueprint $table) {
            $table->id();
            $table->integer('RecId');
            $table->unsignedBigInteger('parent');
            $table->integer('AutoTaskCheckboxId');
            $table->string('Title')->nullable();
            $table->string('Description')->nullable();
            $table->boolean('Enforce');
            $table->boolean('IsChecked');
            $table->timestamps();
            $table->foreign('parent')->references('RecId')->on('tasks')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_task_checkboxes');
    }
};
