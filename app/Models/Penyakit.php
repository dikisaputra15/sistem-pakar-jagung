<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    protected $fillable = ['kode_penyakit', 'nama_penyakit', 'deskripsi', 'rekomendasi'];

    public function gejalas()
    {
        return $this->belongsToMany(Gejala::class, 'rule_gejala_penyakit');
    }
}
