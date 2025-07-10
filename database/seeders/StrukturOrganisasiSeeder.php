<?php

namespace Database\Seeders;

use App\Models\StrukturOrganisasi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StrukturOrganisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StrukturOrganisasi::create([
            'nama_anggota' => 'Tio Fulalo Simatupang',
            'posisi' =>  'Ketua',
            'image_anggota' =>  'tio.jpg',
            'slug' => Str::slug('Tio Fulalo Simatupang')
        ]);
    }
}
