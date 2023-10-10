<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLisensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lisensi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dokumen');
            $table->date('start');
            $table->date('end');
            $table->date('reminder1')->nullable();
            $table->date('reminder2')->nullable();
            $table->date('reminder3')->nullable();
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
        Schema::dropIfExists('lisensi');
    }
}
