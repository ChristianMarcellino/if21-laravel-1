<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Mata_Kuliah;
use App\Models\Sesi;
use App\Models\User;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = Jadwal::all();
        $dosen = User::all();
        $sesi = Sesi::all();
        $mata_kuliah = Mata_Kuliah::all();
        return view('jadwal.index', compact('jadwal','dosen','sesi','mata_kuliah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosen = User::all();
        $sesi = Sesi::all();
        $mata_kuliah = Mata_Kuliah::all();
        return view('jadwal.create', compact('dosen','mata_kuliah','sesi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'tahun_akademik' => 'required|max:9',
            'kode_smt' => 'required|max:6',
            'kelas' => 'required|max:5',
            'mata_kuliah_id' => 'required',
            'dosen_id' => 'required',
            'sesi_id' => 'required',
        ]);

        Jadwal::create($input);
        return redirect()->route('jadwal.index')->with('success','Jadwal Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal)
    {
        $dosen = User::all();
        $sesi = Sesi::all();
        $mata_kuliah = Mata_Kuliah::all();
        return view('jadwal.edit',compact('jadwal','dosen','sesi','mata_kuliah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $jadwal)
    {
        $jadwal = Jadwal::findOrFail($jadwal);
        $input = $request->validate([
            'tahun_akademik' => 'required|max:9',
            'kode_smt' => 'required|max:6',
            'kelas' => 'required|max:5',
            'mata_kuliah_id' => 'required',
            'dosen_id' => 'required',
            'sesi_id' => 'required',
        ]);

        $jadwal->update($input);
        return redirect()->route('jadwal.index')->with('success','Jadwal Berhasil Terupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success','Jadwal Berhasil Terhapus');
    }
}
