<?php

namespace Database\Seeders;

use App\Models\TagBerita;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagBeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['lenovo', 'php', 'samsung'];

        foreach ($tags as $tagberita) {
            TagBerita::create([
                'tag_berita_name' => $tagberita,
                'slug' => Str::slug($tagberita)
            ]);
        }
    }
}
