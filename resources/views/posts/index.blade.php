@extends('main')

@section('title', 'View all posts')

@section('content')

<div class="row">
	<div class="col-md-10">
		<h1>All posts</h1>
	</div>
	<div class="col-md-2">
		<a href="{{route('posts.create')}}" class="btn btn-block btn-primary">Add new post</a>
	</div>
	<div class="col-md-12">
		<hr>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<th>#</th>
				<th>Title</th>
				<th>Body</th>
				<th>Created at</th>
				<th></th>
			</thead>
			<tbody>
			@foreach($posts as $post)
				<tr>
				<td>{{$post->id}}</td>
				<td>{{$post->title}}</td>
				<td>{{$post->shortBody}}</td>
				<td>{{$post->created_at}}</td>
				<td><a class="btn btn-default" href="{{route('posts.show', $post->id)}}">View</a><a class="btn btn-default" href="{{route('posts.edit', $post->id)}}">Edit</a></td>
				</tr>				
			@endforeach
			</tbody>
		</table>
		<div class="text-center">
			{{$posts->links()}}
		</div>
	</div>
</div>
	
@endsection