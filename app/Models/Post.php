<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'title', 'cat_id', 'description', 'content', 'image'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }
}
