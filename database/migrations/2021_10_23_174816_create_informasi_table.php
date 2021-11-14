<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informasi', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('isi');
            $table->timestamp('created_at')->useCurrent();
            $table->integer('id_users')->nullable($value=false);
            $table->foreign('id_users')->references('id')->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->string('tujuan_informasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informasi');
    }
}
