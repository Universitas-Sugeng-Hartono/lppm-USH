 <!DOCTYPE html>

 <html lang="en">

 <head>
     <meta charset="utf-8" />
     <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
     <link rel="shortcut icon" href="{{asset('ico/itsk.ico') }}" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
     <title>LPPM Universitas Sugeng Hartono</title>
     <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
     <!--     Fonts and icons     -->
     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
     <!-- CSS Files -->
     <link href="{{asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
     <link href="{{asset('assets/css/light-bootstrap-dashboard.css?v=2.0.0') }} " rel="stylesheet" />
     <!-- CSS Just for demo purpose, don't include it in your project -->
     <link href="{{asset('assets/css/demo.css') }}" rel="stylesheet" />
     <style>
        /* CSS untuk sidebar-wrapper */
        .sidebar-wrapper {
            background-color: rgba(0, 0, 139, 0.3); /* Biru transparan */
        }
    </style>
 </head>

 <body>
     <div class="wrapper">
         <div class="sidebar" data-image="{{asset('assets/img/sidebar-5.jpg') }}">
             <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
             <div class="sidebar-wrapper">
                 @include('dashboard.sidebar')
             </div>
             <div class="main-panel">
                 <!-- Navbar -->
                 <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                     @include('dashboard.header')
                 </nav>
                 <!-- End Navbar -->
                 <div class="content" style="background-color: #e6e8eb">
                     @yield('int')
                 </div>
                 <footer class="footer">
                     <div class="container-fluid">
                         <nav>
                             <p class="copyright text-center">
                                 ©
                                 <script>
                                     document.write(new Date().getFullYear())
                                 </script>
                                 <a href="">Tim Universitas Sugeng Hartono</a>, made with love &hearts;
                             </p>
                         </nav>
                     </div>
                 </footer>
             </div>
         </div>

 </body>
 <!--   Core JS Files   -->
 <script src="{{asset('assets/js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
 <script src="{{asset('assets/js/core/popper.min.js') }}" type="text/javascript"></script>
 <script src="{{asset('assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
 <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
 <script src="{{asset('assets/js/plugins/bootstrap-switch.js') }}"></script>
 <!--  Google Maps Plugin    -->
 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
 <!--  Chartist Plugin  -->
 <script src="{{asset('assets/js/plugins/chartist.min.js') }}"></script>
 <!--  Notifications Plugin    -->
 <script src="{{asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
 <!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
 <script src="{{asset('assets/js/light-bootstrap-dashboard.js?v=2.0.0') }} " type="text/javascript"></script>
 <!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
 <script src="{{asset('assets/js/demo.js') }}"></script>
 <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
 <script type="text/javascript">
     $(document).ready(function() {
         // Javascript method's body can be found in assets/js/demos.js
         demo.initDashboardPageCharts();

         demo.showNotification();

     });
 </script>

 </html>