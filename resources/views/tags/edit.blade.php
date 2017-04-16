@extends('main')

@section('title', 'Edit tag')

@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="well">
			<form method="POST" action="{{route('tags.update', $tag->id)}}">
			{{csrf_field()}}
			{{method_field('PATCH')}}
				<div class="form-group">
					<label>Tag name:</label>
					<input type="text" name="name" class="form-control" value="{{$tag->name}}">
				</div>
				<div class="form-group">
					<input type="submit" value="Update tag" class="btn btn-primary form-control">
				</div>
				@include('partials._errors')
			</form>
		</div>
	</div>
</div>
@endsection