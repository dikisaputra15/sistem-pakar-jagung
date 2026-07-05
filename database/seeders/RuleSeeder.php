<?php

namespace Database\Seeders;

use App\Models\Gejala;
use App\Models\Penyakit;
use Illuminate\Database\Seeder;

class RuleSeeder extends Seeder
{
    public function run(): void
    {
        $rules = [
            'P01' => ['G01', 'G02', 'G03', 'G04', 'G05'],
            'P02' => ['G06', 'G07', 'G08'],
            'P03' => ['G09', 'G10', 'G11'],
            'P04' => ['G12', 'G13', 'G14', 'G15'],
            'P05' => ['G16', 'G17', 'G18', 'G19'],
            'P06' => ['G20', 'G21', 'G22'],
        ];

        foreach ($rules as $kodePenyakit => $kodeGejalas) {
            $penyakit = Penyakit::where('kode_penyakit', $kodePenyakit)->first();
            if (!$penyakit) {
                continue;
            }

            $gejalaIds = Gejala::whereIn('kode_gejala', $kodeGejalas)->pluck('id')->toArray();
            $penyakit->gejalas()->sync($gejalaIds);
        }
    }
}
