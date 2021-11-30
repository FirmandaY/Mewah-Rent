<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaleriplTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeripl', function (Blueprint $table) {
            $table->id();
            $table->string('nama_galeri');
            $table->string('galeri_seo');
            $table->text('keterangan');
            $table->string('foto');
            $table->unsignedBigInteger('id_produk');
            $table->foreign('id_produk')->references('id')->on('produklain')->onDelete('cascade');
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
        Schema::dropIfExists('galeripl');
    }
}
