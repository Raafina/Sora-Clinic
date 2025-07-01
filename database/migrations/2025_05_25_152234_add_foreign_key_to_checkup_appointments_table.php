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
        Schema::table("checkup_appointments", function (Blueprint $table) {
            $table->foreign("id_patient")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("id_checkup_schedule")->references("id")->on("checkup_schedules")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("checkup_appointments", function (Blueprint $table) {
            $table->dropForeign(["id_patient"]);
            $table->dropForeign(["id_checkup_schedule"]);
        });
    }
};
