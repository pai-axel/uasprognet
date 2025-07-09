<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::create([
            'banner_title' => 'We are dynamic team',
            'banner_sub' => 'We provide consulting services in the area of IFRS and management reporting, helping companies to reach their highest level. We optimize business processes, making them easier.',
            'slug' => Str::slug('We are dynamic team')
        ]);

        Banner::create([
            'banner_title' => 'Our Mission',
            'banner_sub' => '"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam"',
            'slug' => Str::slug('Our Mission')
        ]);

        Banner::create([
            'banner_title' => 'Vission',
            'banner_sub' => 'llum similique ducimus accusamus laudantium praesentium, impedit quaerat, itaque maxime sunt deleniti voluptas distinctio .',
            'slug' => Str::slug('Vission')
        ]);

        Banner::create([
            'banner_title' => 'Our Approach',
            'banner_sub' => 'llum similique ducimus accusamus laudantium praesentium, impedit quaerat, itaque maxime sunt deleniti voluptas distinctio .',
            'slug' => Str::slug('Our Approach')
        ]);
    }
}
