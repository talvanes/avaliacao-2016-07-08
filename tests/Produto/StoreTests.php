<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StoreTests extends TestCase
{
    /**
     * Este teste deveria dar erro ao não informar o preço do produto.
     *
     * @return void
     */
    public function testShouldErrorWithoutPrice()
    {
        // preço não informado
        $dados = [
            'productPrice' => null,
        ];

        $response = $this->post(route('produto.store'), $dados);
        $this->assertNotEquals(200, $response->response->getContent());
        // mostrar mensagem de erro
        $this->seeInSession('error', "Preço não informado!");
    }

    /**
     * Este teste deveria dar erro ao informar preço menor ou igual a zero.
     *
     * @return void
     */
    public function testShouldErrorOnPriceLessThanOrEqualsZero()
    {
        // preço inválido
        $dados = [
            'productPrice' => 0,
        ];

        $response = $this->post(route('produto.store'), $dados);
        $this->assertNotEquals(200, $response->response->getContent());

        $this->seeInSession('error', "Preço inválido");
    }

    /**
     * Este teste deveria dar erro ao não informar o nome do produto.
     *
     * @return void
     */
    public function testShouldErrorWithoutName()
    {
        // nome não informado
        $dados = [
            'productName' => null,
        ];
    }

    /**
     * Este teste deveria dar erro ao informar nome que já existe na base de dados.
     *
     * @return void
     */
    public function testShouldErrorWithNameExists()
    {

    }

    /**
     * Este teste deveria dar erro ao informar uma categoria que não existe.
     *
     * @return void
     */
    public function testShouldErrorWithCategoryNotExists()
    {

    }

    /**
     * Este teste deveria estar correto ao informar os dados corretos.
     *
     * @return void
     */
    public function testShouldSucceedOnCorrectData()
    {

    }

    /**
     * Este teste deveria esperar dados nos bancos de dados (produção e legado).
     *
     * @return void
     */
    public function testShouldExpectDataInDatabase()
    {

    }
}
