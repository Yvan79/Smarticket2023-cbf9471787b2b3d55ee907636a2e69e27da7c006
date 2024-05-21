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
        Schema::create('empresa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom_empresa');
            $table->string('dir_empresa');
            $table->string('ruc_empresa');
            $table->integer('est_empresa')->default('1');
            $table->timestamps();
        });
        DB::table('empresa')->insert([
            [/*'id' => 1,*/
            'nom_empresa' => 'EXIVEN',
            'dir_empresa' => 'Jr, Jr. Trujillo 705, Magdalena del Mar',
            'ruc_empresa' => '20510803435',
            'est_empresa' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]
        ]);
        DB::table('empresa')->insert([
            [/*'id' => 2,*/
            'nom_empresa' => 'IDMEDIC',
            'dir_empresa' => 'Jr. Trujillo 703, Magdalena del Mar',
            'ruc_empresa' => '20524570417',
            'est_empresa' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]
        ]);
        DB::table('empresa')->insert([
            [/*'id' => 2,*/
            'nom_empresa' => 'MEDLIFE',
            'dir_empresa' => 'Pje. Caracas 158, Jesús María 15072',
            'ruc_empresa' => '20602360327',
            'est_empresa' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]
        ]);
        DB::table('empresa')->insert([
            [/*'id' => 2,*/
            'nom_empresa' => 'OLCESE',
            'dir_empresa' => 'Av Saenz Peña 348, Callao 07021',
            'ruc_empresa' => '20100410070',
            'est_empresa' => 1,
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
        Schema::dropIfExists('empresa');
    }
};
