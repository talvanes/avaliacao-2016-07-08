<?php

namespace CadastroProdutos\Models\Legacy;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $connection = 'Legacy';
    protected $table = 'Produto';

    protected $primaryKey = 'idProduto';

    public $timestamps = false;

    protected $fillable = [
        'idCategoria',
        'nomeProduto',
        'precoProduto',
        'descricaoProduto',
    ];

    public static $snakeAttributes = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Categoria(){
        return $this->belongsTo(Categoria::class, 'idCategoria');
    }
}
