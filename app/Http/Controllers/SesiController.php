<?php

namespace App\Http\Controllers;

use App\Models\Sesi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SesiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sesi = Sesi::all();
        return view('sesi.index', compact('sesi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sesi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'nama' => 'unique:sesi|required|max:9',
        ]);

        Sesi::create($input);
        return redirect()->route('sesi.index')->with('success', 'Sesi Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sesi $sesi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sesi $sesi)
    {
        return view('sesi.edit', compact('sesi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sesi $sesi)
    {
        $input = $request->validate([
            'nama' => ['required',Rule::unique('sesi')->ignore($sesi->id),'max:9'],
        ]);

        $sesi->update($input);
        return redirect()->route('sesi.index')->with('success','Sesi Berhasil Terupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sesi $sesi)
    {
        $sesi->delete();
        return redirect()->route('sesi.index')->with('success','Sesi Berhasil Terhapus');
    }
}
