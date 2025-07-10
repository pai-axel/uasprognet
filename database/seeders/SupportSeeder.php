<?php

namespace Database\Seeders;

use App\Models\Support;
use Illuminate\Database\Seeder;

class SupportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Support::create([
            'client_name' => 'Tio Fulalo Simatupang',
            'client_phone' => '089521391996',
            'client_email' => 'fulalotio@gmail.com',
            'client_text' => 'Pelayanannya sangat bagus',
        ]);
    }
}
