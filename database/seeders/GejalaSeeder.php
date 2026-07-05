<?php

namespace Database\Seeders;

use App\Models\Gejala;
use Illuminate\Database\Seeder;

class GejalaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['kode_gejala' => 'G01', 'nama_gejala' => 'Daun bergaris klorosis kuning-putih sejajar tulang daun'],
            ['kode_gejala' => 'G02', 'nama_gejala' => 'Tanaman kerdil dan pertumbuhan terhambat'],
            ['kode_gejala' => 'G03', 'nama_gejala' => 'Muncul serbuk/tepung putih di bawah permukaan daun pada pagi hari'],
            ['kode_gejala' => 'G04', 'nama_gejala' => 'Daun menggulung dan tampak pucat'],
            ['kode_gejala' => 'G05', 'nama_gejala' => 'Tongkol tidak terbentuk sempurna atau tidak berisi'],
            ['kode_gejala' => 'G06', 'nama_gejala' => 'Bercak coklat memanjang seperti bentuk cerutu pada daun'],
            ['kode_gejala' => 'G07', 'nama_gejala' => 'Bercak pada daun menyatu dan meluas'],
            ['kode_gejala' => 'G08', 'nama_gejala' => 'Daun mengering dimulai dari bagian bawah tanaman'],
            ['kode_gejala' => 'G09', 'nama_gejala' => 'Muncul bintik-bintik kecil coklat kemerahan (pustul) pada permukaan daun'],
            ['kode_gejala' => 'G10', 'nama_gejala' => 'Pustul pecah dan mengeluarkan serbuk seperti karat'],
            ['kode_gejala' => 'G11', 'nama_gejala' => 'Daun menguning pada tingkat serangan berat'],
            ['kode_gejala' => 'G12', 'nama_gejala' => 'Batang bagian bawah berubah warna menjadi coklat kehitaman'],
            ['kode_gejala' => 'G13', 'nama_gejala' => 'Batang menjadi lunak dan mudah roboh'],
            ['kode_gejala' => 'G14', 'nama_gejala' => 'Empulur batang membusuk'],
            ['kode_gejala' => 'G15', 'nama_gejala' => 'Tanaman layu mendadak menjelang panen'],
            ['kode_gejala' => 'G16', 'nama_gejala' => 'Tongkol berwarna keputihan atau kemerahan berjamur'],
            ['kode_gejala' => 'G17', 'nama_gejala' => 'Biji jagung membusuk dan berbau tidak sedap'],
            ['kode_gejala' => 'G18', 'nama_gejala' => 'Klobot tongkol lengket dan menempel rapat pada tongkol'],
            ['kode_gejala' => 'G19', 'nama_gejala' => 'Biji berubah warna menjadi coklat kehitaman'],
            ['kode_gejala' => 'G20', 'nama_gejala' => 'Bercak kecil berbentuk persegi panjang berwarna abu-abu kecoklatan pada daun'],
            ['kode_gejala' => 'G21', 'nama_gejala' => 'Bercak pada daun sejajar dengan arah tulang daun'],
            ['kode_gejala' => 'G22', 'nama_gejala' => 'Daun mengering dimulai dari bagian ujung daun'],
        ];

        foreach ($data as $item) {
            Gejala::create($item);
        }
    }
}
