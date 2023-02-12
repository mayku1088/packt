<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>Packt | {{$title}}</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
        <link href="{{asset('admin/plugins/pace-master/themes/blue/pace-theme-flash.css')}}" rel="stylesheet"/>
        <link href="{{asset('admin/plugins/uniform/css/uniform.default.min.css')}}" rel="stylesheet"/>
        <link href="{{asset('admin/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('admin/plugins/fontawesome/css/font-awesome.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('admin/plugins/line-icons/simple-line-icons.css')}}" rel="stylesheet" type="text/css"/>	
        <link href="{{asset('admin/plugins/waves/waves.min.css')}}" rel="stylesheet" type="text/css"/>	
        <link href="{{asset('admin/plugins/switchery/switchery.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('admin/plugins/3d-bold-navigation/css/style.css')}}" rel="stylesheet" type="text/css"/>	
        <link href="{{asset('admin/plugins/slidepushmenus/css/component.css')}}" rel="stylesheet" type="text/css"/>
        
        <link href="{{asset('admin/plugins/x-editable/bootstrap3-editable/css/bootstrap-editable.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('admin/plugins/bootstrap-datepicker/css/datepicker3.css')}}" rel="stylesheet" type="text/css"/>
        
        <link href="{{asset('/admin/plugins/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css"/> 
        
        
        
        <!-- <script src="assets/plugins/3d-bold-navigation/js/modernizr.js"></script> -->

        <link href="{{asset('/admin/css/style.css')}}" rel="stylesheet" type="text/css"/>
        
        
        @yield('styles')
        
    </head>
    <body class="page-header-fixed compact-menu page-horizontal-bar">
        <div class="overlay"></div>
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s1">
            <h3><span class="pull-left">Chat</span><a href="javascript:void(0);" class="pull-right" id="closeRight"><i class="fa fa-times"></i></a></h3>
           
		</nav>
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
            <h3><span class="pull-left">Sandra Smith</span> <a href="javascript:void(0);" class="pull-right" id="closeRight2"><i class="fa fa-angle-right"></i></a></h3>
            
            <div class="chat-write">
                <form class="form-horizontal" action="javascript:void(0);">
                    <input type="text" class="form-control" placeholder="Say something">
                </form>
            </div>
		</nav>
        <form class="search-form" action="#" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control search-input" placeholder="Search...">
                <span class="input-group-btn">
                    <button class="btn btn-default close-search waves-effect waves-button waves-classic" type="button"><i class="fa fa-times"></i></button>
                </span>
            </div><!-- Input Group -->
        </form><!-- Search Form -->
        <main class="page-content content-wrap">
           
            <div class="page-sidebar sidebar horizontal-bar">
                <div class="page-sidebar-inner">
                    <ul class="menu accordion-menu">
                        <li class="nav-heading"><span>Navigation</span></li>
                        <li class="{{$slug == 'books' ? 'active' : ''}}"><a href="{{url('books')}}"><p>Books</p></a></li>
                        <li class="{{$slug == 'add-book' ? 'active' : ''}}"><a href="{{url('add-book')}}"><p>Add book</p></a></li>
                        <li><a href="profile.html"><p>Logout</p></a></li>
                    </ul>
                </div><!-- Page Sidebar Inner -->
            </div><!-- Page Sidebar -->