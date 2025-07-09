<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gallery::create([
            'gallery_title' => 'Laravel 8 Blog Musyahya',
            'gallery_image' =>  'galeri.jpeg',
            'slug' => Str::slug('Laravel 8 Blog Musyahya')
        ]);
    }
}
