<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
*
* @var array
*/
class Category extends Model
{
    use HasFactory;
    protected $table = 'category';

    protected $fillable = ['name'];

    public $timestamps = false;

    public function product_category()
    {
        return $this->hasMany(ProductCategory::class);
    }

    public function products()
    {
        return $this->hasManyThrough(Product::class,ProductCategory::class);
    }

}
