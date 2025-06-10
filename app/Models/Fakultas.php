<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{

    protected $fillable = ['nama','singkatan','nama_dekan','nama_wadek'];

    use HasUuids;
}
