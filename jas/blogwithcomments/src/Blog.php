<?php

namespace Jas\BlogWithComments;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public function comments() {
        return $this->hasMany(Comment::class, 'blog_id');
    }

    protected $fillable = [
        'blog_title',
        'blog_description',
        'publishing',
        'blog_image',
    ];
}
