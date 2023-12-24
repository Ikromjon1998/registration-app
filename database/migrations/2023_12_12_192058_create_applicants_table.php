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
         * Create table applicants.
         * 'user_id',
         * 'first_name',
         * 'last_name',
         * 'gender',
         * 'birthday',
         * 'birthplace_city',
         * 'birthplace_country',
         * 'citizenship',
         * 'phone_number',
         * 'telephone_number',
         * 'email',
         * 'is_photo_usage_accepted',
         */
        Schema::create('applicants', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('gender', ['M', 'F', 'D']);
            $table->date('birthday');
            $table->string('birthplace_city');
            $table->string('birthplace_country');
            $table->string('citizenship');
            $table->string('phone_number')->nullable();
            $table->string('telephone_number')->nullable();
            $table->string('email');
            $table->boolean('is_photo_usage_accepted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
