<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\Rekomendasi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // post 1
        
        $berita = Berita::create([
            'id_kategori_berita' => '1',
            'id_user' => 1,
            'berita_sampul_1' => 'berita1.jpg',
            'berita_sampul_2' => 'berita2.jpeg',
            'berita_sampul_3' => 'berita3.jpg',
            'berita_title' => 'Tutorial cara merawat laptop',
            'berita_konten_1' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto itaque, pariatur quod et consectetur quasi quas eum quidem, placeat illo, similique optio deserunt nemo iste eos omnis. In, veritatis corrupti?',
            'berita_konten_2' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto itaque, pariatur quod et consectetur quasi quas eum quidem, placeat illo, similique optio deserunt',
            'slug' => Str::slug('Tutorial cara merawat laptop')
        ]);

        DB::table('tag_relation_berita')->insert([
            'id_berita' => $berita->id,
            'id_tag_berita' => 1
        ]);
      
        DB::table('tag_relation_berita')->insert([
            'id_berita' => $berita->id,
            'id_tag_berita' => 3
        ]);

        Rekomendasi::create([
            'id_berita' => $berita->id
        ]);
       
        // post 2

        $berita = Berita::create([
            'id_kategori_berita' => '2',
            'id_user' => 1,
            'berita_sampul_1' => 'berita4.jpg',
            'berita_sampul_2' => 'berita5.jpg',
            'berita_sampul_3' => 'berita6.jpg',
            'berita_title' => 'Belajar Laravel',
            'berita_konten_1' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto itaque, pariatur quod et consectetur quasi quas eum quidem, placeat illo, similique optio deserunt nemo iste eos omnis. In, veritatis corrupti?',
            'berita_konten_2' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto itaque, pariatur quod et consectetur quasi quas eum quidem, placeat illo, similique optio deserunt nemo iste eos omnis. In, veritatis corrupti?',
            'slug' => Str::slug('Belajar Laravel')
        ]);

        DB::table('tag_relation_berita')->insert([
            'id_berita' => $berita->id,
            'id_tag_berita' => 2
        ]);


        Rekomendasi::create([
            'id_berita' => $berita->id
        ]);
     
        // post 3

        $berita = Berita::create([
            'id_kategori_berita' => '2',
            'id_user' => 1,
            'berita_sampul_1' => 'berita7.jpg',
            'berita_sampul_2' => 'berita8.jpg',
            'berita_sampul_3' => 'berita9.jpg',
            'berita_title' => 'Belajar Laravel Autentifikasi',
            'berita_konten_1' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto itaque, pariatur quod et consectetur quasi quas eum quidem, placeat illo, similique optio deserunt nemo iste eos omnis. In, veritatis corrupti?',
            'berita_konten_2' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto itaque, pariatur quod et consectetur quasi quas eum quidem, placeat illo, similique optio deserunt nemo iste eos omnis',
            'slug' => Str::slug('Belajar Laravel Autentifikasi')
        ]);

        DB::table('tag_relation_berita')->insert([
            'id_berita' => $berita->id,
            'id_tag_berita' => 2
        ]);

      
        // post 4

        $berita = Berita::create([
            'id_kategori_berita' => '3',
            'id_user' => 1,
            'berita_sampul_1' => 'berita10.jpg',
            'berita_sampul_2' => 'berita11.jpg',
            'berita_sampul_3' => 'berita12.jpg',
            'berita_title' => 'Rekomendasi Hp Tahun 2021',
            'berita_konten_1' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto itaque, pariatur quod et consectetur quasi quas eum quidem, placeat illo, similique optio deserunt nemo iste eos omnis. In, veritatis corrupti?',
            'berita_konten_2' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto itaque, pariatur quod et consectetur quasi quas eum quidem, placeat illo, similique optio deserunt nemo iste eos omnis.',
            'slug' => Str::slug('Rekomendasi Hp Tahun 2021')
        ]);

        DB::table('tag_relation_berita')->insert([
            'id_berita' => $berita->id,
            'id_tag_berita' => 3
        ]);

        DB::table('tag_relation_berita')->insert([
            'id_berita' => $berita->id,
            'id_tag_berita' => 1
        ]);
    }
}
