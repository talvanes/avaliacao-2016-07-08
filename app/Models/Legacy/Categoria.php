<?php

namespace CadastroProdutos\Models\Legacy;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $connection = 'Legacy';
    protected $table = 'Categoria';

    protected $primaryKey = 'idCategoria';

    public $timestamps = false;

    protected $fillable = [
        'nomeCategoria',
    ];

    public static $snakeAttributes = false;
}
