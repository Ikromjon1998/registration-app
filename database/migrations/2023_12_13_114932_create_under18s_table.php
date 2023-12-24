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
         * 'applicant_id',
         * 'mother_first_name',
         * 'mother_last_name',
         * 'mother_phone_number',
         * 'father_first_name',
         * 'father_last_name',
         * 'father_phone_number',
         * 'parent_address',
         * 'guardian_first_name',
         * 'guardian_last_name',
         * 'guardian_phone_number',
         */
        Schema::create('under18s', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('applicant_id');
            $table->string('mother_first_name')->nullable();
            $table->string('mother_last_name')->nullable();
            $table->string('mother_phone_number')->nullable();
            $table->string('father_first_name')->nullable();
            $table->string('father_last_name')->nullable();
            $table->string('father_phone_number')->nullable();
            $table->string('parent_address')->nullable();
            $table->string('guardian_first_name')->nullable();
            $table->string('guardian_last_name')->nullable();
            $table->string('guardian_phone_number')->nullable();
            $table->timestamps();

            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('under18s');
    }
};
