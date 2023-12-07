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
            $table->foreign('NOTRANSAKSI')->references('NOTRANSAKSI')->on('TBL_HBELI')->onDelete('cascade');;

            // $table->char('KODEBRG', 10);
            // $table->foreignId('KODEBRG');
            $table->char('KODEBRG', 10);
            $table->foreign('KODEBRG')->references('KODEBRG')->on('TBL_BARANG');

            // $table->unsignedBigInteger('HARGABELI');
            $table->foreignId('HARGABELI');
            $table->integer('QTY');
            $table->integer('DISKON');
            $table->float('DISKONRP');
            $table->integer('TOTALRP');

            $table->timestamps();
        });
        // Schema::table('TBL_DBELI', function ($table) {
        //     $table->foreign('HARGABELI')
        //         ->references('HARGABELI')->on('TBL_BARANG');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TBL_DBELI');
    }
};
