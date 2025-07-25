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
        Schema::table('schedules', function (Blueprint $table) {
            $table->string('weight')->nullable();
            $table->string('anemia')->nullable();
            $table->string('blood_pressure')->nullable();
            $table->integer('pregnancy_week')->nullable();
            $table->string('uterus_height')->nullable();
            $table->string('fetal_heartbeat')->nullable();
            $table->string('symptoms_and_treatment')->nullable();
            $table->boolean('suspicion')->default(false); // for ANC
            $table->boolean('urine_test')->default(false); // for ANC
            $table->boolean('urine_sugar')->default(false); // for ANC
            $table->string('hemoglobin')->nullable(); // for PNC
            $table->boolean('sifalip')->default(false); // for ANC
            $table->boolean('iron_folate_tablets')->default(false); // for PNC
            $table->boolean('is_transfer')->default(false); // for ANC
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('schedules', function (Blueprint $table) {
            //
        });
    }
};
