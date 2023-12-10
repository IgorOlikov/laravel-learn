<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ReviewComments extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'review_comments';

    protected $fillable = ['review_id','user_id','comment'];

    public function review()
    {
        return $this->belongsTo(Review::class);
    }
    public function comment_owner()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function children_comments(): HasMany
    {
        return $this->hasMany(ReviewComments::class,'parent_id','id')->with('children_comments.comment_owner');
    }

    public function parent_comment(): BelongsTo
    {
        return $this->belongsTo(ReviewComments::class,'parent_id','id');
    }


}
