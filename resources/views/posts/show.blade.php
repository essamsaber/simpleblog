@extends('main')

@section('title')
	{{$post->title}}
@endsection

@section('content')
<div class="row">
	<div class="col-md-8">		
		<p><img height="300" width="700" src="{{asset('images/'.$post->image)}}"></p>
		<h1>{{$post->title}}</h1>
		<p style=" word-wrap: break-word;" class="lead">{!!$post->body!!}</p>
		<hr>
		<div class="tags">
			@foreach($post->tags as $tag)
				<span class="label label-default">{{$tag->name}}</span>
			@endforeach
		</div>
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
					<a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary btn-block">Edit</a>
				</div>
				<form method="POST" action="{{route('posts.destroy', $post->id)}}">
				{{csrf_field()}}
				{{method_field('DELETE')}}
				<div class="col-sm-6">
					<button class="btn btn-danger btn-block">Delete</button>
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

