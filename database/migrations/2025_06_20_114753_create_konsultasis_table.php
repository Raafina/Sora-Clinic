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
        Schema::create('konsultasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_user_pasien")->references("id")->on("users")->onDelete("cascade");
            $table->foreignId("id_user_dokter")->references("id")->on("users")->onDelete("cascade");
            $table->string('subjek');
            $table->text('pertanyaan');
            $table->string('jawaban')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konsultasis');
    }
};
