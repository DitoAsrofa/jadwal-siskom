<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UtamaController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::all();
        $skrg = '';
        $jml = Jadwal::count();



        return view('utama', compact('jadwal', 'jml', 'skrg'));
    }

    public function hari($id){
        $hariDrop = date('d', strtotime($id));
        $hari = explode(',',$id);
        $skrg = "hari " . $hari[0];
        $jadwal = Jadwal::get()->where('hari','=',$hari[0]);
        $jml = Jadwal::get()->where('hari','=',$hari[0])->count();
        return view('utama', compact('jadwal', 'jml', 'skrg'));

    }
}

