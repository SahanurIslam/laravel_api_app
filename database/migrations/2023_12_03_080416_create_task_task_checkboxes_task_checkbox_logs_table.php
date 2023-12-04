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
        Schema::create('task_task_checkboxes_task_checkbox_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('RecId');
            $table->unsignedBigInteger('parent');
            $table->dateTime('CreatedDate');
            $table->string('CreatedBy')->nullable();
            $table->boolean('IsChecked');
            $table->longText('Description')->nullable();
            $table->timestamps();
            // $table->foreign('parent')->references('RecId')->on('task_task_checkboxes')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_task_checkboxes_task_checkbox_logs');
    }
};
