<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Create Blog</title>
</head>
<body>
	<a href="{{ route('blog.index') }}">My Blogs</a>
<h1 style="margin-bottom: 1rem;">Create a new blog</h1>
@if(Session::has('success'))
	<span style="width: 100%; float:left; margin-bottom: 1rem;margin-top:1rem;color:#0f9868;"><h3 style="margin-bottom:0;margin-top:0;">{{ Session::get('success') }}</h3></span>
@endif

<form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
	@csrf
	<div style="margin-bottom:.5rem;">
		<label>Title</label>
		<input type="text" name="blog_title" value="{{ old('blog_title') }}">
		<br>
		@if($errors->has('blog_title'))
			<span style="color:#ff0000;">{{ $errors->first('blog_title') }}</span>
		@endif
	</div>
	
	<div style="margin-bottom:.5rem;">
		<label>Description</label><br>
		<textarea type="text" name="blog_description" rows="4" cols="50">{{ old('blog_description') }}</textarea>
		<br>
		@if($errors->has('blog_description'))
			<span style="color:#ff0000;">{{ $errors->first('blog_description') }}</span>
		@endif
	</div>

	<div style="margin-bottom:.5rem;">
		<label>Publishing option</label>
		<br>
		<label>
			<input type="radio" name="publishing" value="1"> Publish
		</label>
		<label>
			<input type="radio" name="publishing" value="2"> Unpublish
		</label>
		<br>
		@if($errors->has('publishing'))
			<span style="color:#ff0000;">{{ $errors->first('publishing') }}</span>
		@endif
	</div>

	<div style="margin-bottom:.5rem;">
		<label>Upload an image for your blog</label>
		<input type="file" name="blog_image">
		<br>
		@if($errors->has('blog_image'))
			<span style="color:#ff0000;">{{ $errors->first('blog_image') }}</span>
		@endif
	</div>

	<div style="margin-bottom:.5rem;">
		<button type="submit">Add Blog</button>
	</div>
</form>
</body>
</html>

