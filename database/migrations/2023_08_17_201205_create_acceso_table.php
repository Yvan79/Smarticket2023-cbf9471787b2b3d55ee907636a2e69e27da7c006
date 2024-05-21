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
        Schema::create('acceso', function (Blueprint $table) {
            $table->id();
            $table->string('nom_acceso');
            $table->integer('est_acceso');
            $table->timestamps();
        });
        DB::table('acceso')->insert([
            [
            'nom_acceso' => 'ALL ACCESS',
            'est_acceso' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]
        ]);
        DB::table('acceso')->insert([
            [
            'nom_acceso' => 'TECNICO',
            'est_acceso' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]
        ]);
        DB::table('acceso')->insert([
            [
            'nom_acceso' => 'INVITADO',
            'est_acceso' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]
        ]);
        DB::table('acceso')->insert([
            [
            'nom_acceso' => 'STAFF',
            'est_acceso' => 1,
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
        Schema::dropIfExists('acceso');
    }
};
