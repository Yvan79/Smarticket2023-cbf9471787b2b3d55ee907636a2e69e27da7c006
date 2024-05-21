<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_rol')->nullable();
            $table->integer('id_empresa')->nullable();
            $table->string('cod_usuario')->nullable();
            $table->string('cod_evento')->nullable();
            $table->string('name');
            $table->string('dni')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('est_usuario')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            [/*'id' => 1,*/
            'id_rol' => 1,
            'id_empresa' => 3,
            'cod_usuario' => 'DMP',
            'name' => 'Debora Muro Pablo',
            'dni' => '12345478',
            'email' => 'dmuro@exiven.com',
            'password' => bcrypt('123456789*'),
            'est_usuario' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]
        ]);
        DB::table('users')->insert([
            [/*'id' => 1,*/
            'id_rol' => 1,
            'id_empresa' => 4,
            'cod_usuario' => 'ORP',
            'name' => 'Ofelia Ramirez Paredes',
            'dni' => '12345478',
            'email' => 'oramirez@exiven.com',
            'password' => bcrypt('123456789*'),
            'est_usuario' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]
        ]);
        DB::table('users')->insert([
            [/*'id' => 1,*/
            'id_rol' => 3,
            'id_empresa' => 2,
            'cod_usuario' => 'FVR',
            'name' => 'Fiorela Velasquez Ramirez',
            'dni' => '12345478',
            'email' => 'fvelasquez@idmedic.com.pe',
            'password' => bcrypt('123456789*'),
            'est_usuario' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
