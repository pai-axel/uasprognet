<?php

namespace Database\Seeders;

use App\Models\Artikel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // post 1
        
        $artikel = Artikel::create([

        ]);

        DB::table('tag_relation_artikel')->insert([

        ]);
      
        DB::table('tag_relation_artikel')->insert([

        ]);
       
        // post 2

        $artikel = Artikel::create([

        ]);

        DB::table('tag_relation_artikel')->insert([

        ]);
     
        // post 3

        $artikel = Artikel::create([

        ]);

        DB::table('tag_relation_artikel')->insert([

        ]);

      
        // post 4

        $artikel = Artikel::create([

        ]);

        DB::table('tag_relation_artikel')->insert([

        ]);

        DB::table('tag_relation_artikel')->insert([

        ]);
    }
}
