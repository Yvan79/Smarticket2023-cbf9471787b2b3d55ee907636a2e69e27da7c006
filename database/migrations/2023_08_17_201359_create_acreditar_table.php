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
        Schema::create('acreditar', function (Blueprint $table) {
            $table->id();
            $table->string('id_acceso');
            $table->string('dni_acreditar')->unique();
            $table->string('nom_acreditar');
            $table->string('cod_usuario')->nullable();
            $table->string('correlativo', 5);
            $table->string('cod_evento')->nullable();
            $table->string('barcode')->nullable();
            $table->date('fec_acreditar')->nullable();
            $table->integer('estado')->default('1');
            $table->timestamps();
        });
        DB::table('acreditar')->insert([
            [/*'id' => 1,*/
            'id_acceso' => 'STAFF',
            'dni_acreditar' => 70752346,      
            'nom_acreditar' => 'Luis Alberto Reyes Chagua',
            'cod_usuario' => 'LAR',
            'correlativo' => '00001',
            'cod_evento' => 'JLGXV',
            'barcode' => 'JLGXV00001',
            'fec_acreditar' => '2023-08-17',
            'estado' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]
        ]);
        DB::table('acreditar')->insert([
            [/*'id' => 1,*/
            'id_acceso' => 'ALL ACCESS',
            'dni_acreditar' => 42667249,      
            'nom_acreditar' => 'Jose de los Santos Paredes',
            'cod_usuario' => 'JLP',
            'correlativo' => '00002',
            'cod_evento' => 'JLGXV',
            'barcode' => 'JLGXV00002',
            'fec_acreditar' => '2023-08-17',
            'estado' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]
        ]);
        DB::table('acreditar')->insert([
            [/*'id' => 1,*/
            'id_acceso' => 'INVITADOS',
            'dni_acreditar' => 42937079,      
            'nom_acreditar' => 'Carlos David Najarro Simon',
            'cod_usuario' => 'DNS',
            'correlativo' => '00003',
            'cod_evento' => 'JLGXV',
            'barcode' => 'JLGXV00003',
            'fec_acreditar' => '2023-08-17',
            'estado' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]
        ]);
        DB::table('acreditar')->insert([
            [/*'id' => 1,*/
            'id_acceso' => 'TECNICO',
            'dni_acreditar' => 42937379,      
            'nom_acreditar' => 'Fulvio Cordano Cordano',
            'cod_usuario' => 'FCC',
            'correlativo' => '00004',
            'cod_evento' => 'JLGXV',
            'barcode' => 'JLGXV00004',
            'fec_acreditar' => '2023-08-17',
            'estado' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]
        ]);
        DB::table('acreditar')->insert([
            [/*'id' => 1,*/
            'id_acceso' => 'TECNICO',
            'dni_acreditar' => 45097633,      
            'nom_acreditar' => 'Debora Leonor Muro Pablo',
            'cod_usuario' => 'DLMP',
            'correlativo' => '00005',
            'cod_evento' => 'JLGXV',
            'barcode' => 'JLGXV00005',
            'fec_acreditar' => '2023-08-17',
            'estado' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]
        ]);
        DB::table('acreditar')->insert([
            [/*'id' => 1,*/
            'id_acceso' => 'ALL ACCESS',
            'dni_acreditar' => 25479826,      
            'nom_acreditar' => 'Ofelia Hipolita Ramirez Paredes',
            'cod_usuario' => 'OHRP',
            'correlativo' => '00006',
            'cod_evento' => 'JLGXV',
            'barcode' => 'JLGXV00006',
            'fec_acreditar' => '2023-08-17',
            'estado' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]
        ]);
        DB::table('acreditar')->insert([
            [/*'id' => 1,*/
            'id_acceso' => 'STAFF',
            'dni_acreditar' => 65084579,      
            'nom_acreditar' => 'Fiorela Velasquez Ramirez',
            'cod_usuario' => 'FVR',
            'correlativo' => '00007',
            'cod_evento' => 'JLGXV',
            'barcode' => 'JLGXV00007',
            'fec_acreditar' => '2023-08-17',
            'estado' => 1,
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
        Schema::dropIfExists('acreditar');
    }
};
