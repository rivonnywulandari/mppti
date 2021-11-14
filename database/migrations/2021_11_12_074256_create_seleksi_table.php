<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeleksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seleksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id')->constrained('daftar')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreignId('id_seleksi')->constrained('jenisseleksi')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->float('nilai');
            $table->string('keterangan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seleksi');
    }
}
