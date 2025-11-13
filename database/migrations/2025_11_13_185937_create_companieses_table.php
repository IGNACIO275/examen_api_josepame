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
        Schema::create('companieses', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('nit');
            $table->string('person_type');
            $table->string('legal_representative_name');
            $table->string('legal_representative_lastname');
            $table->string('legal_representative_email');
            
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companiesses');
    }
};
