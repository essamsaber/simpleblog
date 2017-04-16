@extends('main')
@section('title', 'View Tags')

@section('content')
<h1>{{$tag->name}} Tag <small>{{$tag->posts->count() }} Posts</small></h1>
<hr>
<div class="row">
	<div class="col-md-8">
		<table class="table table-hover">
			<thead>
			<tr>
				<th>#</th>
				<th>Title</th>
				<th>Tags</th>
				<th></th>
			</tr>
			</thead>
			<tbody>
			@foreach($tag->posts as $post)
				<tr>
					<td>{{$post->id}}</td>
					<td><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></td>
					<td>
					@foreach($post->tags as $tag)
					
						<span class="label label-default">{{$tag->name}}</span>
					
					@endforeach
					</td>
					<td>
						<a href="{{route('posts.show', $post->id)}}" class="btn btn-info btn-sm">View</a>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	<div class="col-md-4">
		<div class="well">
			<form method="POST" action="{{route('tags.store')}}">
			{{csrf_field()}}
				<div class="form-group">
					<label>Tag name:</label>
					<input type="text" name="name" class="form-control">
				</div>
				<div class="form-group">
					<input type="submit" value="Add tag" class="btn btn-primary form-control">
				</div>
				@include('partials._errors')
			</form>
		</div>
	</div>
</div>
@endsection