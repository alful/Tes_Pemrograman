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
        Schema::create('TBL_DBELI', function (Blueprint $table) {
            $table->id();
            $table->char('NOTRANSAKSI', 10);
            $table->foreign('NOTRANSAKSI')->references('NOTRANSAKSI')->on('TBL_HBELI');

            $table->char('KODEBRG', 10)->unique();
            $table->foreign('KODEBRG')->references('KODEBRG')->on('TBL_BARANG');

            $table->integer('HARGABELI');
            $table->foreign('HARGABELI')->references('HARGABELI')->on('TBL_BARANG');
            $table->integer('QTY')->unique();
            $table->integer('DISKON');
            $table->integer('DISKONRP');
            $table->integer('TOTALRP');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TBL_DBELI');
    }
};
