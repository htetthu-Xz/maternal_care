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
            $table->string('fever')->nullable()->after('weight');
            $table->boolean('nipples')->nullable()->after('anemia');
            $table->boolean('hard_uterus')->nullable()->after('blood_pressure');
            $table->boolean('is_regular_menstruation')->nullable()->after('pregnancy_week');
            $table->boolean('is_injury_heal')->nullable()->after('is_regular_menstruation');
            $table->string('vitamin_a')->nullable()->after('uterus_height');
            $table->string('vitamin_b_one')->nullable()->after('vitamin_a');
            $table->string('birth_control')->nullable()->after('vitamin_b_one');
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
