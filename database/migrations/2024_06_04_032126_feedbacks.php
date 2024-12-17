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
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id(); // id
            $table->unsignedBigInteger('survey_response_saran_id'); // survey_response_saran_id
            $table->unsignedBigInteger('user_admin_id'); // user_admin_id
            $table->text('feedback'); // feedback
            $table->timestamps();
            
            // Foreign keys
            $table->foreign('survey_response_saran_id')->references('id')->on('formulir_response_sarans')->onDelete('cascade');
            $table->foreign('user_admin_id')->references('id')->on('tbl_user_admin')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};
