<?php

use App\Models\Entradas;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zonas', function (Blueprint $table) {
            $table->id();
            $table->string('nom_zona');
            $table->integer('aforo')->nullable();
            $table->double('precio', 8, 2)->nullable();
            $table->string('funciones')->nullable();
            $table->string('entradas')->nullable();
            $table->string('color')->nullable();
            $table->string('tipoasiento')->nullable();
            $table->timestamps();
        });
        DB::table('zonas')->insert([
            [
            'nom_zona' => 'GENERAL',
            'aforo' => '90',      
            'precio' => '10.50',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]
        ]);
        DB::table('zonas')->insert([
            [
            'nom_zona' => 'VIP',
            'aforo' => '90',      
            'precio' => '30.50',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]
        ]);
        DB::table('zonas')->insert([
            [
            'nom_zona' => 'PLATINIUM',
            'aforo' => '50',      
            'precio' => '90.50',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]
        ]);
        DB::table('zonas')->insert([
            [
            'nom_zona' => 'VOX',
            'aforo' => '15',      
            'precio' => '19.50',
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
        Schema::dropIfExists('zonas');
    }
};
