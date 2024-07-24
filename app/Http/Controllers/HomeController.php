<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\Mahasiswa;
use App\Models\User;
use Carbon\Carbon;
// use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Ruangan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except([
            'apiGetAllSchedules',
            'apiGetScheduleById',
            'apiCreateSchedule',
            'apiUpdateSchedule',
            'apiDeleteSchedule'
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dtJadwal = Jadwal::with('ruangan','mahasiswa', 'dosen')->latest()->paginate(5);
        $ruangan = Ruangan::count();
        $users = User::count();
        $jumlahmahasiswa = Mahasiswa::count();
        $dosen = Dosen::count();
        $hari =     Carbon::now()->isoFormat('D MMMM Y');
        $widget = [
            'users' => $users,
            'jadwal' => $dtJadwal,
            'ruangan' => $ruangan,
            'jumlahmahasiswa' => $jumlahmahasiswa,
            'dosen' => $dosen,
            'hari' => $hari
            //...
        ];

        foreach ($dtJadwal as $jw) {
            $jw->formatted_tgl=Carbon::parse($jw->tgl)->translatedFormat('l, d F Y');
        }


        return view('home',$widget);
    }

    public function create()
    {
        $dos = Dosen::all();
        $mhs = Mahasiswa::all();
        $ruang = Ruangan::all();
        return view('input', compact('ruang', 'mhs', 'dos'));
    }

    public function store(Request $request)
    {
        // $test = $request->tgl;
        // $ubah = date('D', strtotime($test));
        // $ubah = Carbon::parse($ubah)->isoFormat('dddd');
        // $mulai =$request->jam_mulai;
        // $hari = $request->tgl;
        // $selesai = $request->jam_selesai;
        // $cekJam = Jadwal::where('jam_mulai', $mulai)->first();
        // $cekHari = Jadwal::where('tgl', $hari)->first();
        // if($cekJam AND $cekHari){
        //     return redirect('home')->with('warning', 'Jadwal bentrok');
        // }
        $data =  $request->all();

        Jadwal::create($data);

        return redirect('home')->with('success', 'Data Berhasil Ditambahkan!');

    }

    public function edit($id)
    {
        $dos = Dosen::all();
        $mhs = Mahasiswa::all();
        $ruang = Ruangan::all();
        $jdl = Jadwal::with('ruangan')->findorfail($id);

        return view('update', compact('jdl', 'ruang', 'mhs', 'dos'));
    }

    public function update(Request $request, $id)
    {
        $jdl = Jadwal::findorfail($id);
        $jdl->update($request->all());
        return redirect('home')->with('success', 'Data Berhasil Diubah!');
    }

    public function destroy($id)
    {
        $jdl = Jadwal::findorfail($id);
        $jdl->delete();
        return back()->with('info', 'Data Berhasil Dihapus!');
    }

    // API to get all schedules
    public function apiGetAllSchedules()
    {
        $schedules = Jadwal::with('ruangan', 'mahasiswa', 'dosen')->get();
        return response()->json($schedules);
    }

    // API to get a schedule by ID
    public function apiGetScheduleById($id)
    {
        $schedule = Jadwal::with('ruangan', 'mahasiswa', 'dosen')->find($id);
        if ($schedule) {
            return response()->json($schedule);
        } else {
            return response()->json(['message' => 'Schedule not found'], 404);
        }
    }

    // API to create a new schedule
    public function apiCreateSchedule(Request $request)
    {
        $data = $request->all();
        $schedule = Jadwal::create($data);
        return response()->json(['message' => 'Schedule created successfully', 'schedule' => $schedule], 201);
    }

    // API to update a schedule
    public function apiUpdateSchedule(Request $request, $id)
    {
        $schedule = Jadwal::find($id);
        if ($schedule) {
            $schedule->update($request->all());
            return response()->json(['message' => 'Schedule updated successfully', 'schedule' => $schedule]);
        } else {
            return response()->json(['message' => 'Schedule not found'], 404);
        }
    }

    // API to delete a schedule
    public function apiDeleteSchedule($id)
    {
        $schedule = Jadwal::find($id);
        if ($schedule) {
            $schedule->delete();
            return response()->json(['message' => 'Schedule deleted successfully']);
        } else {
            return response()->json(['message' => 'Schedule not found'], 404);
        }
    }
}
