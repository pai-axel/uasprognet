<?php

namespace Database\Seeders;

use App\Models\KategoriBerita;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class KategoriBeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategories = ['komputer dan laptop', 'bahasa pemrograman', 'android'];

        foreach ($kategories as $kategori) {
            KategoriBerita::create([
                'kategori_berita_name' => $kategori,
                'slug' => Str::slug($kategori)
            ]);
        }
    }
}
