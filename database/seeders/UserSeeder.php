<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $user = [
            [
                'name'              => 'Masud Rana',
                'email'             => '920mash@gmail.com',
                'email_verified_at' => Carbon::now()->format( 'Y-m-d H:i:s' ),
                'password'          => Hash::make( '&#Mb623)hub' ),
                'phone'             => '123-456',
                'status'            => true,
                'type'              => 1, // 1: admin, 2: manager
                'created_at' => now(),
            ],

            [
                'name'              => 'Administrator',
                'email'             => 'admin@example.com',
                'email_verified_at' => Carbon::now()->format( 'Y-m-d H:i:s' ),
                'password'          => Hash::make( 'password' ),
                'phone'             => '123-456',
                'status'            => true,
                'type'              => 1, // 1: admin, 2: manager
                'created_at' => now(),
            ],

            [
                'name'              => 'Masud Rana2',
                'email'             => 'masud@gmail.com',
                'email_verified_at' => Carbon::now()->format( 'Y-m-d H:i:s' ),
                'password'          => Hash::make( 'password' ),
                'phone'             => '123-456',
                'status'            => true,
                'type'              => 1, // 1: admin, 2: manager
                'created_at' => now(),
            ],

            [
                'name'              => 'Rana',
                'email'             => '920mash2@gmail.com',
                'email_verified_at' => Carbon::now()->format( 'Y-m-d H:i:s' ),
                'password'          => Hash::make( 'password' ),
                'phone'             => '123-456',
                'status'            => true,
                'type'              => 2, // 1: admin, 2: manager
                'created_at' => now(),
            ],

            [
                'name'              => 'register',
                'email'             => 'sdfj@gmail.com',
                'email_verified_at' => Carbon::now()->format( 'Y-m-d H:i:s' ),
                'password'          => Hash::make( 'password' ),
                'phone'             => '123-456',
                'status'            => true,
                'type'              => 2, // 1: admin, 2: manager
                'created_at' => now(),
            ],

            [
                'name'              => 'Raka',
                'email'             => 'radius@example.com',
                'email_verified_at' => Carbon::now()->format( 'Y-m-d H:i:s' ),
                'password'          => Hash::make( 'password' ),
                'phone'             => '123-456',
                'status'            => true,
                'type'              => 2, // 1: admin, 2: manager
                'created_at' => now(),
            ],

            [
                'name'              => 'jack',
                'email'             => 'jack@example.com',
                'email_verified_at' => Carbon::now()->format( 'Y-m-d H:i:s' ),
                'password'          => Hash::make( 'password' ),
                'phone'             => '123-456',
                'status'            => true,
                'type'              => 1, // 1: admin, 2: manager
                'created_at' => now(),
            ],

            [
                'name'              => 'ehicle',
                'email'             => 'ehicle@example.com',
                'email_verified_at' => Carbon::now()->format( 'Y-m-d H:i:s' ),
                'password'          => Hash::make( 'password' ),
                'phone'             => '123-456',
                'status'            => true,
                'type'              => 2, // 1: admin, 2: manager
                'created_at' => now(),
            ],

            [
                'name'              => 'pabella',
                'email'             => 'pabella@gmail.com',
                'email_verified_at' => Carbon::now()->format( 'Y-m-d H:i:s' ),
                'password'          => Hash::make( 'password' ),
                'phone'             => '123-456',
                'status'            => true,
                'type'              => 2, // 1: admin, 2: manager
                'created_at' => now(),
            ],

        ];

        DB::table( 'users' )->insert( $user );

    }
}