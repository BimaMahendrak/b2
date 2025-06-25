<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pertanyaan;

class PertanyaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [1, 1, 'Saya merasa bahwa diri saya menjadi marah karena hal-hal sepele.'],
            [2, 2, 'Saya merasa bibir saya sering kering.'],
            [3, 3, 'Saya sama sekali tidak dapat merasakan perasaan positif.'],
            [4, 2, 'Saya mengalami kesulitan bernafas (misalnya: seringkali terengah-engah atau tidak dapat bernafas padahal tidak melakukan aktivitas fisik sebelumnya).'],
            [5, 3, 'Saya sepertinya tidak kuat lagi untuk melakukan suatu kegiatan.'],
            [6, 1, 'Saya cenderung bereaksi berlebihan terhadap suatu situasi.'],
            [7, 2, 'Saya merasa goyah (misalnya, kaki terasa mau ’copot’).'],
            [8, 1, 'Saya merasa sulit untuk bersantai.'],
            [9, 2, 'Saya menemukan diri saya berada dalam situasi yang membuat saya merasa sangat cemas dan saya akan merasa sangat lega jika semua ini berakhir.'],
            [10, 3, 'Saya merasa tidak ada hal yang dapat diharapkan di masa depan.'],
            [11, 1, 'Saya menemukan diri saya mudah merasa kesal.'],
            [12, 1, 'Saya merasa telah menghabiskan banyak energi untuk merasa cemas.'],
            [13, 3, 'Saya merasa sedih dan tertekan.'],
            [14, 1, 'Saya menemukan diri saya menjadi tidak sabar ketika mengalami penundaan (misalnya: kemacetan lalu lintas, menunggu sesuatu).'],
            [15, 2, 'Saya merasa lemas seperti mau pingsan.'],
            [16, 3, 'Saya merasa saya kehilangan minat akan segala hal.'],
            [17, 3, 'Saya merasa bahwa saya tidak berharga sebagai seorang manusia.'],
            [18, 1, 'Saya merasa bahwa saya mudah tersinggung.'],
            [19, 2, 'Saya berkeringat secara berlebihan (misalnya: tangan berkeringat), padahal temperatur tidak panas atau tidak melakukan aktivitas fisik sebelumnya.'],
            [20, 2, 'Saya merasa takut tanpa alasan yang jelas.'],
            [21, 3, 'Saya merasa bahwa hidup tidak bermanfaat.'],
        ];

        foreach ($data as [$id, $id_kategori, $pertanyaan]) {
            Pertanyaan::updateOrCreate(
                ['id_pertanyaan' => $id],
                ['id_kategori' => $id_kategori, 'pertanyaan' => $pertanyaan]
            );
        }
    }
}
