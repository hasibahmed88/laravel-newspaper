<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="description" content="Magz is a HTML5 & CSS3 magazine template is based on Bootstrap 3.">
		<meta name="author" content="Kodinger">
		<meta name="keyword" content="magz, html5, css3, template, magazine template">
		<!-- Shareable -->
		<meta property="og:title" content="HTML5 & CSS3 magazine template is based on Bootstrap 3" />
		<meta property="og:type" content="article" />
		<meta property="og:url" content="http://github.com/nauvalazhar/Magz" />
		<meta property="og:image" content="https://raw.githubusercontent.com/nauvalazhar/Magz/master/images/preview.png" />
		<title>@yield('title')</title>
		<script src="{{ asset('/') }}front/js/date.js"></script>
		<!-- Bootstrap -->
		<link rel="stylesheet" href="{{ asset('/') }}front/scripts/bootstrap/bootstrap.min.css">
		<!-- IonIcons -->
		<link rel="stylesheet" href="{{ asset('/') }}front/scripts/ionicons/css/ionicons.min.css">
		<!-- Toast -->
		<link rel="stylesheet" href="{{ asset('/') }}front/scripts/toast/jquery.toast.min.css">
		<!-- OwlCarousel -->
		<link rel="stylesheet" href="{{ asset('/') }}front/scripts/owlcarousel/dist/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="{{ asset('/') }}front/scripts/owlcarousel/dist/assets/owl.theme.default.min.css">
		<!-- Magnific Popup -->
		<link rel="stylesheet" href="{{ asset('/') }}front/scripts/magnific-popup/dist/magnific-popup.css">
		<link rel="stylesheet" href="{{ asset('/') }}front/scripts/sweetalert/dist/sweetalert.css">
		<!-- Custom style -->
		<link rel="stylesheet" href="{{ asset('/') }}front/css/style.css">
		<link rel="stylesheet" href="{{ asset('/') }}front/css/skins/all.css">
		<link rel="stylesheet" href="{{ asset('/') }}front/css/demo.css">
		
	</head>

	<body class="skin-orange">
		<header class="primary">
			<div class="firstbar">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-12">
							<div class="brand">
								<a href="{{ route('/') }}">
									<img src="{{ asset('/') }}admin/logo-image/{{ $website_info->web_header_logo }}" alt="{{ $website_info->web_title }}">
								</a>
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<form class="search" action="{{ route('search-news') }}" method="POST" autocomplete="off">
							@csrf
								<div class="form-group">
									<div class="input-group">
										<input type="text" name="search_key" class="form-control" placeholder="সংবাদ খুজুন . . .">									
										<div class="input-group-btn">
											<button type="submit" class="btn btn-primary"><i class="ion-search"></i></button>
										</div>
									</div>
								</div>
								<div class="help-block">
									<p id="date"></p>
									<script>
										let date = new Date();
										let today = date.getDate()
										let day = date.getDay()
										let month = date.getMonth()
										let year = date.getFullYear()

										document.getElementById('date').innerHTML =  ` ${ banglaDate(today) } ${banglaMonth(month)} ${ banglaYear(year) }`;
										
									</script>
								</div>
							</form>								
						</div>
						<div class="col-md-3 col-sm-12 text-right">
						
							<ul class="nav-icons">
							@if(!Session::get('visitor_name'))
							<li><a href="{{ route('visitor-register') }}"><i class="ion-person-add"></i><div>Register</div></a></li>
							<li><a href="{{ route('visitor-login') }}"><i class="ion-person"></i><div>Login</div></a></li>
							@endif
							
							</ul>
							
						</div>
					</div>
				</div>
			</div>

			<!-- Start nav -->
			<nav class="menu">
				<div class="container">
					<div class="brand">
						<a href="{{ route('/') }}">
							<img src="{{ asset('/') }}admin/logo-image/{{ $website_info->web_header_logo }}" alt="{!! $website_info->web_title !!}">
						</a>
					</div>
					<div class="mobile-toggle">
						<a href="#" data-toggle="menu" data-target="#menu-list"><i class="ion-navicon-round"></i></a>
					</div>
					<div class="mobile-toggle">
						<a href="#" data-toggle="sidebar" data-target="#sidebar"><i class="ion-ios-arrow-left"></i></a>
					</div>
					<div id="menu-list">
						<ul class="nav-list">
							<li><a href="{{ route('latest-news') }}">সর্বশেষ</a></li>
							@foreach($categories as $item)
							<li><a href="{{ route('category-news',['name'=>$item->category_name_en] )}}">{{ $item->category_name_bn }}</a></li>
							@endforeach
							<li><a href="{{ route('about') }}">About Us</a></li>
							<li><a href="{{ route('contact') }}">Contact</a></li>
							@if(Session::get('visitor_name'))
								<li class="dropdown magz-dropdown"><a href="#">&nbsp;&nbsp; {{ Session::get('visitor_name') }} <i class="ion-ios-arrow-right"></i></a>
									<ul class="dropdown-menu">
										<li><a href="#"><i class="icon ion-person"></i> My Account</a></li>
										<li><a href="#"><i class="icon ion-heart"></i> Favorite</a></li>
										<li><a href="#"><i class="icon ion-chatbox"></i> Comments</a></li>
										<li><a href="#"><i class="icon ion-key"></i> Change Password</a></li>
										<li><a href="#"><i class="icon ion-settings"></i> Settings</a></li>
										<li class="divider"></li>
										<li><a href="{{ route('visitor-log-out',['ip'=>$ip]) }}"><i class="icon ion-log-out"></i> Logout</a></li>
									</ul>
								</li>
							@endif
						</ul>
					</div>
				</div>
			</nav>

			<!-- End nav -->
		</header>
		
		@yield('body')
	

		<!-- Start footer -->
		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="block">
							<h1 class="block-title">Company Info</h1>
							<div class="block-body">
								<figure class="foot-logo">
									<img src="{{ asset('/') }}admin/logo-image/{{ $website_info->web_footer_logo }}" class="img-responsive" alt="Logo">
								</figure>
								<p class="brand-description">
									{!! $website_info->web_description !!}
								</p>
								<a href="{{ route('about') }}" class="btn btn-magz white">About Us <i class="ion-ios-arrow-thin-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="block">
							<h1 class="block-title">Categories <div class="right"></div></h1>
							<div class="block-body">
								<ul style="font-size:15px">
									@foreach($categories as $item)
									<li><a href="{{ route('category-news',['name'=>$item->category_name_en]) }}">{{ $item->category_name_bn }}</a></li>
									@endforeach
								</ul>
							</div>
						</div>
						
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="block">
							<h1 class="block-title">Newsletter</h1>
							<div class="block-body">
								<p>By subscribing you will receive new articles in your email.</p>
								@if ($errors->any())
									<div class="alert alert-danger">
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif
								@if(Session::get('message'))
								<div class="alert alert-success alert-dismissible show" role="alert">
									{{ Session::get('message') }}
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
								</div>
								@endif 
								<form class="newsletter" action="{{ route('subscribe') }}" method="POST">
								@csrf 
									<div class="input-group">
										<div class="input-group-addon">
											<i class="ion-ios-email-outline"></i>
										</div>
										<input type="email" name="email" class="form-control" placeholder="Your mail">
									</div>
									<button type="submit" class="btn btn-primary btn-block white">Subscribe</button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-xs-12 col-sm-6">
						<div class="block">
							<h1 class="block-title">Follow Us</h1>
							<div class="block-body">
								<p>Follow us and stay in touch to get the latest news</p>
								<ul class="social trp">
									<li>
										<a href="#" class="facebook">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-facebook"></i>
										</a>
									</li>
									<li>
										<a href="#" class="twitter">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-twitter-outline"></i>
										</a>
									</li>
									<li>
										<a href="#" class="youtube">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-youtube-outline"></i>
										</a>
									</li>
									<li>
										<a href="#" class="googleplus">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-googleplus"></i>
										</a>
									</li>
									<li>
										<a href="#" class="instagram">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-instagram-outline"></i>
										</a>
									</li>
									<li>
										<a href="#" class="tumblr">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-tumblr"></i>
										</a>
									</li>
									<li>
										<a href="#" class="dribbble">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-dribbble"></i>
										</a>
									</li>
									<li>
										<a href="#" class="linkedin">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-linkedin"></i>
										</a>
									</li>
									<li>
										<a href="#" class="skype">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-skype"></i>
										</a>
									</li>
									<li>
										<a href="#" class="rss">
											<svg><rect width="0" height="0"/></svg>
											<i class="ion-social-rss"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="line"></div>
						<div class="block">
							<div class="block-body no-margin">
								<ul class="footer-nav-horizontal">
									<li><a href="{{ route('/') }}">Home</a></li>
									<li><a href="{{ route('contact') }}">Contact</a></li>
									<li><a href="{{ route('about') }}">About</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="copyright">
							{{ $website_info->web_footer_text }}
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- End Footer -->

		<!-- JS -->
		<script src="{{ asset('/') }}front/js/jquery.js"></script>
		<script src="{{ asset('/') }}front/js/jquery.migrate.js"></script>
		<script src="{{ asset('/') }}front/scripts/bootstrap/bootstrap.min.js"></script>
		<script>var $target_end=$(".best-of-the-week");</script>
		<script src="{{ asset('/') }}front/scripts/jquery-number/jquery.number.min.js"></script>
		<script src="{{ asset('/') }}front/scripts/owlcarousel/dist/owl.carousel.min.js"></script>
		<script src="{{ asset('/') }}front/scripts/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
		<script src="{{ asset('/') }}front/scripts/easescroll/jquery.easeScroll.js"></script>
		<script src="{{ asset('/') }}front/scripts/sweetalert/dist/sweetalert.min.js"></script>
		<script src="{{ asset('/') }}front/scripts/toast/jquery.toast.min.js"></script>
		<script src="{{ asset('/') }}front/js/demo.js"></script>
		
		<script src="{{ asset('/') }}front/js/e-magz.js"></script>
		

	</body>
</html>