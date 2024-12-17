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
        Schema::create('formulir_response_sarans', function (Blueprint $table) {
            $table->id(); // id
            $table->unsignedBigInteger('masyarakat_id'); // masyarakat_id
            $table->unsignedBigInteger('survey_id'); // survey_id
            $table->text('saran'); // saran
            $table->timestamps();
            
            // Foreign keys
            $table->foreign('masyarakat_id')->references('id')->on('masyarakats')->onDelete('cascade');
            $table->foreign('survey_id')->references('id')->on('surveys')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulir_response_sarans');
    }
};
