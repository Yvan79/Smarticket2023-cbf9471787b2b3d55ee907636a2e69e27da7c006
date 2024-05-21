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
        Schema::create('avento', function (Blueprint $table) {
            $table->id();
            $table->string('id_empresa');
            $table->string('tip_evento');
            $table->string('nom_evento');
            $table->string('lug_evento')->nullable();
            $table->string('cod_evento')->nullable();
            $table->date('fec_evento')->nullable();
            $table->integer('est_evento')->default('1');
            $table->timestamps();
        });
        DB::table('avento')->insert([
            [
            'id_empresa' => 'EXIVEN',
            'tip_evento' => 'Concierto',
            'nom_evento' => 'Juan Luis Guerra',
            'lug_evento' => 'ESTADIO SAN MARCOS',
            'cod_evento' => 'JLGXV',
            'fec_evento' => '2023-08-18',
            'est_evento' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]
        ]);
        DB::table('avento')->insert([
            [
            'id_empresa' => 'MEDLIFE',
            'tip_evento' => 'Festival',
            'nom_evento' => 'Fercho',
            'lug_evento' => 'ARENA 1 - SAN MIGUEL',
            'cod_evento' => 'FXCER',
            'fec_evento' => '2023-08-18',
            'est_evento' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]
        ]);
    }

    /**
     * 
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('avento');
    }
};
