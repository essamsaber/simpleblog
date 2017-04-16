@extends('main')
@section('title', ' Home')
@section('stylesheet')
	<link rel="stylesheet" type="text/css" href="{{url('css/comments.css')}}">
@endsection
@section('content')


  <div class="row">
  	<div class="col-md-8 col-md-offset-2">
	  <div class="post">
	  	<p><img height="300" width="700" src="{{asset('images/'.$post->image)}}"></p>
		<h1>{{$post->title}}</h1>
		<h5><strong>Published:</strong> <em>{{$post->created_at->diffForHumans()}}</em></h5>
		<p style="word-wrap:break-word;">{!!$post->body!!}</p>
		<hr>
		<p><strong>Posted In:</strong> {{$post->category->name}}</p>
		<p>
		@foreach($post->tags as $tag)	
		<span class="label label-default">{{$tag->name}}</span></p>
		@endforeach
	  </div>
	  <hr>	
	</div>
  </div>
  @foreach($post->comments as $comment)
  	@if($comment->approve == 1)
  		@include('pages.comments')
  	@endif
  @endforeach
  <hr>
  @include('pages.comment-form')
@endsection