<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index',compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = \App\Models\Prodi::all();
        return view('mahasiswa.create', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'nama' => 'required|max:50',
            'npm' => 'required|unique:mahasiswa|max:11',
            'jk' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required|max:30',
            'asal_sma' => 'required|max:30',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|required',
            'prodi_id' => 'required'
        ]);

        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $filename =time().'.'.$file->getClientOriginalExtension();
            // $file->move(public_path('images'),$filename);Public Path
            $file->storeAs('images', $filename);//Storage
            $input['foto'] = $filename;
        }

        Mahasiswa::create($input);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($mahasiswa)
    {
        $mahasiswa= Mahasiswa::findOrFail($mahasiswa);
        $prodi = \App\Models\Prodi::all();
        return view ('mahasiswa.edit',compact('mahasiswa','prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $mahasiswa)
    {
        $mahasiswa = Mahasiswa::findOrFail($mahasiswa);
        $input = $request->validate([
            'nama' => 'required|max:50',
            'npm' => ['required','max:11',Rule::unique('mahasiswa')->ignore($mahasiswa->id)],
            'jk' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required|max:30',
            'asal_sma' => 'required|max:30',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'prodi_id' => 'required'
        ]);

        if($request->hasFile('foto')){
            $file = $request->file('foto');
            $filename =time().'.'.$file->getClientOriginalExtension();
            // $file->move(public_path('images'),$filename);Public Path
            $file->storeAs('images', $filename);//Storage
            $input['foto'] = $filename;
        }

        $mahasiswa->update($input);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        Storage::disk('public')->delete('images/'.$mahasiswa->foto);
        return redirect()->route('mahasiswa.index')->with('success','Data Mahasiswa Berhasil Terhapus');
    }
}
