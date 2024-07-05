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
        Schema::create('quiz_infos', function (Blueprint $table) {
            $table->uuid('id');
            $table->unsignedBigInteger('type_id')->default(0);
            $table->unsignedBigInteger('category_id')->default(0);
            $table->unsignedBigInteger('level_id')->default(0);
            $table->string('title')->default(null);
            $table->string('slug');
            $table->string('image')->default(null);
            $table->string('rule')->default(null);
            $table->text('description')->default(null);
            $table->integer('duration')->default(null);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_infos');
    }
};
