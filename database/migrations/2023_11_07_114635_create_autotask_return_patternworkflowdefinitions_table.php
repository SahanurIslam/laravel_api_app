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
        Schema::create('autotask_return_patternworkflowdefinitions', function (Blueprint $table) {;
            $table->id();
            $table->unsignedBigInteger('parent');
            $table->string('Type')->nullable();
            $table->string('WeeksDay')->nullable();
            $table->integer('WeeksEvery')->nullable();
            $table->integer('MonthDayNumber')->nullable();
            $table->integer('MonthsEvery')->nullable();
            $table->integer('YearDayNumber')->nullable();
            $table->integer('YearMonth')->nullable();
            $table->integer('YearsEvery')->nullable();
            $table->integer('VisibleFrom')->nullable();
            $table->dateTime('ReachStartDate')->nullable();
            $table->string('ReachType')->nullable();
            $table->integer('ReachAmount')->nullable();
            $table->integer('ReachAmountLeft')->nullable();
            $table->dateTime('ReachEndDate')->nullable();
            $table->dateTime('NextCreateDate')->nullable();
            $table->dateTime('NextExecuteDate')->nullable();
            $table->boolean('Done')->nullable();
            $table->timestamps();
            // $table->foreign('parent')->references('RecId')->on('autotasksworkflowdefinitions')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autotask_return_patternworkflowdefinitions');
    }
};
