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
        Schema::create('TBL_HUTANG', function (Blueprint $table) {
            $table->id();

            $table->char('NOTRANSAKSI', 10);
            $table->foreign('NOTRANSAKSI')->references('NOTRANSAKSI')->on('TBL_HBELI')->onDelete('cascade');;

            $table->char('KODESPL', 10);
            $table->foreign('KODESPL')->references('KODESPL')->on('TBL_SUPLIER');

            $table->date('TGLBELI');
            // $table->foreign('TGLBELI')->references('TGLBELI')->on('TBL_HBELI');
            // $table->foreign('TGLBELI')->constrained(
            //     table: 'TBL_DBELI',
            //     indexName: 'TGLBELI'
            // );
            // $table->integer('TOTALHUTANG');
            $table->foreignId('TOTALHUTANG');
            // $table->foreign('TOTALHUTANG')->references('TOTALRP')->on('TBL_DBELI');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TBL_HUTANG');
    }
};
