<nav class="navbar navbar-default">
  <div class="container-fluid">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="/">Laravel Blog</a>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	  <ul class="nav navbar-nav">
		<li class="{{Request::is('/') ? 'active' : ''}}"><a href="/">Home</a></li>
		<li class="{{Request::is('about') ? 'active' : ''}}"><a href="/about">About</a></li>
		<li class="{{Request::is('contact') ? 'active' : ''}}"><a href="/contact">Contact</a></li>
		@if(!Auth::check())
			<li><a href="/login">Admin login</a></li>
		@endif
	  </ul>
	  @if(Auth::check())
	  <ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
		  {{auth()->user()->name}} <span class="caret"></span></a>
		  <ul class="dropdown-menu">
			<li><a href="{{route('posts.index')}}">View all posts</a></li>
			<li><a href="{{route('categories.index')}}">Categories</a></li>
			<li><a href="{{route('tags.index')}}">Tags</a></li>
			<li><a href="{{route('comments.index')}}">Comments</a></li>
			<li role="separator" class="divider"></li>
			<li><a href="{{url('logout')}}">Logout</a></li>
		  </ul>
		</li>
	  </ul>
	  @endif
	</div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>