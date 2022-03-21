<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Blog</title>
</head>
<body>
	<div><a href="/blog/create">Add New Blog</a></div>
	@foreach($blogs as $blog)
		<div>
			<h3 style="margin-bottom:0;"><a href="{{ route('blog.edit', $blog->id) }}">{{ $blog->blog_title }}</a></h3>
			<p style="margin-top: 0; margin-bottom: .25rem;">{{ $blog->blog_description }}</p>
			<p style="margin-top:0;margin-bottom:0;">
				<a href="{{ route('blog.edit', $blog->id) }}">Edit</a> | 
				<a href="{{ route('blog.destroy', $blog->id) }}" onclick="event.preventDefault(); document.getElementById('deleteBlog').submit();">Delete</a>
				<form action="{{ route('blog.destroy', $blog->id) }}" method="post" id="deleteBlog">
					@csrf
					@method('DELETE')
				</form>
			</p>
		</div>
	@endforeach
</body>
</html>
