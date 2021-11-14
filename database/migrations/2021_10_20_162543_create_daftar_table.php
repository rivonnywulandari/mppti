<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar', function (Blueprint $table) {
            $table->integer('daftar_id')->autoIncrement();
            $table->integer('id')->nullable($value=false);
            $table->foreign('id')->references('id')->on('users');
            $table->string('jenis_kelamin', 20)->nullable($value=false);
            $table->string('tempat_lahir', 20)->nullable($value=false);
            $table->date('tanggal_lahir')->nullable($value=false);
            $table->string('asal', 50)->nullable($value=false);
            $table->text('alamat')->nullable($value=false);
            $table->text('alasan')->nullable($value=false);
            $table->text('kontribusi')->nullable($value=false);
            $table->text('kenapa')->nullable($value=false);
            $table->text('apakah')->nullable($value=false);
            $table->text('bersediakah')->nullable($value=false);
            $table->text('filezip')->nullable();
            $table->string('status', 50);

            // $table->binary('filezip')->nullable($value=false);
            // $table->file('ktm')->nullable($value=false);
            // $table->file('krs')->nullable($value=false);
            // $table->file('transkrip_nilai')->nullable($value=false);
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
        Schema::dropIfExists('daftar');
    }
}
