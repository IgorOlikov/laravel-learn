<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'attributes_value';
    protected $fillable = ['product_id','product_category_id','attribute_id','value'];


    public function attributes()
    {
        return $this->belongsToMany(AttributeName::class);
    }

    public function  product()
    {
        return $this->belongsTo(Product::class);
    }

    public function product_categiry()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
