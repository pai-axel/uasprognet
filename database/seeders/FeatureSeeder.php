<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feature::create([
            'feature_title' => 'Excellent Service',
            'feature_image' =>  'feature1.png',
            'feature_content' =>  'Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful',
            'slug' => Str::slug('Excellent Service')
        ]);
        Feature::create([
            'feature_title' => 'Clean Working',
            'feature_image' =>  'feature2.png',
            'feature_content' =>  'Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful',
            'slug' => Str::slug('Clean Working')
        ]);
        Feature::create([
            'feature_title' => 'Expert Farmer',
            'feature_image' =>  'feature3.png',
            'feature_content' =>  'Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful',
            'slug' => Str::slug('Expert Farmer')
        ]);
    }
}
