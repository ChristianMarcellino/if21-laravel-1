<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'Jadwal';
    protected $fillable = ['tahun_akademik', 'kode_smt', 'kelas','mata_kuliah_id', 'dosen_id', 'sesi_id'];

    public function mata_kuliah(){
        return $this->belongsTo(Mata_Kuliah::class, 'mata_kuliah_id', 'id');
    }

    public function dosen(){
        return $this->belongsTo(User::class, 'dosen_id', 'id');
    }

    public function sesi(){
        return $this->belongsTo(Sesi::class, 'sesi_id', 'id');
    }
}
