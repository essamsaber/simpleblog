@extends('main')
@section('title', 'View Tags')

@section('content')
<div class="row">
	<div class="col-md-8">
		<table class="table table-hover">
			<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th></th>
				<th></th>
			</tr>
			</thead>
			<tbody>
				@foreach($tags as $tag)
				<tr>
					<td>{{$tag->id}}</td>
					<td><a href="{{route('tags.show', $tag->id)}}">{{$tag->name}}</a></td>
					<td>
						<a class="btn btn-default btn-sm" href="{{route('tags.edit', $tag->id)}}">Edit</a>
					</td>
					<td>
						<form method="POST" action="{{route('tags.destroy', $tag->id)}}">
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<button class="btn btn-danger btn-sm">Delete</button>
						</form>
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