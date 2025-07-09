<?php

namespace Database\Seeders;

use App\Models\Career;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Career::create([
            'career_title' => 'Excellent Service',
            'career_image' =>  'career1.png',
            'career_available' =>  true,
            'career_content' =>  'Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful',
            'slug' => Str::slug('Excellent Service')
        ]);
    }
}
