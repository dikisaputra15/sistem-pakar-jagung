<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataLahan extends Model
{
    protected $fillable = ['user_id', 'nama_lahan', 'lokasi', 'luas_lahan', 'jenis_bibit', 'tanggal_tanam'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function riwayatDiagnosas()
    {
        return $this->hasMany(RiwayatDiagnosa::class);
    }
}
