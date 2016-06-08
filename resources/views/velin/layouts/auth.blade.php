<!DOCTYPE html>
<html>
  <head>
    <title>Admin Login</title>
    <!-- Bootstrap -->
    <link href="{{ asset(null) }}/velin/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="{{ asset(null) }}/velin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="{{ asset(null) }}/velin/assets/styles.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login">
    @yield('content')
    <script src="{{ asset(null) }}/velin/vendors/jquery-1.9.1.min.js"></script>
    <script src="{{ asset(null) }}/velin/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src = "https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
    @yield('script')
  </body>
</html>