<!DOCTYPE html>
<html>
    
    <head>
        <title>Velin</title>
        <!-- Bootstrap -->
        <link href="{{ asset(null) }}/velin/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="{{ asset(null) }}/velin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="{{ asset(null) }}/velin/assets/styles.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset(null) }}velin/css/velin.css">
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="{{ asset(null) }}/velin/vendors/flot/excanvas.min.js"></script><![endif]-->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="{{ asset(null) }}/velin/http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="{{ asset(null) }}/velin/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="{{ Velin::urlBackend('default/index') }}">{{ Velin::config('titleBar') }}</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="{{ asset(null) }}/velin/#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> {{ user()->name }} <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="{{ urlBackend('user/profile') }}">Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="{{ url('login-page/logout') }}">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                        @include('velin.layouts.menu')
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>