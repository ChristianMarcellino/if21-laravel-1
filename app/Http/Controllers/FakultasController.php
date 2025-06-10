<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //akses model fakultas
        $fakultas = Fakultas::all(); //select*from fakultas
        // dd($fakultas);
        return view('fakultas.index')->with('fakultas',$fakultas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fakultas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'nama' => 'required|unique:fakultas|max:50',
            'singkatan' => 'required|unique:fakultas|max:4',
            'nama_dekan' => 'required|max:30',
            'nama_wadek' => 'required|max:30'
        ]);

        // Simpan ke tabel fakultas
        Fakultas::create($input);

        return redirect()->route('fakultas.index')->with('success', 'Fakultas Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fakultas $fakultas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fakultas $fakultas)
    {
        return view('fakultas.edit',compact('fakultas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $fakultas)
    {
        $fakultas = Fakultas::findOrFail($fakultas);
        $input = $request->validate([
            'nama' => ['required','max:50',Rule::unique('fakultas','nama')->ignore($fakultas->id)],
            'singkatan' => ['required','max:4',Rule::unique('fakultas', 'singkatan')->ignore($fakultas->id)],
            'nama_dekan' => 'required|max:30',
            'nama_wadek' => 'required|max:30'
        ]);

        $fakultas->update($input);
        return redirect()->route('fakultas.index')->with('success','Fakultas Berhasil Terupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fakultas $fakultas)
    {
        $fakultas->delete();
        return redirect()->route('fakultas.index')->with('success','Fakultas Berhasil Terhapus');
    }
}
