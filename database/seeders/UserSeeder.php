<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id_rol' => 1,
            'id_empresa' => 1,
            'cod_usuario' => 'LAR',
            'cod_evento' => 'JLGXV',
            'name' => 'Luis Alberto Reyes',
            'dni' => '70752346',
            'email' => 'alrys1995@gmail.com',
            'password' => bcrypt('123456789*'),
            'est_usuario' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ])->assignRole('superadmin');

        User::create([
            'id_rol' => 1,
            'id_empresa' => 1,
            'cod_usuario' => 'JDP',
            'name' => 'Jose de los Santos Paredes',
            'dni' => '13345478',
            'email' => 'jdelossantos@exiven.com',
            'password' => bcrypt('123456789*'),
            'est_usuario' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ])->assignRole('administrador');

        User::create([
            'id_rol' => 2,
            'id_empresa' => 1,
            'cod_usuario' => 'DNS',
            'name' => 'David Najarro Simon',
            'dni' => '12345478',
            'email' => 'dnajarro@exiven.com',
            'password' => bcrypt('123456789*'),
            'est_usuario' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ])->assignRole('acreditador');

        User::create([
            'id_rol' => 2,
            'id_empresa' => 2,
            'cod_usuario' => 'FCC',
            'name' => 'Fulvio Cordano Cordano',
            'dni' => '19345478',
            'email' => 'fcordano@exiven.com',
            'password' => bcrypt('123456789*'),
            'est_usuario' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ])->assignRole('validador');
    }
}
