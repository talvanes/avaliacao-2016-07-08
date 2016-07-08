<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IndexTests extends TestCase
{
    /**
     * Este teste deveria acessar a página inicial com a listagem de produtos.
     *
     * @return void
     */
    public function testShouldAccessIndexRoute()
    {
        # Listagem
        $this->get(route('produto.index'))->assertResponseOk();

        # Cadastro
        $this->get(route('produto.create'))->assertResponseOk();

        # Edição
        // banco antigo
        $lastInsert = \DB::connection(env('DB_PRODUCTION'))->table('Produto')->orderBy('idProduto', 'desc')->first();
        $idProduto = $lastInsert? ($lastInsert->idProduto + 1) : 1;
        // categoria qualquer
        $category = \CadastroProdutos\Models\Category::first();
        // produto qualquer
        $productName = str_random( rand(10,30) );
        $product = \CadastroProdutos\Models\Product::create([
            'id' => $idProduto,
            'categoryId' => $category->id,
            'productName' => $productName,
            'productPrice' => rand(1, 100000000),
            'productPicture' => '/var/www/imagens/' . md5("{$productName}{$idProduto}") . '.jpeg',
            'productDesciption' => str_random(200),
        ]);
        $this->get(route('produto.edit', $product->id))->assertResponseOk();
    }

    /**
     * Este teste deveria listar todos os produtos.
     *
     * @return void
     */
    public function testShouldListAllProducts()
    {
        
    }
}
