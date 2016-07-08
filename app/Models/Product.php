<?php

namespace CadastroProdutos\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $connection = 'Production';
    protected $table = 'Product';

    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'categoryId',
        'productName',
        'productPrice',
        'productPicture',
        'productDesciption',
    ];

    public static $snakeAttributes = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Category(){
        return $this->belongsTo(Category::class, 'categoryId');
    }
}
