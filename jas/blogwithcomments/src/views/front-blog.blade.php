<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>My Blogs</title>
</head>
<body>
	@foreach($blogs as $blog)
		@if($blog->publishing == 1) 
			<div>
				<h3 style="margin-top:0; margin-bottom:.25rem;"><a href="{{ route('blog.preview', $blog->id) }}">{{ $blog->blog_title }}</a></h3>
				<p style="margin-top:0; margin-bottom: 0rem;">{{ \Illuminate\Support\Str::limit($blog->blog_description, 100) }}</p>
				<p style="margin-top:0;"><a href="{{ route('blog.preview', $blog->id) }}">Read More</a></p>
			</div>
		@endif
	@endforeach
</body>
</html>