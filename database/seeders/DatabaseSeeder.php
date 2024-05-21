<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Role;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\
        $this->call(RolesSmarticket::class);
        $this->call(UserSeeder::class);
        /*$this->call(UserSeeder::class);
        User::factory(10)->create()->each(function($user){
            $user->assignRole('validador');
        }*/
        
        /*$administrador->assignRole('administrador');
        $acreditador->assignRole('acreditador');
        $validador->assignRole('validador');*/
    }
}
