<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table= "dosen";
    protected $primarykey = "id";
    protected $fillable = ['id', 'nip','nama_dosen', 'no_hp', 'tanggal_lahir'];

    public function pembimbing1(){
        return $this->hasMany(Jadwal::class, 'pembimbing1_id');
    }

    public function pembimbing2(){
        return $this->hasMany(Jadwal::class, 'pembimbing2_id');
    }

    public function penguji1(){
        return $this->hasMany(Jadwal::class, 'penguji1_id');
    }

    public function penguji2(){
        return $this->hasMany(Jadwal::class, 'penguji2_id');
    }
}
