<?php namespace CadastroProdutos\Repositories\Contracts;

interface IRepository {

    public function all(array $columns = ['*']);

    public function paginate($perPage = 10, array $columns = ['*']);

    public function create(array $data);

    public function update(array $data, $id, $attribute = 'id');

    public function delete($id);

    public function find($id, array $columns = ['*']);

    public function findBy($field, $value, array $columns = ['*']);
}