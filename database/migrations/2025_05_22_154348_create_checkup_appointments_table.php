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
        Schema::create('checkup_appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_patient");
            $table->unsignedBigInteger("id_checkup_schedule");
            $table->longText("complaint");
            $table->integer("queue_number");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkup_appointments');
    }
};
