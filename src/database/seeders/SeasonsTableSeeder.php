<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seasons')->insert([
            ['id' => 1, 'name' => '春', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => '夏', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => '秋', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => '冬', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
