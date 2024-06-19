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
        Schema::create('indication_lists', function (Blueprint $table) {
            $table->id();
            $table->string('indication_code');
            $table->foreign('indication_code')->references('indication_code')->on('indications')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('knowledge_id')->constrained('knowledge_data')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indication_lists');
    }
};
