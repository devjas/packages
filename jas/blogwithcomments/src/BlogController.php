<?php

namespace Jas\BlogWithComments;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Jas\BlogWithComments\Blog;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('bwc::blog', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bwc::create_blog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'blog_title' => 'required',
            'blog_description' => 'required',
            'publishing' => 'required',
            'blog_image' => 'mimes:jpg,png',
        ]);

        if($validator->fails()) {
            return redirect('/blog/create')->withErrors($validator)->withInput();
        }

        if($request->file('blog_image')){
            $filename = $request->file('blog_image');
            $image = $filename->hashName(); // use hashName() for better security
            $filename->move(public_path('images'), $image);
        }

        Blog::create([
            'blog_title' => $request->blog_title,
            'blog_description' => $request->blog_description,
            'publishing' => $request->publishing,
            'blog_image' => $request->file('blog_image') ? $image : NULL,
        ]);

        Session::flash('success','Blog added successfully!');
        return redirect('/blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('bwc::blog', ['blog_id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('bwc::edit_blog', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'blog_title' => 'required',
            'blog_description' => 'required',
            'publishing' => 'required',
            'blog_image' => 'mimes:jpg,png,gif',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if($request->blog_image) {
            $filename = $request->file('blog_image');
            $image = $filename->hashName(); // use hashName() for better security
            $filename->move(public_path('images'), $image);
        }
 
        Blog::where('id', $id)
        ->update([
            'blog_title' => $request->blog_title,
            'blog_description' => $request->blog_description,
            'publishing' => $request->publishing,
            'blog_image' => $request->file('blog_image') ? $image : Blog::find($id)->blog_image,
        ]);

        Session::flash('success','Blog Updated!');
        return redirect('/blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        $blog->delete();

        \File::delete(public_path('/images/'.$blog->blog_image));
    
        return redirect('/blog');
    }
}
