<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Mata_Kuliah;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materi = Materi::all();
        $dosen = User::all();
        $mata_kuliah = Mata_Kuliah::all();
        return view('materi.index', compact('materi','dosen','mata_kuliah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $materi = Materi::all();
        $dosen = User::all();
        $mata_kuliah = Mata_Kuliah::all();
        return view('materi.create', compact('materi','dosen','mata_kuliah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'pertemuan' => 'required|max:2',
            'pokok_bahasan' => 'required|max:50',
            'mata_kuliah_id' => 'required',
            'dosen_id' => 'required',
            'file_materi' => 'required|file|mimes:pdf,ppt,pptx,doc,docx'
        ]);
        if($request->hasFile('file_materi')){
            $file = $request->file('file_materi');
            $oriName = $file->getClientOriginalName();
            $filename =time() . '_' . $oriName;
            $file->storeAs('files', $filename);//Storage
            $input['file_materi'] = $filename;
        }

        Materi::create($input);
        return redirect()->route('materi.index')->with('success','Materi Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materi $materi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materi $materi)
    {
        $dosen = User::all();
        $mata_kuliah = Mata_Kuliah::all();
        return view('materi.edit', compact('materi','dosen','mata_kuliah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materi $materi)
    {
        $input = $request->validate([
            'pertemuan' => 'required|max:2',
            'pokok_bahasan' => 'required|max:50',
            'mata_kuliah_id' => 'required',
            'dosen_id' => 'required',
            'file_materi' => 'file|mimes:pdf,ppt,pptx,doc,docx'
        ]);
        if($request->hasFile('file_materi')){
            $file = $request->file('file_materi');
            $oriName = $file->getClientOriginalName();
            $filename =time() . '_' . $oriName;
            $file->storeAs('files', $filename);//Storage
            $input['file_materi'] = $filename;
        }

        $materi->update($input);
        return redirect()->route('materi.index')->with('success','Materi Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materi $materi)
    {
        $materi->delete();
        Storage::disk('public')->delete('files/'.$materi->file_materi);
        return redirect()->route('materi.index')->with('success','Materi Berhasil Dihapus');
    }
}
