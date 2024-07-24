<?php

use App\Models\Ruangan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::create('jadwal', function (Blueprint $table) {
    //         $table->id();
    //         $table->unsignedBigInteger('idnim');
    //         $table->foreign('idnim')->references('id')->on('mahasiswa');

    //         $table->unsignedBigInteger('pembimbing1_id')->nullable();
    //         $table->unsignedBigInteger('pembimbing2_id')->nullable();
    //         $table->unsignedBigInteger('penguji1_id')->nullable();
    //         $table->unsignedBigInteger('penguji2_id')->nullable();
    //         $table->foreign('pembimbing1_id')->references('id')->on('dosen');
    //         $table->foreign('pembimbing2_id')->references('id')->on('dosen');
    //         $table->foreign('penguji1_id')->references('id')->on('dosen');
    //         $table->foreign('penguji2_id')->references('id')->on('dosen');
    //         $table->unsignedBigInteger('idruangan');
    //         $table->foreign('idruangan')->references('id')->on('ruangan');
    //         $table->string('judul', 200);
    //         $table->string('jenis_seminar', 20);
    //         $table->date('tgl');
    //         $table->time('jam_mulai');
    //         $table->time('jam_selesai');
    //         $table->string('hari', 255);
    //         $table->timestamps();
    //     });
    // }

//     public function up()
// {
//     Schema::create('jadwal', function (Blueprint $table) {
//         $table->id();

//         // Kolom untuk menghubungkan dengan mahasiswa
//         $table->unsignedBigInteger('idnim');
//         $table->foreign('idnim')->references('id')->on('mahasiswa');

//         // Kolom-kolom untuk menghubungkan dengan dosen
//         $table->unsignedBigInteger('pembimbing1_id')->nullable();
//         $table->unsignedBigInteger('pembimbing2_id')->nullable();
//         $table->unsignedBigInteger('penguji1_id')->nullable();
//         $table->unsignedBigInteger('penguji2_id')->nullable();

//         // Menghubungkan kolom dosen dengan tabel dosen
//         $table->foreign('pembimbing1_id')->references('id')->on('dosen');
//         $table->foreign('pembimbing2_id')->references('id')->on('dosen');
//         $table->foreign('penguji1_id')->references('id')->on('dosen');
//         $table->foreign('penguji2_id')->references('id')->on('dosen');

//         // Kolom untuk menghubungkan dengan ruangan
//         $table->unsignedBigInteger('idruangan');
//         $table->foreign('idruangan')->references('id')->on('ruangan');

//         // Informasi jadwal
//         $table->string('judul', 200);
//         $table->string('jenis_seminar', 20);
//         $table->date('tgl');
//         $table->time('jam_mulai');
//         $table->time('jam_selesai');
//         $table->string('hari', 255);

//         // Timestamps standar Laravel
//         $table->timestamps();
//     });
// }

public function up()
{
    Schema::create('jadwal', function (Blueprint $table) {
        $table->id();

        // Kolom untuk menghubungkan dengan mahasiswa
        $table->unsignedBigInteger('mahasiswa_id')->nullabel();
        $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa');

        // Menghubungkan kolom dosen dengan tabel dosen (tanpa pembimbing1_id, pembimbing2_id, penguji1_id, penguji2_id)
        $table->unsignedBigInteger('pembimbing1_id')->nullable();
        $table->unsignedBigInteger('penguji1_id')->nullable();

        // Menghubungkan kolom dosen dengan tabel dosen
        $table->foreign('pembimbing1_id')->references('id')->on('dosen');
        $table->foreign('penguji1_id')->references('id')->on('dosen');

        $table->unsignedBigInteger('pembimbing2_id')->nullable();
        $table->unsignedBigInteger('penguji2_id')->nullable();

        // Menghubungkan kolom dosen dengan tabel dosen
        $table->foreign('pembimbing2_id')->references('id')->on('dosen');
        $table->foreign('penguji2_id')->references('id')->on('dosen');

        // Kolom untuk menghubungkan dengan ruangan
        $table->unsignedBigInteger('idruangan');
        $table->foreign('idruangan')->references('id')->on('ruangan');

        // Informasi jadwal
        $table->string('judul', 200);
        $table->string('jenis_seminar', 20);
        $table->date('tgl');
        $table->time('jam_mulai');
        $table->time('jam_selesai');
        $table->string('hari', 255);

        // Timestamps standar Laravel
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
        Schema::dropIfExists('jadwal');
    }
}
