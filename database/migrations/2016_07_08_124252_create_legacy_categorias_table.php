<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLegacyCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_LEGACY'))->create('Categoria', function (Blueprint $table) {
            $table->bigIncrements('idCategoria');
            $table->string('nomeCategoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection(env('DB_LEGACY'))->drop('Categoria');
    }
}
