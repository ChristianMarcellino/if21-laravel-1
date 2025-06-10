<?php

namespace App\Http\Controllers;

use App\Models\Mata_Kuliah;
use App\Models\Prodi;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mata_kuliah = Mata_Kuliah::all();
        $prodi = Prodi::all();
        return view('mata_kuliah.index', compact('mata_kuliah','prodi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = Prodi::all();
        return view('mata_kuliah.create', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'kode_mk' => 'required|unique:mata_kuliah|max:6',
            'nama' => 'required|unique:mata_kuliah|max:50',
            'prodi_id' => 'required',
        ]);

        Mata_Kuliah::create($input);

        return redirect()->route('mata_kuliah.index')->with('success', 'Mata Kuliah Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mata_Kuliah $mata_kuliah)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mata_Kuliah $mata_kuliah)
    {
        $prodi = Prodi::all();
        return view('mata_kuliah.edit', compact('mata_kuliah','prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $Mata_Kuliah)
    {
        $mata_kuliah = Mata_Kuliah::findOrFail($Mata_Kuliah);
        $input = $request->validate([
            'kode_mk' => ['required','max:6',Rule::unique('mata_kuliah','kode_mk')->ignore($mata_kuliah->id)],
            'nama' => ['required','max:50',Rule::unique('mata_kuliah','nama')->ignore($mata_kuliah->id)],
            'prodi_id' => 'required',
        ]);
        $mata_kuliah->update($input);

        return redirect()->route('mata_kuliah.index')->with('success', 'Mata Kuliah Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mata_Kuliah $mata_kuliah)
    {
        $mata_kuliah->delete();
        return redirect()->route('mata_kuliah.index')->with('success', 'Mata Kuliah Terhapus');
    }
}
