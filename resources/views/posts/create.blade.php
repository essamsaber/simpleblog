@extends('main')

@section('title', 'Create a new post')

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1>Create a new post</h1>
		<hr>
		<form method="POST" action="/posts" enctype="multipart/form-data">
		{{csrf_field()}}
			<div class="form-group">
				<label for="title">Title:</label>
				<input type="text" name="title" class="form-control">
			</div>
			<div class="form-group">
				<label >Category:</label>
				<select class="form-control" name="category_id">
					@foreach($categories as $category)
					<option value="{{$category->id}}">{{$category->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label >Tags:</label>
				<select class="form-control select2-multi" name="tags[]" multiple="multiple">
					@foreach($tags as $tag)
					<option value="{{$tag->id}}">{{$tag->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="image">Upload image:</label>
				<input type="file" name="featured_image">
			</div>			
			<div class="form-group">
				<label for="body">Post Body:</label>
				<textarea rows="10" name="body" class="form-control"></textarea>
			</div>
			<div class="form-group">
				<input type="submit" value="Create Post" class="btn btn-success form-control">
			</div>
			<!-- Show user the errors if exists-->
			@include('partials._errors')
		</form>
	</div>
</div>
@endsection

@section('scripts')
	<script type="text/javascript">
		$('.select2-multi').select2();
	</script>
	<script src="{{url('js/tinymce.min.js')}}"></script>
	<script src="{{url('js/jquery.tinymce.min.js')}}"></script>
	<script type="text/javascript">
		tinymce.init({ 
			selector:'textarea',
			plugins: 'link code',
			menubar: false			
			});	 	
	 </script>
@endsection