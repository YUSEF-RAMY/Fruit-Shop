<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#06c1db">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- title -->
	<title>Fruitkha</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
	<!-- google font -->
	<link href="{{asset('https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet')}}">
	<link href="{{asset('https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet')}}">
	
	<!-- fontawesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="{{asset('https://light-colts-rule.loca.lt/assets/css/all.min.css')}}">
	<!-- bootstrap -->
	<link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
	<!-- owl carousel -->
	<link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
	<!-- magnific popup -->
	<link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
	<!-- animate css -->
	<link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
	<!-- mean menu css -->
	<link rel="stylesheet" href="{{asset('assets/css/meanmenu.min.css')}}">
	<!-- main style -->
	<link rel="stylesheet" href="{{asset('assets\css\main.css')}}">
	<!-- responsive -->
	<link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
	<!-- vita config -->
	@vite(['resources/js/css/main.css' , 'resources/js/main.js',])


</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

	<!-- header -->
	<div class="top-header-area"  id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="/">
								<img loading="lazy" src="{{asset('assets/img/logo.png')}}" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu" dir="rtl">
							<ul>
								<li ><a href="/">الرئيسيه</a></li>
								
								{{-- <li><a href="/category">الاقسام</a></li> --}}
								<li><a href="/products">المنتجات</a></li>
								<li><a href="/addproduct">اضافه منتج</a></li>
								<li><a href="/reviews"> راي العملاء</a></li>
								<li><a href="/datatable"> داش بورد</a></li>
								{{-- <li><a href="/">الصفحات</a>
									<ul class="sub-menu">
										<li><a href="404.html">404 page</a></li>
										<li><a href="about.html">About</a></li>
										<li><a href="cart.html">Cart</a></li>
										<li><a href="checkout.html">Check Out</a></li>
										<li><a href="contact.html">Contact</a></li>
										<li><a href="news.html">News</a></li>
										<li><a href="shop.html">Shop</a></li>
									</ul> --}}
								{{-- </li> --}}
								{{-- <li><a href="/">الاخبار</a>
									<ul class="sub-menu">
										<li><a href="news.html">News</a></li>
										<li><a href="single-news.html">Single News</a></li>
									</ul>
								</li> --}}
								{{-- <li><a href="contact.html">من نحن</a></li> --}}
								{{-- <li><a href="/">المتجر</a>
									<ul class="sub-menu">
										<li><a href="shop.html">Shop</a></li>
										<li><a href="checkout.html">Check Out</a></li>
										<li><a href="single-product.html">Single Product</a></li>
										<li><a href="cart.html">Cart</a></li>
									</ul>
								</li> --}}


								@guest
								@if (Route::has('login'))
									<li>
										<a href="{{ route('login') }}">تسجيل الدخول</a>
									</li>
								@endif
	
								@if (Route::has('register'))
									<li>
										<a href="{{ route('register') }}">مستخدم جديد</a>
									</li>
								@endif
							@else
								<li>
									<a href="#">
										{{ Auth::user()->name }}
									</a>
								</li>
								<li>
									<a href="{{ route('logout') }}"
											onclick="event.preventDefault();
														document.getElementById('logout-form').submit();">
											تسجيل خروج 
									</a>
								
										<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
											@csrf
										</form>
								</li>
							@endguest





								<li>
									<div class="header-icons">
										<a class="shopping-cart" href="cart.html"><i class="fas fa-shopping-cart"></i></a>
										<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
									</div>
								</li>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->
	
	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3 style="letter-spacing: 0cm">ابحث في جميع منتجاتنا</h3>
							<form action="/search" method="POST">
								@csrf
								<input type="text" name="keyword" placeholder="ابحث">
								<button type="submit">بحث <i class="fas fa-search"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search area -->

		<!-- hero area -->
		<div class="hero-area hero-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 offset-lg-2 text-center">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle" style="letter-spacing: 0px !important; ">تسوق من عندنا</p>
								<h1>احدث واجود المنتجات عند العبد لله</h1>
								<div class="hero-btns">
									<a href="contact.html" class="bordered-btn">تواصل معنا</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end hero area -->
	<!-- ----------------------------------------------------------------- -->
    
    
    
    
    
    @yield('category') 
    @yield('products')
	@yield('addproduct')
	@yield('editproduct')
	@yield('review')
	@yield('content')
    
    
    
    
    
    
    
    
    
    
	<!-- ----------------------------------------------------------------- -->

    <!-- footer -->
	<div class="footer-area" dir="rtl">
		<div class="container">
			<div  class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">من نحن</h2>
						<p>افضل المبرمجين عندنا هتاخد اسرع منتيج علي اعلي مستوي</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">تواصل معني</h2>
						<ul>
							<li>3/20/2025 , مصر</li>
							<li>yuseframy14@gmail.com</li>
							<li>01095132780</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">الصفحات</h2>
						<ul>
							<li><a href="/">الصفحه الرئيسيه</a></li>
							<li><a href="/">من نحن</a></li>
							<li><a href="/">المتجر</a></li>
							<li><a href="/">الاخبار</a></li>
							<li><a href="/">تواصل معني</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box subscribe">
						<h2 class="widget-title">اشترك</h2>
						<p>اكتب ايملك وهنتواصل معك</p>
						<form action="index.html">
							<input type="email" placeholder="البريد الالكتروني">
							<button type="submit"><i class="fas fa-paper-plane"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end footer -->

    <!-- jquery -->
	<script src="{{asset('assets/js/jquery-1.11.3.min.js')}}"></script>
	<!-- bootstrap -->
	<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
	<!-- count down -->
	<script src="{{asset('assets/js/jquery.countdown.js')}}"></script>
	<!-- isotope -->
	<script src="{{asset('assets/js/jquery.isotope-3.0.6.min.js')}}"></script>
	<!-- waypoints -->
	<script src="{{asset('assets/js/waypoints.js')}}"></script>
	<!-- owl carousel -->
	<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
	<!-- magnific popup -->
	<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
	<!-- mean menu -->
	<script src="{{asset('assets/js/jquery.meanmenu.min.js')}}"></script>
	<!-- sticker js -->
	<script src="{{asset('assets/js/sticker.js')}}"></script>
	<!-- main js -->
	<script src="{{asset('assets/js/main.js')}}"></script>

</body>
</html>