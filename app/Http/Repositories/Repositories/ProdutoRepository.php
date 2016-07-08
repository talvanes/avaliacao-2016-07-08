<?php namespace CadastroProdutos\Repositories\Repositories;

use CadastroProdutos\Models\Product;
use CadastroProdutos\Repositories\Repositories\Legacy\ProdutoRepository as legacyProdutoRepository;

class ProdutoRepository extends RepositoryAbstract {

    /** @var legacyProdutoRepository */
    protected $legacyProdutoRepository;

    public function __construct(App $app, legacyProdutoRepository $legacyProdutoRepository)
    {
        parent::__construct($app);
        $this->legacyProdutoRepository = $legacyProdutoRepository;
    }

    public function entity()
    {
        return Product::class;
    }

    /**
     * @param array $data
     * @return static
     */
    public function create(array $data)
    {
        $legacyProduto = $this->legacyProdutoRepository->create($data);
        $data['id'] = $legacyProduto->idProduto;

        return parent::create($data);
    }

    /**
     * @param array $data
     * @param int $id
     * @param string $attribute
     * @return mixed
     */
    public function update(array $data, $id, $attribute = 'id')
    {
        $this->legacyProdutoRepository->update($data, $id, 'idProduto');

        return parent::update($data, $id, $attribute);
    }

    /**
     * @param int $id
     * @return int
     */
    public function delete($id)
    {
        $this->legacyProdutoRepository->delete($id);
        return parent::delete($id);
    }

}