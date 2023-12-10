<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'product_category';
    protected $fillable = ['name', 'category_id'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function attributes(){
        return $this->hasMany(AttributeName::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
