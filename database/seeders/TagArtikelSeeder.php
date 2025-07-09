<?php

namespace Database\Seeders;

use App\Models\TagArtikel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['lenovo', 'php', 'samsung'];

        foreach ($tags as $tagartikel) {
            TagArtikel::create([
                'tag_artikel_name' => $tagartikel,
                'slug' => Str::slug($tagartikel)
            ]);
        }
    }
}
