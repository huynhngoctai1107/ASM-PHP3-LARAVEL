
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Foody - Organic Food Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    {!! RecaptchaV3::initJs() !!}
    @yield('css')
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

     <div class="container-fluid fixed-top px-0 wow fadeIn " data-wow-delay="0.1s">
 
      <x-client.header.navbar>
      </x-client.header.navbar>

     </div>

     <div class="wapper-main pt-5">
            @yield('main')

     </div>

     <x-client.footer.footer>
    </x-client.footer.footer>
 

    <!-- JavaScript Libraries -->
     @yield('js')
      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
      <script src="{{asset('lib/wow/wow.min.js')}}"></script>
      <script src="{{asset('lib/easing/easing.min.js')}}"></script>
      <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
      <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>

      <!-- Template Javascript -->
      <script src="{{asset('js/main.js')}}"></script>
</body>

</html>
