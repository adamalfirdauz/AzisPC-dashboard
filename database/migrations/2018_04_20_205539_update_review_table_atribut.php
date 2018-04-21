<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateReviewTableAtribut extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->integer('orderId')->unsigned();
            $table->foreign('orderId')->references('id')->on('orders');
            $table->dropColumn('foto');
            $table->dropForeign(['customerId']);
            $table->foreign('customerId')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign(['orderId']);
            $table->dropColumn('orderId');
            $table->string('foto')->nullable()->default(null);
        });
    }
}
