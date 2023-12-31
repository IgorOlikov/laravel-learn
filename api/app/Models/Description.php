<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;
    use HasUuids;

    public $timestamps = false;

    protected $fillable = ['text','product_id'];

    protected $table = 'description';


}
