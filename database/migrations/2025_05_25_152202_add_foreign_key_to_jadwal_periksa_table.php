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
        Schema::table("jadwal_periksas", function (Blueprint $table) {
            $table->foreign("id_dokter")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("jadwal_periksas", function (Blueprint $table) {
            $table->dropForeign(['id_dokter']);
        });
    }
};
