<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Mata_Kuliah extends Model
{
    protected $table ='mata_kuliah';
    protected $fillable = ['kode_mk','nama','prodi_id'];
    public function prodi(){
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }
}
