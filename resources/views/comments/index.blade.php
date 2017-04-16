@extends('main')

@section('title', 'View all posts')

@section('content')

<div class="row">
	<div class="col-md-10">
		<h1>All comments</h1>
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
				<th>Comment Author</th>
				<th>Comment</th>
				<th>Comment in response to</th>
				<th>Status</th>
				<th>Action</th>
			</thead>
			<tbody>
			@foreach($comments as $comment)
				<tr>
				<td>{{$comment->id}}</td>
				<td>{{$comment->name}}</td>
				<td>{{$comment->comment}}</td>
				<td><a href="posts/{{$comment->post->id}}">{{$comment->post->title}}</a></td>
				<td>
				@if($comment->approve == 0)
				<form method="POST" action="{{route('comments.update', $comment->id)}}">
						{{csrf_field()}}
						{{method_field('PUT')}}
						<button class="btn btn-sm btn-default">Approve</button>
				</form>
				@endif
				</td>
				<td>
					<form method="POST" action="{{route('comments.destroy', $comment->id)}}">
						{{csrf_field()}}
						{{method_field('DELETE')}}
						<button class="btn btn-sm btn-default">Delete</button>
					</form>
				</td>
				
				
				</tr>				
			@endforeach
			</tbody>
		</table>
		<div class="text-center">
			{{$comments->links()}}
		</div>
	</div>
</div>
	
@endsection