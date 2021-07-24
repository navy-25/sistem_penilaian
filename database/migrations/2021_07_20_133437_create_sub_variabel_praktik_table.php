<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubVariabelPraktikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_variabel_praktik', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('id_variabel_praktik')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('kkm')->nullable();
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
        Schema::dropIfExists('sub_variabel_praktik');
    }
}
