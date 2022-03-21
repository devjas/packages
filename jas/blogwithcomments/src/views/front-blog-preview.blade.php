<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ $blog->blog_title }}</title>
</head>
<body>
	<div style="max-width:1170px; width:100%; margin: 0 auto;">
		<img src="/images/{{ $blog->blog_image }}" alt="{{ $blog->blog_title }}" style="width:350px;">
		<h1 style="margin-bottom: 0;margin-top: 0;">{{ $blog->blog_title }}</h1>
		<p style="margin-bottom: .5rem; margin-top: 0; color:#555;"><b><span>Created on: {{ \Carbon\Carbon::parse($blog->created_at)->format('M d, Y') }}</span></b></p>
		<p style="margin-top: .5rem;">{{ $blog->blog_description }}</p>
	</div>

	
	<div style="width: 100%; max-width:650px; margin:0 auto; margin-top: 5rem;">
		<h1 style="margin-bottom: 0;">Comments:</h1>
		<hr>
		@foreach($blog->comments as $comment)
			<div style="border-bottom: 1px solid #eeeeee;">
				<p style="marign-top:0; margin-bottom:0;"><small style="margin-top:0;">{{ \Carbon\Carbon::parse($comment->created_at)->format('M d, Y') }}</small></p>
				<h3 style="margin-bottom: 0; margin-top:0;">{{ $comment->comment_title }}</h3>
				<p style="margin-top: .25rem;">{{ $comment->comment_description }}</p>
			</div>
		@endforeach
	</div>

	


	<div style="width: 100%; max-width:650px; margin:0 auto; margin-top: 5rem; background: #eeeeee; padding: 2rem 1rem 3rem 1rem;">
		<div style="width:100%; width:500px; margin:0 auto;">
			
			@if(Session::has('success')) <h4 style="color:#31b90c;">{{ Session::get('success') }}</h4> @elseif(Session::has('error')) <h4 style="color:#ff0000;">{{ Session::get('error') }}</h4> @endif
			
			<h2>Leave a Comment</h2>

			<form action="{{ route('comments.store') }}" method="post">
				@csrf
				<input type="hidden" name="blog_id" value="{{ $blog->id }}">
				<div style="margin-bottom: 1rem;">
					<label>Title</label><br>
					<input type="text" name="comment_title" value="{{ old('comment_title') }}"><br>
					@if($errors->has('comment_title'))
						<span style="color: #ff0000;">{{ $errors->first('comment_title') }}</span>
					@endif
				</div>
				<div style="margin-bottom: 1rem;">
					<label>Comment</label><br>
					<textarea name="comment_description" id="" cols="50" rows="10">{{ old('comment_description') }}</textarea><br>
					@if($errors->has('comment_description'))
						<span style="color: #ff0000;">{{ $errors->first('comment_description') }}</span>
					@endif
				</div>
				<div>
					<button type="submit">Add Comment</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>