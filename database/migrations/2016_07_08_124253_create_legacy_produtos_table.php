<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLegacyProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_LEGACY'))->create('Produto', function (Blueprint $table) {
            $table->bigIncrements('idProduto');
            $table->unsignedBigInteger('idCategoria');
            $table->string('nomeProduto');
            $table->decimal('precoProduto');
            $table->text('descricaoProduto');
            # chave estrangeira
            $table->foreign('idCategoria')->references('idCategoria')->on('Categoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection(env('DB_LEGACY'))->drop('Produto');
    }
}
