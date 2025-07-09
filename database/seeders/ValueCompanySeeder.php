<?php

namespace Database\Seeders;

use App\Models\ValueCompany;
use Illuminate\Database\Seeder;

class ValueCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ValueCompany::create([
            'value_title' => 'Step One',
            'value_color' => '#ed1c24',
            'value_content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quae culpa asperiores soluta officiis iusto quasi. Odio aliquid alias explicabo deleniti?',
        ]);
    }
}
