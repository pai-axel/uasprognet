<?php

namespace Database\Seeders;

use App\Models\Options;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Options::create([
            'company_name' => 'UAS PROGNET',
            'theme_color' => 'white',
            'banner_image' => 'banner.webp',
            'location' => 'Jln Kampus Bukit Udayana',
            'call' => '08102698123',
            'email' => 'mulyono@gmail.com',
            'maps' => 'https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed',
            'product_footer' => 'necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful',
            'slug' => Str::slug('UAS PROGNET')
        ]);
    }
}
