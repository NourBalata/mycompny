@include('layouts.body.header')
@include('layouts.body.sliders')
  <main id="main">

@yield('home_content')

  </main><!-- End #main -->

@include('layouts.body.footer')


  <!-- Vendor JS Files -->
  <script src="{{asset('fontend/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('fontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('fontend/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('fontend/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('fontend/assets/vendor/jquery-sticky/jquery.sticky.js')}}"></script>
  <script src="{{asset('fontend/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('fontend/assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('fontend/assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('fontend/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('fontend/assets/vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('fontend/assets/js/main.js')}}"></script>

</body>

</html>