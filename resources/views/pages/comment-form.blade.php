  <div class="row">
  	<div class="col-md-5 col-md-offset-2">
	  <div class="comment">
		<form method="POST" action="/comments">
			{{csrf_field()}}
			<input type="hidden" name="post_id" value="{{$post->id}}">
			<div class="form-group">
				<label>Name:</label>
				<input type="text" name="name" class="">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label>Email:</label>
				<input type="email" name="email" class="">
			</div>
			<div class="form-group">
				<label>Comment:</label>
				<textarea name="comment" class="form-control" rows="4"></textarea>
			</div>			
			<div class="form-group">
				<input type="submit" value="Leave a comment" class="btn btn-primary btn-sm">
			</div>
			@include('partials._errors')
		</form>
	  </div>
	  <hr>	
	</div>
  </div>