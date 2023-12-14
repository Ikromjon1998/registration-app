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
        /**
         * 'user_id',
         * 'street',
         * 'house_number',
         * 'city',
         * 'zip_code',
         * 'country',
         * 'live_by',
         * 'person_in_case_of_emergency',
         * 'phone_number_in_case_of_emergency',
         */
        Schema::create('residences', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('applicant_id');
            $table->string('street')->nullable();
            $table->string('house_number')->nullable();
            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('live_by')->nullable();
            $table->string('person_in_case_of_emergency')->nullable();
            $table->string('phone_number_in_case_of_emergency')->nullable();
            $table->timestamps();

            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residences');
    }
};
