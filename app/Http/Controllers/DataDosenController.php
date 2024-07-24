<?php

namespace App\Http\Controllers;
use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input as InputInput;

class DataDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtdosen = Dosen::latest()->paginate(5);
        return view('data_dosen', compact('dtdosen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dos = Dosen::findorfail($id);
        return view('update-dosen', compact('dos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dos = Dosen::findorfail($id);
        $dos->update($request->all());
        return redirect('data-dosen')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Jadwal::where('id', $id)->first();
        if($result){
            return back()->with('warning', 'Data Tidak Boleh Dihapus');
        }

        $dos = Dosen::findorfail($id);
        $dos->delete();
        return back()->with('info', 'Data Berhasil Dihapus!');
    }

    /**
     * API: Get all dosen data.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiIndex()
    {
        $dtdosen = Dosen::all();
        return response()->json($dtdosen);
    }

    /**
     * API: Get a specific dosen data.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiShow($id)
    {
        $dos = Dosen::findorfail($id);
        return response()->json($dos);
    }

    /**
     * API: Store a newly created dosen in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiStore(Request $request)
    {
        $dos = Dosen::create($request->all());
        return response()->json($dos, 201);
    }

    /**
     * API: Update the specified dosen in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiUpdate(Request $request, $id)
    {
        $dos = Dosen::findorfail($id);
        $dos->update($request->all());
        return response()->json($dos);
    }

    /**
     * API: Remove the specified dosen from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiDestroy($id)
    {
        $result = Jadwal::where('id', $id)->first();
        if($result){
            return response()->json(['message' => 'Data Tidak Boleh Dihapus'], 403);
        }

        $dos = Dosen::findorfail($id);
        $dos->delete();
        return response()->json(['message' => 'Data Berhasil Dihapus'], 200);
    }
}
