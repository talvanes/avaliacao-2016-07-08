<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(env('DB_PRODUCTION'))->create('Product', function (Blueprint $table) {
            # chave primária
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('categoryId');
            $table->string('productName');
            $table->decimal('productPrice');
            $table->string('productPicture');
            $table->text('productDesciption');
            # chave estrangeira
            $table->primary('id');
            $table->foreign('categoryId')->references('id')->on('Category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection(env('DB_PRODUCTION'))->drop('Product');
    }
}
