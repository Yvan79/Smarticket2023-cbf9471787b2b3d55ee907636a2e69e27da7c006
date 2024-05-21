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
        Schema::create('usuario_evento', function (Blueprint $table) {
            $table->id();
            $table->string('id_usuario');
            $table->string('id_evento');
            $table->integer('estado')->default('1');
            $table->timestamps();
        });
        DB::table('usuario_evento')->insert([
            [
            'id_usuario' => 'Luis Alberto Reyes',
            'id_evento' => 'JLGXV',
            'estado' => '1',
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
        Schema::dropIfExists('usuario_evento');
    }
};
