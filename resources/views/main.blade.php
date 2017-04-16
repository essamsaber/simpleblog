<!-- Header Section-->
@include('partials._header')
<!-- End Header Section-->

<!-- Nav Section -->
@include('partials._nav')
<!-- End Nav Section-->

<!--Container div-->
<div class="container">

<!-- Show user a massage -->
@include('partials._messages')

  @yield('content')
</div> <!-- End of container div-->

<!-- Footer Section-->
@include('partials._footer')
<!-- End of footer section -->