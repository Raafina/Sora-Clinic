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
        Schema::table('checkup_details', function (Blueprint $table) {
            $table->foreign("id_checkup")->references("id")->on("checkups")->onDelete("cascade");
            $table->foreign("id_medicine")->references("id")->on("medicines")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('checkup_details', function (Blueprint $table) {
            $table->dropForeign(['id_checkup']);
            $table->dropForeign(['id_medicine']);
        });
    }
};
