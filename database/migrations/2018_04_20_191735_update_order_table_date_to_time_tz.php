<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateOrderTableDateToTimeTz extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function(Blueprint $table){
            $table->dateTimeTz('datePenjemputan')->nullable()->default(null)->change();
            $table->dateTimeTz('dateDiagnosa')->nullable()->default(null)->change();
            $table->dateTimeTz('dateMulaiReparasi')->nullable()->default(null)->change();
            $table->dateTimeTz('dateSelesai')->nullable()->default(null)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
