<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateOrderTableAddDateAndRepFoto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function(Blueprint $table){
            $table->date('dateSelesai')->nullable()->default(null)->after('dateIn');
            $table->date('dateMulaiReparasi')->nullable()->default(null)->after('dateIn');
            $table->date('dateDiagnosa')->nullable()->default(null)->after('dateIn');
            $table->date('datePenjemputan')->nullable()->default(null)->after('dateIn');
            $table->string('fotoReparasi')->nullable()->default(null)->after('foto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function(Blueprint $table){
            $table->dropColumn('datePenjemputan');
            $table->dropColumn('dateDiagnosa');
            $table->dropColumn('dateMulaiReparasi');
            $table->dropColumn('dateSelesai');
            $table->dropColumn('fotoReparasi');
        });
    }
}
