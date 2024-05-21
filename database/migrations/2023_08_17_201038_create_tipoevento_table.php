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
        Schema::create('tipoevento', function (Blueprint $table) {
            $table->id();
            $table->string('des_evento')->nullable();
            $table->integer('est_evento');
            $table->timestamps();
        });
        DB::table('tipoevento')->insert([
            [/*'id' => 1,*/
            'des_evento' => 'Festival',
            'est_evento' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]
        ]);
        DB::table('tipoevento')->insert([
            [/*'id' => 1,*/
            'des_evento' => 'Congreso',
            'est_evento' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]
        ]);
        DB::table('tipoevento')->insert([
            [/*'id' => 1,*/
            'des_evento' => 'Ferias',
            'est_evento' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]
        ]);
        DB::table('tipoevento')->insert([
            [/*'id' => 1,*/
            'des_evento' => 'Conciertos',
            'est_evento' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]
        ]);
        DB::table('tipoevento')->insert([
            [/*'id' => 1,*/
            'des_evento' => 'Reunión',
            'est_evento' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]
        ]);
        DB::table('tipoevento')->insert([
            [/*'id' => 1,*/
            'des_evento' => 'Cumpleaños',
            'est_evento' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]
        ]);
        DB::table('tipoevento')->insert([
            [/*'id' => 1,*/
            'des_evento' => 'Deportivo',
            'est_evento' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]
        ]);
        DB::table('tipoevento')->insert([
            [/*'id' => 1,*/
            'des_evento' => 'Privado',
            'est_evento' => 1,
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
        Schema::dropIfExists('tipoevento');
    }
};
