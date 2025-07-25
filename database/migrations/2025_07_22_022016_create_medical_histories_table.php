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
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->date('registered_date');
            $table->date('last_menstruation_date');
            $table->date('estimated_delivery_date');
            $table->date('last_birth_or_miscarriage_date')->nullable();
            $table->integer('pregnancy_count')->nullable();
            $table->string('education_level')->nullable();
            $table->boolean('has_birth_defect_history')->default(false);
            $table->boolean('smokes')->default(false);
            $table->boolean('chews_betel')->default(false);
            $table->text('allergic_medicines')->nullable();
            $table->text('current_medicines')->nullable();
            $table->longText('disease_history')->nullable(); // store array of diseases
            $table->text('other_diseases')->nullable();
            $table->boolean('used_birth_control')->default(false);
            $table->string('birth_control_method')->nullable();
            $table->string('birth_control_duration')->nullable();
            $table->boolean('hiv_syphilis_counseling')->default(false);
            $table->boolean('deworming_given')->default(false);
            $table->boolean('iron_supplement_given')->default(false);
            $table->date('tt_vaccine_1_date')->nullable();
            $table->date('tt_vaccine_2_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_histories');
    }
};
