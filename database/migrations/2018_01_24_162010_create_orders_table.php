<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('alamat');
            $table->integer('user_id')->unsigned();                      // bind ke identitas customer
            $table->dateTimeTz('dateIn');                                   // tanggal saat barang masuk
            $table->dateTimeTz('dateOut')->nullable()->default(null);       // tanggal barang jadi / bisa diambil
            $table->string('tipeKerusakan')->nullable()->default(null);     // jenis kerusakan yang akan diservis, bisa banyak, yang ngisi bisa pegawai
            $table->text('keluhan');                                        // deskripsi tambahan
            $table->string('kelengkapan');                                  // kelengkapan barang servisan
            $table->integer('status');                                      // bisa diambil / belom
            $table->integer('harga')->nullable()->default(null);            // 
            $table->integer('DP')->nullable()->default(null);               //

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
