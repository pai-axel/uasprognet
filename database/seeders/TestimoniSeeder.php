<?php
namespace Database\Seeders;

use App\Models\Testimoni;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class TestimoniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Testimoni::create([
            'testi_client_name' => 'Tio Fulalo Simatupang',
            'testi_client_avatar' =>  'avatar.jpg',
            'testi_client_content' =>  '"alteration in some form, by injected humour, or adagg',
            'slug' => Str::slug('Tio Fulalo Simatupang')
        ]);
    }
}
