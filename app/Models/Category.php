<?php

namespace CadastroProdutos\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $connection = 'Production';
    protected $table = 'Category';

    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'categoryName',
    ];

    public static $snakeAttributes = false;
}
