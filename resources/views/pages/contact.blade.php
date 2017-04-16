@extends('main')
@section('title', 'Contact us')
@section('content')

  <div class="row">
    <div class="col-md-12">
      <h1>Contact Us</h1>
      <hr>
      <form method="POST" action="/contact">
      {{csrf_field()}}
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="subject">Subject:</label>
          <input type="text" id="subject" name="subject" class="form-control">
        </div>
        <div class="form-group">
          <label for="message">Message:</label>
          <textarea name="message" class="form-control"></textarea>
        </div>        
        <div class="form-group">
          <input type="submit" name="" class="btn btn-success" value="Send Message">
        </div>
      </form>
    </div>
  </div>

@endsection