<?php

namespace CadastroProdutos\Http\Controllers\Produto;

use CadastroProdutos\Repositories\Repositories\ProdutoRepository;
use Illuminate\Http\Request;

use CadastroProdutos\Http\Requests;
use CadastroProdutos\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProdutoController extends Controller
{
    /** @var ProdutoRepository */
    protected $produtoRepository;

    /**
     * ProdutoController constructor.
     * @param ProdutoRepository $produtoRepository
     */
    public function __construct(ProdutoRepository $produtoRepository)
    {
        $this->produtoRepository = $produtoRepository;
    }

    /**
     * Exibe a listagem de produtos
     */
    public function index(){
        $products = $this->produtoRepository->all();
        return view('content.produtos.index.index', $products);
    }

    /**
     * Exibe o formulário de cadastro
     */
    public function create(){
        return view('content.produtos.create.index');
    }

    /**
     * @param integer $id
     */
    public function edit($id){
        return view('content.produtos.edit.index', ['id' => $id]);
    }


    /**
     * @param Request $request
     * @return Response
     */
    public function store(Request $request){
        $product = $this->produtoRepository->create($request->all());
        return new Response($product);
    }

    /**
     * @param Request $request
     * @param integer $id
     * @return Response
     */
    public function update(Request $request, $id){
        $product = $this->produtoRepository->update($request->all(), $id);
        return new Response($product);
    }

    /**
     * @param integer $id
     */
    public function destroy($id){
        $response = (bool) $this->produtoRepository->delete($id);
        return new Response($response);
    }


}
