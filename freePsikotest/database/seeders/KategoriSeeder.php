<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_kategori' => 'Depression'],
            ['nama_kategori' => 'Anxiety'],
            ['nama_kategori' => 'Stress'],
        ];

        foreach ($data as $item) {
            Kategori::updateOrCreate($item, $item);
        }
    }
}
