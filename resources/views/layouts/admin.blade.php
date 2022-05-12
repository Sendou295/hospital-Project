<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>

<head>
	<title>Visitors an Admin Panel position Bootstrap Responsive Website Template | Fontawesome :: w3layouts</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	{{-- <script
		type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
	</script> --}}
	<!-- bootstrap-css -->
	<link rel="stylesheet" href="{{ asset('backend/css_admin/bootstrap.min.css') }}">
	<!-- //bootstrap-css -->
	<!-- Custom CSS -->
	<link href="{{ asset('backend/css_admin/style.css') }}" rel='stylesheet' type='text/css' />
	<link href="{{ asset('backend/css_admin/style-responsive.css') }}" rel="stylesheet" />
	<!-- font CSS -->
	<link
		href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
		rel='stylesheet' type='text/css'>
	<!-- font-awesome icons -->
    <script src="https://kit.fontawesome.com/adad512387.js" crossorigin="anonymous"></script>
	<!-- //font-awesome icons -->
	<script src="{{ asset('backend/js_admin/jquery-3.6.0.min.js') }}"></script>
</head>

<body style="background: url({{ asset('/backend/images/bg.jpg')}}) no-repeat 0px 0px;	background-size:cover;">
	<section id="container">
		<!--header start-->
		<header class="header fixed-top clearfix">
			<!--logo start-->
			<div class="base">

				<a href="{{ URL::to('/dashboard') }}" class="logo">
					Dashboard
				</a>
				<div class="sidebar-toggle-box">
					<div class="fa fa-bars"></div>
				</div>
			</div>
			<!--logo end-->

			<div class="nav notify-row" id="top_menu">
				<!--  notification start -->
				<ul class="nav top-menu">
					<!-- notification dropdown end -->
				</ul>
				<!--  notification end -->
			</div>
			<div class="top-nav clearfix">
				<!--search & user info start-->
				<ul class="nav pull-right top-menu">
					<li>
						<input type="text" class="form-control search" style="background: url({{ asset('/backend/images/search-icon.png')}})  no-repeat 10px 8px" placeholder=" Search">
					</li>
					<!-- user login dropdown start-->
					<li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#">
							{{-- <img alt="" src="url({{ asset('/backend/images/bg.jpg')}}) "> --}}

							<span class="username">
								<?php
								$name = Session::get('admin_name');
								if($name){
									echo $name;
								}
								?>
							</span>
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu extended logout">
							<li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
							<li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
							<li><a href="{{ URL::to ('/logout-admin') }}"><i class="fa fa-key"></i> Log Out</a></li>
						</ul>
					</li>
					<!-- user login dropdown end -->

				</ul>
				<!--search & user info end-->
			</div>
		</header>
		<!--header end-->
		<!--sidebar start-->
		<aside>
			<div id="sidebar" class="nav-collapse">
				<!-- sidebar menu start-->
				<div class="leftside-navigation">
					<ul class="sidebar-menu" id="nav-accordion">
						<li>
							<a class="active" href="{{ URL::to('/dashboard') }}">
								<i class="fa fa-dashboard"></i>
								<span>Dashboard</span>
							</a>
						</li>

						<li class="sub-menu">
							<a href="javascript:;">
								<i class="fa fa-book"></i>
								<span>positions</span>
							</a>
							<ul class="sub">
								<li><a href="{{URL::to('add-position')}}">Create position</a></li>
								<li><a href="{{URL::to('all-positions')}}">Show positions</a></li>
							</ul>
						</li>
						<li class="sub-menu">
							<a href="javascript:;">
								<i class="fa fa-book"></i>
								<span>bases</span>
							</a>
							<ul class="sub">
								<li><a href="{{URL::to('add-base')}}">Create base</a></li>
								<li><a href="{{URL::to('all-bases')}}">Show bases</a></li>
							</ul>
						</li>
						<li class="sub-menu">
							<a href="javascript:;">
								<i class="fa fa-book"></i>
								<span>departments</span>
							</a>
							<ul class="sub">
								<li><a href="{{URL::to('add-department')}}">Create department</a></li>
								<li><a href="{{URL::to('all-departments')}}">Show departments</a></li>
							</ul>
						</li>
						<li class="sub-menu">
							<a href="javascript:;">
								<i class="fa fa-book"></i>
								<span>services</span>
							</a>
							<ul class="sub">
								<li><a href="{{URL::to('add-service')}}">Create service</a></li>
								<li><a href="{{URL::to('all-services')}}">Show services</a></li>
							</ul>
						</li>
						<li class="sub-menu">
							<a href="javascript:;">
								<i class="fa fa-book"></i>
								<span>special services</span>
							</a>
							<ul class="sub">
								<li><a href="{{URL::to('add-special_service')}}">Create special service</a></li>
								<li><a href="{{URL::to('all-special_services')}}">Show special services</a></li>
							</ul>
						</li>
						
						<li class="sub-menu">
							<a href="javascript:;">
								<i class="fa fa-book"></i>
								<span>equipments</span>
							</a>
							<ul class="sub">
								<li><a href="{{URL::to('add-equipment')}}">Create equipment</a></li>
								<li><a href="{{URL::to('all-equipments')}}">Show equipments</a></li>
							</ul>
						</li>
						<li class="sub-menu">
							<a href="javascript:;">
								<i class="fa fa-book"></i>
								<span>specialists</span>
							</a>
							<ul class="sub">
								<li><a href="{{URL::to('add-specialist')}}">Create specialist</a></li>
								<li><a href="{{URL::to('all-specialists')}}">Show specialists</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<!-- sidebar menu end-->
			</div>
		</aside>
		<!--sidebar end-->
		<!--main content start-->
		<section id="main-content">
			<section class="wrapper">
				
                @yield('admin_content')

			</section>
			<!-- footer -->
			<div class="footer">
				<div class="wthree-copyright">
					<p>© 2022 Visitors. All rights reserved | Edit by <a href="https://www.facebook.com/nhomdepzai">Hieu Nguyen</a>| Design by <a href="http://w3layouts.com">w3layouts.com</a></p>
				</div>
			</div>
			<!-- //footer -->
		</section>

		<!--main content end-->
	</section>
        <!-- Bootstrap JS -->
    <script src="{{ asset('backend/js_admin/bootstrap.js') }}"></script>

	<script src="{{asset ('backend/js_admin/jquery.dcjqaccordion.2.7.js') }}"></script>
	<script src="{{asset ('backend/js_admin/scripts.js') }}"></script>

	<script src="{{asset ('backend/js_admin/jquery.nicescroll.js') }}"></script>
	<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->

</body>

</html>