<!DOCTYPE html>
<html>
    
    <head>
        <title>Forms</title>
        <!-- Bootstrap -->
        <link href="{{ asset(null) }}/velin/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="{{ asset(null) }}/velin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="{{ asset(null) }}/velin/assets/styles.css" rel="stylesheet" media="screen">
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
                    <a class="brand" href="{{ asset(null) }}/velin/#">{{ Velin::config('titleBar') }}</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="{{ asset(null) }}/velin/#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> Vincent Gabriel <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="{{ asset(null) }}/velin/#">Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="{{ asset(null) }}/velin/login.html">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li class="active">
                                <a href="{{ asset(null) }}/velin/#">Dashboard</a>
                            </li>
                            <li class="dropdown">
                                <a href="{{ asset(null) }}/velin/#" data-toggle="dropdown" class="dropdown-toggle">Settings <b class="caret"></b>

                                </a>
                                <ul class="dropdown-menu" id="menu1">
                                    <li>
                                        <a href="{{ asset(null) }}/velin/#">Tools <i class="icon-arrow-right"></i>

                                        </a>
                                        <ul class="dropdown-menu sub-menu">
                                            <li>
                                                <a href="{{ asset(null) }}/velin/#">Reports</a>
                                            </li>
                                            <li>
                                                <a href="{{ asset(null) }}/velin/#">Logs</a>
                                            </li>
                                            <li>
                                                <a href="{{ asset(null) }}/velin/#">Errors</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="{{ asset(null) }}/velin/#">SEO Settings</a>
                                    </li>
                                    <li>
                                        <a href="{{ asset(null) }}/velin/#">Other Link</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{ asset(null) }}/velin/#">Other Link</a>
                                    </li>
                                    <li>
                                        <a href="{{ asset(null) }}/velin/#">Other Link</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="{{ asset(null) }}/velin/#" role="button" class="dropdown-toggle" data-toggle="dropdown">Content <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="{{ asset(null) }}/velin/#">Blog</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="{{ asset(null) }}/velin/#">News</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="{{ asset(null) }}/velin/#">Custom Pages</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="{{ asset(null) }}/velin/#">Calendar</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="{{ asset(null) }}/velin/#">FAQ</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="{{ asset(null) }}/velin/#" role="button" class="dropdown-toggle" data-toggle="dropdown">Users <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="{{ asset(null) }}/velin/#">User List</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="{{ asset(null) }}/velin/#">Search</a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="{{ asset(null) }}/velin/#">Permissions</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>