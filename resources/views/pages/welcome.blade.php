@extends('main')
@section('title', ' Home')
@section('content')

<div class="row">
	<div class="col-md-12">
	  <div class="jumbotron">
		<h1>Hello, world!</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
	  </div>
	</div>
  </div>
  <div class="row">
  	<div class="col-md-8">
  	@foreach($posts as $post)

	  <div class="post">
		<h3>{{$post->title}}</h3>
		<p style="word-wrap:break-word;">{!!substr($post->body, 0, 200)!!}</p>
		<a href="/post/{{$post->slug}}" class="btn btn-primary btn-sm">Read More</a>
	  </div>
	  <hr>
	
	@endforeach
	</div>
	<div class="col-md-3 col-md-offset-1">
	  <h3>Sidebar</h3>
	</div>
  </div>

@endsection