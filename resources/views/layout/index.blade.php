<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>LPPM - Universitas Sugeng Hartono</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Your page description here" />
  <meta name="author" content="" />

  <!-- css -->
  <link href="https://fonts.googleapis.com/css?family=Handlee|Open+Sans:300,400,600,700,800" rel="stylesheet">
  <link href="{{asset('css/bootstrap.css') }}" rel="stylesheet" />
  <link href="{{asset('css/bootstrap-responsive.css') }}" rel="stylesheet" />
  <link href="{{asset('css/flexslider.css') }}" rel="stylesheet" />
  <link href="{{asset('css/prettyPhoto.css') }}" rel="stylesheet" />
  <link href="{{asset('css/camera.css') }}" rel="stylesheet" />
  <link href="{{asset('css/jquery.bxslider.css') }}" rel="stylesheet" />
  <link href="{{asset('css/style.css') }}" rel="stylesheet" />

  <!-- Theme skin -->
  <link href="{{asset('color/default.css') }}" rel="stylesheet" />

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('ico/apple-touch-icon-144-precomposed.png') }}" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('ico/apple-touch-icon-114-precomposed.png') }}" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('ico/apple-touch-icon-72-precomposed.png') }}" />
  <link rel="apple-touch-icon-precomposed" href="{{asset('ico/apple-touch-icon-57-precomposed.png') }}" />
  <link rel="shortcut icon" href="{{asset('ico/itsk.ico') }}" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body>

  <div id="wrapper">

    <!-- start header -->
    <header>
      <div class="top">
        <div class="container">
          <div class="row">
            <div class="span6">
              <p class="topcontact"><i class="icon-phone"></i> +62 822-4204-5300  &nbsp;&nbsp;&nbsp;
                <i class="icon-envelope"></i> &nbsp;lppm@sugenghartono.ac.id
              </p>
            </div>
            <div class="span6">

              <ul class="social-network">
                <li><a href="#" data-placement="bottom" title="Facebook"><i class="icon-facebook icon-white"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Instagram"><i class="icon-instagram icon-white"></i></a></li>
                <li><a href="#" data-placement="bottom" title="Youtube"><i class="icon-youtube icon-white"></i></a></li>
              </ul>

            </div>
          </div>
        </div>
      </div>
      <div class="container">
        @include('layout.header')
      </div>
    </header>
    <!-- end header -->
    @yield('main')


    <footer>
      <div class="container">
        @include('layout.footer')
      </div>
      <div id="sub-footer">
        <div class="container">
          <div class="row">
            <div class="span6">
              <div class="copyright">
                <p><span>&copy; Universitas Sugeng Hartono. All right reserved</span></p>
              </div>

            </div>

            <div class="span6">
              <div class="credits">
                <!--
                  All the links in the footer should remain intact.
                  You can delete the links only if you purchased the pro version.
                  Licensing information: https://bootstrapmade.com/license/
                  Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Eterna
                -->
                Designed by <a href="https://bootstrapmade.com/" style="color: purple;"> Tim Universitas Sugeng Hartono &hearts;</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <a href="#" class="scrollup"><i class="icon-angle-up icon-square icon-bglight icon-2x active"></i></a>

  <!-- javascript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="{{ asset('js/jquery.js') }}"></script>
  <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('js/bootstrap.js') }}"></script>

  <script src="{{ asset('js/modernizr.custom.js') }}"></script>
  <script src="{{ asset('js/toucheffects.js') }}"></script>
  <script src="{{ asset('js/google-code-prettify/prettify.js') }}"></script>
  <script src="{{ asset('js/jquery.bxslider.min.js') }}"></script>
  <script src="{{ asset('js/camera/camera.js') }}"></script>
  <script src="{{ asset('js/camera/setting.js') }}"></script>

  <script src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
  <script src="{{ asset('js/portfolio/jquery.quicksand.js') }}"></script>
  <script src="{{ asset('js/portfolio/setting.js') }}"></script>

  <script src="{{ asset('js/jquery.flexslider.js') }}"></script>
  <script src="{{ asset('js/animate.js') }}"></script>
  <script src="{{ asset('js/inview.js') }}"></script>

  <!-- Template Custom JavaScript File -->
  <script src="{{ asset('js/custom.js') }}"></script>
  <script src="{{ asset('js/app.js') }}"></script>

  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>


</body>

</html>