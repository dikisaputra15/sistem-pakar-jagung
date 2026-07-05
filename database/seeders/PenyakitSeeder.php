<?php

namespace Database\Seeders;

use App\Models\Penyakit;
use Illuminate\Database\Seeder;

class PenyakitSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'kode_penyakit' => 'P01',
                'nama_penyakit' => 'Bulai (Downy Mildew)',
                'deskripsi' => 'Penyakit yang disebabkan oleh jamur Peronosclerospora spp., umumnya menyerang tanaman jagung pada fase awal pertumbuhan dan dapat menyebabkan gagal panen total jika tidak ditangani sejak dini.',
                'rekomendasi' => 'Cabut dan musnahkan tanaman yang terinfeksi sedini mungkin agar tidak menjadi sumber penularan. Gunakan benih hibrida yang tahan bulai. Lakukan perlakuan benih (seed treatment) dengan fungisida berbahan aktif metalaksil sebelum tanam. Atur jarak tanam agar sirkulasi udara di sekitar tanaman baik, serta lakukan rotasi tanaman dengan komoditas bukan inang seperti kedelai atau kacang tanah.',
            ],
            [
                'kode_penyakit' => 'P02',
                'nama_penyakit' => 'Hawar Daun (Northern Corn Leaf Blight)',
                'deskripsi' => 'Disebabkan oleh jamur Exserohilum turcicum, penyakit ini menyerang daun dan berkembang cepat pada kondisi lembap dengan suhu sedang.',
                'rekomendasi' => 'Gunakan varietas jagung yang tahan terhadap hawar daun. Aplikasikan fungisida berbahan aktif mankozeb atau klorotalonil sesuai dosis anjuran pada label kemasan. Bersihkan dan musnahkan sisa-sisa tanaman yang terinfeksi setelah panen. Atur jarak tanam yang cukup untuk mengurangi kelembapan berlebih di sekitar tanaman.',
            ],
            [
                'kode_penyakit' => 'P03',
                'nama_penyakit' => 'Karat Daun (Common Rust)',
                'deskripsi' => 'Disebabkan oleh jamur Puccinia sorghi, ditandai dengan munculnya pustul berwarna coklat kemerahan pada permukaan daun.',
                'rekomendasi' => 'Tanam varietas jagung yang tahan terhadap penyakit karat. Aplikasikan fungisida sistemik golongan triazol apabila tingkat serangan sudah tinggi. Hindari pemupukan nitrogen yang berlebihan karena dapat meningkatkan kerentanan tanaman. Jaga kebersihan lahan dari gulma yang berpotensi menjadi inang alternatif.',
            ],
            [
                'kode_penyakit' => 'P04',
                'nama_penyakit' => 'Busuk Batang (Stalk Rot)',
                'deskripsi' => 'Disebabkan oleh patogen Fusarium sp. atau Diplodia sp. yang menyerang jaringan batang, umumnya muncul menjelang fase generatif hingga menjelang panen.',
                'rekomendasi' => 'Perbaiki sistem drainase lahan agar tidak tergenang air dalam waktu lama. Hindari pemupukan nitrogen berlebihan menjelang fase generatif. Gunakan benih sehat bersertifikat dan varietas yang tahan terhadap busuk batang. Lakukan panen tepat waktu untuk menghindari tanaman roboh akibat batang yang sudah rapuh.',
            ],
            [
                'kode_penyakit' => 'P05',
                'nama_penyakit' => 'Busuk Tongkol (Ear Rot)',
                'deskripsi' => 'Disebabkan oleh Fusarium sp. atau Diplodia sp. yang menyerang tongkol jagung, dapat menurunkan kualitas dan menimbulkan risiko toksin pada biji.',
                'rekomendasi' => 'Lakukan panen tepat waktu, tidak terlalu awal maupun terlambat. Segera keringkan tongkol setelah panen hingga mencapai kadar air yang aman untuk penyimpanan. Simpan hasil panen di tempat yang kering dengan sirkulasi udara baik. Gunakan varietas dengan klobot yang menutup rapat namun cepat kering setelah panen.',
            ],
            [
                'kode_penyakit' => 'P06',
                'nama_penyakit' => 'Bercak Daun Abu-abu (Gray Leaf Spot)',
                'deskripsi' => 'Disebabkan oleh jamur Cercospora zeae-maydis, berkembang pesat pada kondisi lembap dan minim rotasi tanaman.',
                'rekomendasi' => 'Lakukan rotasi tanaman dengan komoditas di luar famili Gramineae. Kelola sisa tanaman atau jerami dengan cara membenamkan ke dalam tanah atau memusnahkannya. Aplikasikan fungisida golongan strobilurin apabila serangan cukup parah. Tanam varietas jagung yang toleran terhadap penyakit ini.',
            ],
        ];

        foreach ($data as $item) {
            Penyakit::create($item);
        }
    }
}
