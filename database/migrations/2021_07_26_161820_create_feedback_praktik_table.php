<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackPraktikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback_praktik', function (Blueprint $table) {
            $table->id();
            $table->string('id_siswa')->nullable();
            $table->string('id_kelas')->nullable();
            $table->string('id_variabel_praktek')->nullable();

            $table->string('red_1')->nullable();
            $table->string('red_2')->nullable();
            $table->string('red_3')->nullable();

            $table->string('vid_1')->nullable();
            $table->string('vid_2')->nullable();

            $table->string('catatan')->nullable();
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
        Schema::dropIfExists('feedback_praktik');
    }
}
