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
        Schema::create('question_quiz_info', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('quiz_info_id');
            $table->timestamps();

            // $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            // $table->foreign('quiz_info_id')->references('id')->on('quiz_infos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_quiz_info');
    }
};
