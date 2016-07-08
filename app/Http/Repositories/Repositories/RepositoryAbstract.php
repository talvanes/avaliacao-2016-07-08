<?php namespace CadastroProdutos\Repositories\Repositories;

use CadastroProdutos\Repositories\Contracts\IRepository;
use CadastroProdutos\Repositories\Exceptions\RepositoryException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

abstract class RepositoryAbstract implements IRepository {

    /** @var App */
    protected $app;
    /** @var  Model */
    protected $model;

    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeEntity();
    }

    abstract function entity();

    private function makeEntity(){
        $model = $this->app->make($this->entity());

        if (!$model instanceof  Model){
            throw new RepositoryException("Class {$this->entity()} must be an instance of " . Model::class . "!");
        }
        
        $this->model = $model->newQuery();
        return $model;
    }

    /**
     * @param array $columns
     */
    public function all(array $columns = ['*'])
    {
        return $this->model->get($columns);
    }

    /**
     * @param int $perPage
     * @param array $columns
     */
    public function paginate($perPage = 10, array $columns = ['*'])
    {
        return $this->model->paginate($perPage, $columns);
    }

    /**
     * @param array $data
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param array $data
     * @param integer $id
     * @param string $attribute
     */
    public function update(array $data, $id, $attribute = 'id')
    {
        return $this->model->where($attribute, $id)->update($data);
    }

    /**
     * @param int $id
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * @param integer $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, array $columns = ['*'])
    {
        return $this->model->find($id, $columns);
    }

    /**
     * @param string $field
     * @param mixed $value
     * @param array $columns
     */
    public function findBy($field, $value, array $columns = ['*'])
    {
        return $this->model->where($field, $value)->first($columns);
    }

}
