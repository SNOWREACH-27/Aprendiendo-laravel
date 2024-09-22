<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommentPost extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'post1_id'
    ];
    public function posts(){
        return $this->belongsTo(Post1::class);
    }
}

