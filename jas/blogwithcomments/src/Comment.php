<?php

namespace Jas\BlogWithComments;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function blogs() {
        return $this->belongsTo(Blog::class);
    }

    protected $fillable = [
        'blog_id',
        'comment_title',
        'comment_description',
    ];

}
