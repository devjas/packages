<?php

namespace Jas\BlogWithComments;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jas\BlogWithComments\Blog;

class FrontBlogController extends Controller
{
    public function blogs() {
        $blogs = Blog::all();
        return view('bwc::front-blog', ['blogs' => $blogs]);
    }

    public function blogPreview($blog_id) {
        $blog = Blog::findOrFail($blog_id);
        return view('bwc::front-blog-preview', ['blog' => $blog]);
    }
}
