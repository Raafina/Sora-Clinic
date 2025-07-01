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
        Schema::table("checkup_schedules", function (Blueprint $table) {
            $table->foreign("id_doctor")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("checkup_schedules", function (Blueprint $table) {
            $table->dropForeign(['id_doctor']);
        });
    }
};
