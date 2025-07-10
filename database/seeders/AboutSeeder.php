<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            'about_title' => 'Berdirinya jagungtinggi',
            'about_year' =>  '2069',
            'about_image' =>  'about.jpeg',
            'about_content' => '"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam"',
            'slug' => Str::slug('Berdirinya jagungtinggi')
        ]);
    }
}
