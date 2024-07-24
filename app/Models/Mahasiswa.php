<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table= "mahasiswa";
    protected $primarykey = "id";
    protected $fillable = ['id', 'nim', 'nama_mahasiswa'];

    public function jadwal(){
        return $this->hasMany(Jadwal::class);
    }

}

// test
