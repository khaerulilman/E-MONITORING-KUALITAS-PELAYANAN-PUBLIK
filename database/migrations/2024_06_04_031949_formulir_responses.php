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
        Schema::create('formulir_responses', function (Blueprint $table) {
            $table->id(); // id
            $table->unsignedBigInteger('survey_id'); // Add survey_id column
            $table->unsignedBigInteger('masyarakat_id'); // masyarakat_id
            $table->unsignedBigInteger('question_id'); // question_id
            $table->integer('rating'); // rating
            $table->timestamps();
            
            // Foreign keys
            $table->foreign('survey_id')->references('id')->on('surveys')->onDelete('cascade');
            $table->foreign('masyarakat_id')->references('id')->on('masyarakats')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulir_responses');
    }
};
