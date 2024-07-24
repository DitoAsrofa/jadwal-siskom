<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

// class InfoController extends Controller
// {
//     public function index()
//     {
//         $jadwal = Jadwal::all();
//         $skrg = '';
//         $jml = Jadwal::count();



//         return view('info', compact('jadwal', 'jml', 'skrg'));
//     }

//     public function hari($id){

//         $hariDrop = date('d', strtotime($id));

//         $hari = explode(',',$id);
//         $skrg = "hari " . $hari[0];
//         $jadwal = Jadwal::get()->where('hari','=',$hari[0]);
//         $jml = Jadwal::get()->where('hari','=',$hari[0])->count();
//         return view('info', compact('jadwal', 'jml', 'skrg'));

//     }
// }

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use Illuminate\Support\Carbon;

class InfoController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        // $tomorrow = Carbon::tomorrow();
        // $dayAfterTomorrow = Carbon::today()->addDays(2);

        // Filter data jadwal berdasarkan tanggal
        // $jadwal = Jadwal::whereDate('tgl', $today)
        //     ->orWhereDate('tgl', $tomorrow)
        //     ->orWhereDate('tgl', $dayAfterTomorrow)
        //     ->get();
        $jadwal = Jadwal::whereDate('tgl', '>=', $today)
        // ->take(2)
            ->get();

        $skrg = "hari ini, besok, dan lusa";
        $jml = $jadwal->count();

        return view('info', compact('jadwal', 'jml', 'skrg'));
    }
}




