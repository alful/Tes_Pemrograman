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
        Schema::create('TBL_HBELI', function (Blueprint $table) {
            $table->id();
            $table->char('NOTRANSAKSI', 10)->unique();
            $table->char('KODESPL', 10);
            $table->foreign('KODESPL')->references('KODESPL')->on('TBL_SUPLIER');
            $table->date('TGLBELI')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TBL_HBELI');
    }
};
