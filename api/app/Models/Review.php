<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Sanctum\HasApiTokens;

class Review extends Model
{
    use HasFactory;
    use HasUuids;
    use HasApiTokens;


    protected $table = 'review';



    protected $fillable = ['user_id','product_id','commentary','rating'];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function review_comments()
    {
            return $this->hasMany(ReviewComments::class)->with('children_comments.comment_owner');
    }

    public function review_owner(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
