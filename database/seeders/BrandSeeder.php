<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $brand = [
            ['name' => 'Samsung', 'description' => 'we are the largest screen manufacturer in the world', 'created_at' => now()],
            ['name' => 'Sony', 'description' => 'we are the largest screen manufacturer in the world', 'created_at' => now()],
            ['name' => 'Google', 'description' => 'we are the largest screen manufacturer in the world', 'created_at' => now()],
            ['name' => 'Vivo', 'description' => 'we are the largest screen manufacturer in the world', 'created_at' => now()],
            ['name' => 'One Plus', 'description' => 'we are the largest screen manufacturer in the world', 'created_at' => now()],
            ['name' => 'Parer fly', 'description' => 'we are the largest screen manufacturer in the world', 'created_at' => now()],
            ['name' => 'xiaomi', 'description' => 'we are the largest screen manufacturer in the world', 'created_at' => now()],
        ];

        DB::table( 'brands' )->insert( $brand );
    }

}