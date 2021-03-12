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
									<img src="{{ asset('/') }}front/images/logo.png" alt="Magz Logo">
								</a>
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<form class="search" autocomplete="off">
								<div class="form-group">
									<div class="input-group">
										<input type="text" name="q" class="form-control" placeholder="Type something here">									
										<div class="input-group-btn">
											<button class="btn btn-primary"><i class="ion-search"></i></button>
										</div>
									</div>
								</div>
								<div class="help-block">
									<p id="date"></p>
									<script>
										let date = new Date();
										let today = date.getDate()
										let month = date.getMonth()
										let year = date.getFullYear()
										let hour = date.getHours();
										let minutes = date.getMinutes();
										let localTime = date.toLocaleTimeString()
										let localDate = date.toLocaleDateString()

										// document.getElementById('date').innerHTML = `Date: ${today} - ${month} - ${year} | Time: ${hour}:${minutes}`
										document.getElementById('date').innerHTML = `Date:&nbsp;&nbsp;${localDate} &nbsp;&nbsp; | &nbsp;&nbsp; Time:&nbsp; ${localTime} `
									</script>
								</div>
							</form>								
						</div>
						<div class="col-md-3 col-sm-12 text-right">
						@php 
						$ip = $_SERVER['REMOTE_ADDR'];
						$visitor = DB::table('visitors')->where('ip',$ip)->first();					
						
						@endphp
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
						<a href="#">
							<img src="{{ asset('/') }}front/images/logo.png" alt="Magz Logo">
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
							<li><a href="{{ route('category-news',['name'=>$item->category_name]) }}">{{ $item->category_name }}</a></li>
							@endforeach
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
									<img src="{{ asset('/') }}front/images/logo-light.png" class="img-responsive" alt="Logo">
								</figure>
								<p class="brand-description">
									Magz is a HTML5 &amp; CSS3 magazine template based on Bootstrap 3.
								</p>
								<a href="page.html" class="btn btn-magz white">About Us <i class="ion-ios-arrow-thin-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="block">
							<h1 class="block-title">Popular Tags <div class="right"><a href="#">See All <i class="ion-ios-arrow-thin-right"></i></a></div></h1>
							<div class="block-body">
								<ul class="tags">
									<li><a href="#">HTML5</a></li>
									<li><a href="#">CSS3</a></li>
									<li><a href="#">Bootstrap 3</a></li>
									<li><a href="#">Web Design</a></li>
									<li><a href="#">Creative Mind</a></li>
									<li><a href="#">Standing On The Train</a></li>
									<li><a href="#">at 6.00PM</a></li>
								</ul>
							</div>
						</div>
						<div class="line"></div>
						<div class="block">
							<h1 class="block-title">Newsletter</h1>
							<div class="block-body">
								<p>By subscribing you will receive new articles in your email.</p>
								<form class="newsletter">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="ion-ios-email-outline"></i>
										</div>
										<input type="email" class="form-control email" placeholder="Your mail">
									</div>
									<button class="btn btn-primary btn-block white">Subscribe</button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="block">
							<h1 class="block-title">Latest News</h1>
							<div class="block-body">
								<article class="article-mini">
									<div class="inner">
										<figure>
											<a href="single.html">
												<img src="{{ asset('/') }}front/images/news/img12.jpg" alt="Sample Article">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="single.html">Donec consequat lorem quis augue pharetra</a></h1>
										</div>
									</div>
								</article>
								<article class="article-mini">
									<div class="inner">
										<figure>
											<a href="single.html">
												<img src="{{ asset('/') }}front/images/news/img14.jpg" alt="Sample Article">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="single.html">eu dapibus risus aliquam etiam ut venenatis</a></h1>
										</div>
									</div>
								</article>
								<article class="article-mini">
									<div class="inner">
										<figure>
											<a href="single.html">
												<img src="{{ asset('/') }}front/images/news/img15.jpg" alt="Sample Article">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="single.html">Nulla facilisis odio quis gravida vestibulum </a></h1>
										</div>
									</div>
								</article>
								<article class="article-mini">
									<div class="inner">
										<figure>
											<a href="single.html">
												<img src="{{ asset('/') }}front/images/news/img16.jpg" alt="Sample Article">
											</a>
										</figure>
										<div class="padding">
											<h1><a href="single.html">Proin venenatis pellentesque arcu vitae </a></h1>
										</div>
									</div>
								</article>
								<a href="#" class="btn btn-magz white btn-block">See All <i class="ion-ios-arrow-thin-right"></i></a>
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
									<li><a href="index.html">Home</a></li>
									<li><a href="#">Partner</a></li>
									<li><a href="contact.html">Contact</a></li>
									<li><a href="page.html">About</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="copyright">
							COPYRIGHT &copy; MAGZ 2017. ALL RIGHT RESERVED.
							<div>
								Made with <i class="ion-heart"></i> by <a href="http://kodinger.com">Kodinger</a>
							</div>
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