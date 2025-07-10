<?php

namespace Database\Seeders;

use App\Models\Seo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seo::create([
            'domain_canonical' => 'UAS PROGNET',
            'meta_title' => 'white',
            'og_image' => 'blog1.jpg',
            'meta_description' => 'Jln Kampus Bukit Udayana',
            'meta_keywords' => '08102698123',
            'meta_language' => 'mulyono@gmail.com',
            'meta_author' => 'https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed',
            'slug' => Str::slug('UAS PROGNET')
        ]);
    }
}
