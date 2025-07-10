<?php

namespace Database\Seeders;

use App\Models\Artikel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // post 1
        
        $artikel = Artikel::create([
            'id_user' => 1,
            'artikel_sampul' => 'artikel1.jpg',
            'artikel_title' => 'Tutorial cara merawat laptop',
            'artikel_konten' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto itaque, pariatur quod et consectetur quasi quas eum quidem, placeat illo, similique optio deserunt nemo iste eos omnis. In, veritatis corrupti?',
            'slug' => Str::slug('Tutorial cara merawat laptop')
        ]);

        DB::table('tag_relation_artikel')->insert([
            'id_artikel' => $artikel->id,
            'id_tag_artikel' => 1
        ]);
      
        DB::table('tag_relation_artikel')->insert([
            'id_artikel' => $artikel->id,
            'id_tag_artikel' => 3
        ]);
       
        // post 2

        $artikel = Artikel::create([
            'id_user' => 1,
            'artikel_sampul' => 'artikel2.jpg',
            'artikel_title' => 'Belajar Laravel',
            'artikel_konten' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto itaque, pariatur quod et consectetur quasi quas eum quidem, placeat illo, similique optio deserunt nemo iste eos omnis. In, veritatis corrupti?',
            'slug' => Str::slug('Belajar Laravel')
        ]);

        DB::table('tag_relation_artikel')->insert([
            'id_artikel' => $artikel->id,
            'id_tag_artikel' => 2
        ]);
     
        // post 3

        $artikel = Artikel::create([
            'id_user' => 1,
            'artikel_sampul' => 'artikel3.jpg',
            'artikel_title' => 'Belajar Laravel Autentifikasi',
            'artikel_konten' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto itaque, pariatur quod et consectetur quasi quas eum quidem, placeat illo, similique optio deserunt nemo iste eos omnis. In, veritatis corrupti?',
            'slug' => Str::slug('Belajar Laravel Autentifikasi')
        ]);

        DB::table('tag_relation_artikel')->insert([
            'id_artikel' => $artikel->id,
            'id_tag_artikel' => 2
        ]);

      
        // post 4

        $artikel = Artikel::create([
            'id_user' => 1,
            'artikel_sampul' => 'artikel4.jpg',
            'artikel_title' => 'Rekomendasi Hp Tahun 2021',
            'artikel_konten' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto itaque, pariatur quod et consectetur quasi quas eum quidem, placeat illo, similique optio deserunt nemo iste eos omnis. In, veritatis corrupti?',
            'slug' => Str::slug('Rekomendasi Hp Tahun 2021')
        ]);

        DB::table('tag_relation_artikel')->insert([
            'id_artikel' => $artikel->id,
            'id_tag_artikel' => 3
        ]);

        DB::table('tag_relation_artikel')->insert([
            'id_artikel' => $artikel->id,
            'id_tag_artikel' => 1
        ]);
    }
}
