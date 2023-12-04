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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id('RecId');
            $table->string('Title')->nullable();
            $table->text('Description')->nullable();
            $table->dateTime('StartDate')->nullable();
            $table->dateTime('DueDate')->nullable();
            $table->string('Priority')->nullable();
            $table->boolean('IsComplete');
            $table->integer('DossierId');
            $table->boolean('ShowOnDashboard');
            $table->string('TaskType')->nullable();
            $table->integer('AutoTaskId')->nullable();
            $table->string('CloseDate')->nullable()->DateTime();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
