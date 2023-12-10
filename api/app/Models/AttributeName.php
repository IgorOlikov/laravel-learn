<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AttributeName extends Model
{
    use HasFactory;

    protected $table = 'attributes';
    protected $fillable = ['product_category_id','name'];

    public $timestamps = false;

    public function product_category(){
        return $this->belongsTo(ProductCategory::class);

    }

    public function attributes_values(): HasMany
    {
        return $this->hasMany(AttributeValue::class,'attribute_id','id');
    }

  // public function getNameAttribute($value)
  // {
  //         return str_replace(' ','_',$value);
  // }

}
