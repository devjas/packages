<?php 

use Jas\BlogWithComments\BlogController;
use Jas\BlogWithComments\FrontBlogController;
use Jas\BlogWithComments\CommentController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web']], function() {
	Route::resource('/blog', BlogController::class)->middleware('auth');
	Route::get('/blog-preview/{blog_id}', [FrontBlogController::class, 'blogPreview'])->name('blog.preview');
	Route::get('/blogs/', [FrontBlogController::class, 'blogs'])->name('blogs');
	Route::resource('comments', CommentController::class);
});


