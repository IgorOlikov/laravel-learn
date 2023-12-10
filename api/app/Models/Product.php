<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Sanctum\HasApiTokens;

class Product extends Model
{
    use HasUuids;
    use HasUuids, HasFactory;
    use HasApiTokens;

    //protected $guarded = false;
    protected $table = 'product';
    protected $fillable = ['name' ,'price', 'about' , 'category_id', 'product_category_id','published'];
    public $timestamps = false;


    public function scopeName($query)
    {
       //
    }



    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
    public function attributes_values()
    {
        return $this->hasMany(AttributeValue::class);
    }

    public function description()
    {
        return $this->hasOne(Description::class);
    }

    public function attributes()
    {
        return $this->hasMany(AttributeName::class,'product_category_id','product_category_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class)->with('review_comments.comment_owner.children_comments.comment_owner');
    }

    public function review_comments()
    {
        return $this->hasManyThrough(ReviewComments::class,Review::class);
    }


}
