<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;

class Jadwal extends Model
{
    protected $table = "jadwal";
    protected $primarykey = "id";
    protected $guarded =  ['id'];
    // protected $fillable = [
    //     'id', 'judul', 'jenis_seminar','mahasiswa_id', 'pembimbing1_id','pembimbing2_id','penguji1_id','penguji2_id','idruangan', 'tgl', 'hari','jam_mulai','jam_selesai'];

    public function ruangan(){
        return $this->belongsTo(Ruangan::class, 'idruangan');
    }

    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function dosen(){
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }


    public function pembimbing1(){
        return $this->belongsTo(Dosen::class, 'pembimbing1_id');
    }

    public function pembimbing2(){
        return $this->belongsTo(Dosen::class, 'pembimbing2_id');
    }

    public function penguji1(){
        return $this->belongsTo(Dosen::class, 'penguji1_id');
    }

    public function penguji2(){
        return $this->belongsTo(Dosen::class, 'penguji2_id');
    }

    public function getCreatedAtAttribute(){
        return Carbon::parse(date('d F Y'))
            ->translatedFormat('l, d F Y');
    }
}
