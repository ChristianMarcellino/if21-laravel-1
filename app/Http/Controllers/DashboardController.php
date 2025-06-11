<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $mahasiswaProdi = DB::select('select prodi.nama, count(*) as jumlah From mahasiswa
        JOIN prodi on mahasiswa.prodi_id = prodi.id
        group by prodi.nama;');
        $mahasiswaSma = DB::select('select asal_sma, count(*) as jumlah From mahasiswa
        group by asal_sma;');

        // Query Builder Laravel
        $mahasiswaTahun = DB::table('mahasiswa')
        ->select(DB::raw('substring(npm,1,2) as tahun'), DB::raw('count(*) as jumlah'))
        ->groupBy('tahun')
        ->get();


        $tahunAkademik = DB::table('jadwal')
        ->select('tahun_akademik')
        ->distinct()
        ->pluck('tahun_akademik');

        $kelasProdi = DB::table('jadwal')
            ->join('mata_kuliah', 'mata_kuliah_id', '=', 'mata_kuliah.id')
            ->join('prodi', 'prodi_id', '=', 'prodi.id')
            ->select('tahun_akademik', 'prodi.nama', DB::raw('COUNT(*) as jumlah'))
            ->groupBy('prodi.nama', 'tahun_akademik')
            ->get();
        $prodiCollection = collect($kelasProdi);

        $prodiData = [];

        $prodiNames = $prodiCollection->pluck('nama')->unique();

        foreach ($prodiNames as $prodiName) {
            $dataPerTahun = [];

            foreach ($tahunAkademik as $tahun) {
                $jumlah = $prodiCollection
                    ->where('nama', $prodiName)
                    ->firstWhere('tahun_akademik', $tahun)?->jumlah ?? 0;

                $dataPerTahun[] = $jumlah;
            }

            $prodiData[$prodiName] = $dataPerTahun;
        }


        return view('dashboard.index', compact('mahasiswaProdi','mahasiswaSma','mahasiswaTahun','prodiData','tahunAkademik'));
    }
}
