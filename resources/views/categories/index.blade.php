@extends('main')
@section('title', 'View categories')

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
				@foreach($categories as $category)
				<tr>
					<td>{{$category->id}}</td>
					<td>{{$category->name}}</td>
					<td>
						<a class="btn btn-default btn-sm" href="{{route('categories.edit', $category->id)}}">Edit</a>
					</td>
					<td>
						<form method="POST" action="{{route('categories.destroy', $category->id)}}">
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
			<form method="POST" action="{{route('categories.store')}}">
			{{csrf_field()}}
				<div class="form-group">
					<label>Category name:</label>
					<input type="text" name="name" class="form-control">
				</div>
				<div class="form-group">
					<input type="submit" value="Add category" class="btn btn-primary form-control">
				</div>
				@include('partials._errors')
			</form>
		</div>
	</div>
</div>
@endsection