<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodi = Prodi::all();
        return view('prodi.index',compact('prodi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultas = \App\Models\Fakultas::all();
        return view('prodi.create', compact('fakultas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'nama' => 'required|unique:prodi|max:50',
            'singkatan' => 'required|unique:prodi|max:4',
            'kaprodi' => 'required|max:30',
            'sekretaris' => 'required|max:30',
            'fakultas_id' => 'required|'
        ]);

        Prodi::create($input);

        return redirect()->route('prodi.index')->with('success', 'Prodi Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        $fakultas = \App\Models\Fakultas::all();
        return view('prodi.edit', compact('prodi','fakultas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $prodi)
    {
        $prodi = Prodi::findOrFail($prodi);
        $input = $request->validate([
            'nama' => ['required','max:50',Rule::unique('prodi', 'nama')->ignore($prodi->id)],
            'singkatan' => ['required','max:4',Rule::unique('prodi','singkatan')->ignore($prodi->id)],
            'kaprodi' => 'required|max:30',
            'sekretaris' => 'required|max:30',
            'fakultas_id' => 'required|'
        ]);
        $prodi->update($input);

        return redirect()->route('prodi.index')->with('success', 'Prodi Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodi $prodi)
    {
        $prodi->delete();
        return redirect()->route('prodi.index')->with('success', 'Data Prodi Terhapus');
    }
}
