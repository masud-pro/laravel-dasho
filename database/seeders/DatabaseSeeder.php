<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Artisan::call( 'cache:clear' );

        $this->call( [
            UserSeeder::class,
            SettingSeeder::class,
        ] );


// some comment

        Role::create( [
            'name'       => 'Admin',
            'guard_name' => 'web',
        ] );
        Role::create( [
            'name'       => 'User',
            'guard_name' => 'web',
        ] );

        // DB::table( 'role_has_permissions' )->delete();
        // DB::table( 'permissions' )->delete();

        DB::table( 'permissions' )->insert( [
            [
                'name'       => 'dashboard.dashboard',
                'guard_name' => 'web',
                'created_at' => '2022-01-06 13:17:34',
                'updated_at' => '2022-01-06 13:17:34',
            ],
            [
                'name'       => 'users.list',
                'guard_name' => 'web',
                'created_at' => '2022-01-06 13:17:34',
                'updated_at' => '2022-01-06 13:17:34',
            ],
            [
                'name'       => 'users.details',
                'guard_name' => 'web',
                'created_at' => '2022-01-06 13:17:34',
                'updated_at' => '2022-01-06 13:17:34',
            ],
            [
                'name'       => 'users.create',
                'guard_name' => 'web',
                'created_at' => '2022-01-06 13:17:34',
                'updated_at' => '2022-01-06 13:17:34',
            ],
            [
                'name'       => 'users.update',
                'guard_name' => 'web',
                'created_at' => '2022-01-06 13:17:34',
                'updated_at' => '2022-01-06 13:17:34',
            ],
            [
                'name'       => 'users.delete',
                'guard_name' => 'web',
                'created_at' => '2022-01-06 13:17:34',
                'updated_at' => '2022-01-06 13:17:34',
            ],
            [
                'name'       => 'roles.list',
                'guard_name' => 'web',
                'created_at' => '2022-01-06 13:17:34',
                'updated_at' => '2022-01-06 13:17:34',
            ],
            [
                'name'       => 'roles.details',
                'guard_name' => 'web',
                'created_at' => '2022-01-06 13:17:34',
                'updated_at' => '2022-01-06 13:17:34',
            ],
            [
                'name'       => 'roles.create',
                'guard_name' => 'web',
                'created_at' => '2022-01-06 13:17:34',
                'updated_at' => '2022-01-06 13:17:34',
            ],
            [
                'name'       => 'roles.update',
                'guard_name' => 'web',
                'created_at' => '2022-01-06 13:17:34',
                'updated_at' => '2022-01-06 13:17:34',
            ],
            [
                'name'       => 'roles.delete',
                'guard_name' => 'web',
                'created_at' => '2022-01-06 13:17:34',
                'updated_at' => '2022-01-06 13:17:34',
            ],
            [
                'name'       => 'manual_property.list',
                'guard_name' => 'web',
                'created_at' => '2022-01-06 13:17:34',
                'updated_at' => '2022-01-06 13:17:34',
            ],
            [
                'name'       => 'manual_property.details',
                'guard_name' => 'web',
                'created_at' => '2022-01-06 13:17:34',
                'updated_at' => '2022-01-06 13:17:34',
            ],
            [
                'name'       => 'manual_property.update',
                'guard_name' => 'web',
                'created_at' => '2022-01-06 13:17:34',
                'updated_at' => '2022-01-06 13:17:34',
            ],

        ] );

        $role = Role::find( 1 );
        $role->givePermissionTo( Permission::all() );


         DB::table( 'users' )->insert( [
            'name'              => 'Admin',
            'email'             => 'admin@admin.com',
            'phone'             => '+971 55 982 3262',
            'email_verified_at' => now(),
            'type'              => 1,
            'password'          => Hash::make( 'password' ),
            'type'              => 2, // 1: admin, 2: manager
            'created_at' => now(),
        ] );

        $user = User::find( 1 );

        $user->assignRole( 'Admin' );


    }
}
