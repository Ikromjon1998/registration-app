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
        Schema::create('apprenticeships', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('applicant_id');
            $table->enum('apprentice_as', ['ZFA', 'MFA']);
            $table->string('company_name');
            $table->string('company_street');
            $table->string('company_house_number');
            $table->string('contact_person');
            $table->string('company_phone_number');
            $table->string('company_fax_number')->nullable();
            $table->string('company_email')->nullable();
            $table->string('apprentice_wish_week_days1');
            $table->string('apprentice_wish_week_days2')->nullable();
            $table->timestamps();

            $table->foreign('applicant_id')->references('id')->on('applicants');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apprenticeships');
    }
};
