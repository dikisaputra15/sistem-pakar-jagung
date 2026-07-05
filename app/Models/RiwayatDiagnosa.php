<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatDiagnosa extends Model
{
    protected $fillable = ['user_id', 'data_lahan_id', 'penyakit_id', 'persentase', 'tanggal_diagnosa'];

    protected function casts(): array
    {
        return [
            'tanggal_diagnosa' => 'datetime',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dataLahan()
    {
        return $this->belongsTo(DataLahan::class);
    }

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class);
    }

    public function gejalas()
    {
        return $this->belongsToMany(Gejala::class, 'riwayat_gejala');
    }
}
