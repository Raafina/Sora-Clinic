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
        Schema::create('checkup_schedules', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger("id_doctor");
            $table->enum('day', ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']);
            $table->time('start_time');
            $table->time('end_time');
            $table->boolean("status");
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkup_schedules');
    }
};
