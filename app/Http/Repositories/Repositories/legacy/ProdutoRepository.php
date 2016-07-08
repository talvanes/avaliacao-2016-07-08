<?php namespace CadastroProdutos\Repositories\Repositories\Legacy;

use CadastroProdutos\Models\Legacy\Produto;
use CadastroProdutos\Repositories\Repositories\RepositoryAbstract;

class ProdutoRepository extends RepositoryAbstract {

    public function entity()
    {
        return Produto::class;
    }

    /**
     * @param array $data
     * @return static
     */
    public function create(array $data)
    {
        $legacyData = [
            'idCategoria' => $data['categoryId'],
            'nomeProduto' => $data['productName'],
            'precoProduto' => $data['productPrice'],
            'descricaoProduto' => $data['productDesciption'],
        ];

        return parent::create($legacyData);
    }

    /**
     * @param array $data
     * @param int $id
     * @param string $attribute
     * @return mixed
     */
    public function update(array $data, $id, $attribute = 'id')
    {
        $legacyData = [
            'idCategoria' => $data['categoryId'],
            'nomeProduto' => $data['productName'],
            'precoProduto' => $data['productPrice'],
            'descricaoProduto' => $data['productDesciption'],
        ];
        
        return parent::update($legacyData, $id, $attribute);
    }

}
