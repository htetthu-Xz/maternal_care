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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('age');
            $table->string('address');
            $table->string('blood_type');
            $table->string('father_name')->nullable();
            $table->integer('father_age')->nullable();
            $table->string('father_blood_group', 3)->nullable();
            $table->boolean('is_estimated_date_of_birth_known')->default(false);
            $table->date('delivery_date')->nullable();
            $table->boolean('is_expect_selected_for_birth')->default(false);
            $table->boolean('is_emergency_clinic')->default(false);
            $table->boolean('has_decision_maker_in_emergency')->default(false);
            $table->boolean('knows_how_to_get_money_in_emergency')->default(false);
            $table->boolean('has_planned_transport_for_emergency')->default(false);
            $table->boolean('has_basic_delivery_supplies')->default(false);
            $table->boolean('has_planned_companion_for_birth_and_24h')->default(false);
            $table->boolean('has_planned_helper_for_household_and_childcare')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
