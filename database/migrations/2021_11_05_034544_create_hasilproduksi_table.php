<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilproduksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasilproduksi', function (Blueprint $table) {
            $table->bigIncrements('id_produksi');
            $table->date('tgl');
            $table->integer('id_barang');
            $table->integer('first_qty');
            $table->integer('qty');
            $table->integer('reject_qty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasilproduksi');
    }
}
