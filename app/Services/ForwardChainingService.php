<?php

namespace App\Services;

use App\Models\Penyakit;

class ForwardChainingService
{
    /**
     * Menjalankan proses forward chaining terhadap gejala yang dipilih.
     *
     * @param array $gejalaIds Daftar id gejala yang dipilih petani (fakta)
     * @return array Hasil diagnosa terurut dari persentase kecocokan tertinggi
     */
    public function diagnosa(array $gejalaIds): array
    {
        $penyakits = Penyakit::with('gejalas')->get();
        $hasil = [];

        foreach ($penyakits as $penyakit) {
            $gejalaPenyakit = $penyakit->gejalas->pluck('id')->toArray();

            if (empty($gejalaPenyakit)) {
                continue;
            }

            $gejalaCocok = array_intersect($gejalaPenyakit, $gejalaIds);
            $jumlahCocok = count($gejalaCocok);

            if ($jumlahCocok > 0) {
                $persentase = ($jumlahCocok / count($gejalaPenyakit)) * 100;

                $hasil[] = [
                    'penyakit'        => $penyakit,
                    'jumlah_cocok'    => $jumlahCocok,
                    'total_gejala'    => count($gejalaPenyakit),
                    'persentase'      => round($persentase, 2),
                    'gejala_cocok_id' => array_values($gejalaCocok),
                ];
            }
        }

        usort($hasil, fn ($a, $b) => $b['persentase'] <=> $a['persentase']);

        return $hasil;
    }
}
