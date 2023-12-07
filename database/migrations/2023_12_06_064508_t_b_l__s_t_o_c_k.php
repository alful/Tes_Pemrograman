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
        Schema::create('TBL_STOCK', function (Blueprint $table) {
            $table->char('KODEBRG', 10);
            $table->foreign('KODEBRG')->references('KODEBRG')->on('TBL_BARANG')->onDelete('cascade');;
            $table->integer('QTYBELI');
            // $table->foreignId('QTYBELI')->constrained(
            //     table: 'TBL_DBELI',
            //     indexName: 'QTYBELI'
            // );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TBL_STOCK');
    }
};
