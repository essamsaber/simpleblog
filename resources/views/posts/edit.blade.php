@extends('main')

@section('title', 'Edit post')


@section('content')

<div class="row">
	<div class="col-md-8">
		<h1>Edit post</h1>
		<hr>
		<form method="POST" action="/posts/{{$post->id}}" enctype="multipart/form-data">
		{{csrf_field()}}
		{{method_field('PUT')}}
			<div class="form-group">
				<label for="title">Title:</label>
				<input type="text" name="title" class="form-control" value="{{$post->title}}">
			</div>
			<div class="form-group">
				<label >Category:</label>
				<select class="form-control" name="category_id">
					<option>Select category</option>
					@foreach($categories as $category)
					<option {{$post->category_id == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label >Tags:</label>
				<select class="form-control select2-multi" name="tags[]" multiple="multiple">
					@foreach($tags as $tag)
					<option value="{{$tag->id}}">{{$tag->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="image">Upload image:</label>
				<input type="file" name="featured_image">
			</div>
			<div class="form-group">
				<label for="body">Post Body:</label>
				<textarea rows="10" name="body" class="form-control">{{$post->body}}</textarea>
			</div>
			<div class="form-group">
				<input type="submit" value="Update post" class="btn btn-success form-control">
			</div>
			<!-- Show user the errors if exists-->
			@include('partials._errors')
		</form>
	</div>
	<div class="col-md-4">
		<div class="well">
			<dl class="dl-horizontal">
				<p><strong>URI:</strong></p>
				<p><a href="{{url('post/'. $post->slug)}}">{{url('post/'. $post->slug)}}</a></p>
			</dl>
			<dl class="dl-horizontal">
				<dt>Created at:</dt>
				<dd>{{$post->created_at->diffForHumans()}}</dd>
			</dl>
			<dl class="dl-horizontal">
				<dt>Last update:</dt>
				<dd>{{$post->updated_at->diffForHumans()}}</dd>
			</dl>
			<hr>
			<div class="row">
				<div class="col-sm-6">
					<a href="{{route('posts.show', $post->id)}}" class="btn btn-danger btn-block">Cancel</a>
				</div>
				<form method="POST" action="{{route('posts.destroy', $post->id)}}">
				{{csrf_field()}}
				{{method_field('DELETE')}}
				<div class="col-sm-6">
					<button class="btn btn-info btn-block">Delete</button>
				</div>
				</form>
			</div>
			<hr>
			<div class="row">
				<div class="col-sm-12">
					<a href="{{route('posts.index')}}" class="btn btn-default btn-block"><< See all posts</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
	<script type="text/javascript">
		$('.select2-multi').select2();
		$('.select2-multi').select2().val( {{ json_encode($post->tags()->allRelatedIds() )}}).trigger('change');

	</script>
	<script src="{{url('js/tinymce.min.js')}}"></script>
	<script src="{{url('js/jquery.tinymce.min.js')}}"></script>
	<script type="text/javascript">
		tinymce.init({ 
			selector:'textarea',
			plugins: 'link code',
			menubar: false			
			});	 	
	 </script>
@endsection