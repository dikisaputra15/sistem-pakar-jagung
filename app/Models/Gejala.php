<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    protected $fillable = ['kode_gejala', 'nama_gejala'];

    public function penyakits()
    {
        return $this->belongsToMany(Penyakit::class, 'rule_gejala_penyakit');
    }
}
