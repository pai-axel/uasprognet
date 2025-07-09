<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,

            KategoriBeritaSeeder::class,
            TagBeritaSeeder::class,
            BeritaSeeder::class,

            TagArtikelSeeder::class,
            ArtikelSeeder::class,
            
            OptionsSeeder::class,
            CareerSeeder::class,
            BannerSeeder::class,
            SeoSeeder::class,
            ValueCompanySeeder::class,
            StrukturOrganisasiSeeder::class,
            GallerySeeder::class,
            ProductSeeder::class,
            SupportSeeder::class,
            AboutSeeder::class,
            FeatureSeeder::class,
            TestimoniSeeder::class,
            FaqSeeder::class,
            FooterSeeder::class,
        ]);
    }
}
