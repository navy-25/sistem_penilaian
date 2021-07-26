<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiPraktikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_praktik', function (Blueprint $table) {
            $table->id();
            $table->string('id_siswa')->nullable();
            $table->string('id_kelas')->nullable();
            $table->string('id_variabel_praktek')->nullable();
            $table->string('nilai')->nullable();
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
        Schema::dropIfExists('nilai_praktik');
    }
}
