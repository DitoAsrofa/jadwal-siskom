<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::create('dosen', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('nip', 18);
    //         $table->unsignedBigInteger('pembimbing1_id')->nullable();
    //         $table->unsignedBigInteger('pembimbing2_id')->nullable();
    //         $table->unsignedBigInteger('penguji1_id')->nullable();
    //         $table->unsignedBigInteger('penguji2_id')->nullable();
    //         $table->string('nama_dosen', 50);
    //         $table->string('no_hp', 20);
    //         $table->date('tanggal_lahir');
    //         $table->timestamps();
    //     });
    // }

    public function up()
    {
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 18);

            $table->string('nama_dosen', 50);
            $table->string('no_hp', 20);
            $table->date('tanggal_lahir');
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
        Schema::dropIfExists('dosen');
    }
}
