<!DOCTYPE html>
<html lang="zxx">


<head>
		<!-- Basic Page Needs -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Organic Ecommerce</title>

		<meta name="keywords" content="Organic, Fresh Food, Farm Store">
		<meta name="description" content="FreshMart - Organic, Fresh Food, Farm Store HTML Template">
		<meta name="author" content="tivatheme">

		<!-- Favicon -->
		<link rel="shortcut icon" href="img/favicon.png" type="image/png">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Playfair+Display:300,400,700" rel="stylesheet">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('frontend') }}/libs/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="{{ asset('frontend') }}/libs/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{ asset('frontend') }}/libs/font-material/css/material-design-iconic-font.min.css">


		<!-- Template CSS -->
		<link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css">
		<link rel="stylesheet" href="{{ asset('frontend') }}/css/reponsive.css">
	</head>

	<body class="home home-1">
		<div id="all">
			<!-- Header -->
            {{-- <header id="header">
				<!-- Topbar -->
				<div class="topbar">
					<!-- Close Topbar -->
					<div class="close-topbar">
						<i class="zmdi zmdi-close"></i>
					</div>

					<!-- Topbar Content -->
					<div class="container topbar-content">
						<div class="row">
							<!-- Topbar Left -->
							<div class="col-md-7 col-sm-7 col-xs-12">
								<div class="topbar-left d-flex">
									<div class="email">
										<i class="fa fa-envelope" aria-hidden="true"></i>Email: tivatheme@gmail.com
									</div>
									<div class="skype">
										<i class="fa fa-skype" aria-hidden="true"></i>Skype: tivatheme
									</div>
								</div>
							</div>

							<!-- Topbar Right -->
							<div class="col-md-5 col-sm-5 col-xs-12">
								<div class="topbar-right d-flex justify-content-end">
									<!-- My Account -->
									<div class="dropdown account">
										<div class="dropdown-toggle" data-toggle="dropdown">
											My Account
										</div>
										<div class="dropdown-menu">
											<div class="item">
												<a href="#" title="Log in to your customer account"><i class="fa fa-cog"></i>My Account</a>
											</div>
											<div class="item">
												<a href="user-login.html" title="Log in to your customer account"><i class="fa fa-sign-in"></i>Login</a>
											</div>
											<div class="item">
												<a href="user-register.html" title="Register Account"><i class="fa fa-user"></i>Register</a>
											</div>
											<div class="item">
												<a href="#" title="My Wishlists"><i class="fa fa-heart"></i>My Wishlists</a>
											</div>
										</div>
									</div>

									<!-- Language -->
									<div class="dropdown language">
										<div class="dropdown-toggle" data-toggle="dropdown">
											<img src="img/language-en.jpg" alt="Language English">
										</div>
										<div class="dropdown-menu">
											<div class="item">
												<a href="#" title="Language English"><img src="img/language-en.jpg" alt="Language English"> English</a>
											</div>
											<div class="item">
												<a href="#" title="Language French"><img src="img/language-fr.jpg" alt="Language French"> French</a>
											</div>
										</div>
									</div>

									<!-- Currency -->
									<div class="dropdown currency">
										<div class="dropdown-toggle" data-toggle="dropdown">
											USD
										</div>
										<div class="dropdown-menu">
											<div class="item">
												<a href="#" title="USD">USD</a>
											</div>
											<div class="item">
												<a href="#" title="EUR">EUR</a>
											</div>
											<div class="item">
												<a href="#" title="GBP">GBP</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Open Topbar -->
					<div class="container active">
						<div id="toggle-topbar"><i class="zmdi zmdi-plus"></i></div>
					</div>
				</div>

				<!-- Header Top -->
				<div class="header-top">
					<div class="container">
						<div class="row">

							<!-- Logo -->
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="logo">
									<a href="index.html">
										<img class="img-responsive" src="{{ asset('frontend') }}/img/logo.png" alt="Logo">
									</a>
								</div>

								<span id="toggle-mobile-menu"><i class="zmdi zmdi-menu"></i></span>
							</div>
						</div>
					</div>
				</div>

				<!-- Main Menu -->
				<div id="main-menu">
					<ul class="menu">
						<li class="dropdown">
							<a href="index.html" title="Homepage">Home</a>

						</li>

						<li>
							<a href="page-about-us.html">About Us</a>
						</li>

						<li>
							<a href="page-contact.html">Contact</a>
						</li>
					</ul>
				</div>
			</header> --}}

            <div class="container" style="margin-top: 5%;">
                <div class="register-page">
                    <div class="register-form form">
                        <div class="block-title">
                            <h2 class="title"><span>Create Account</span></h2>
                        </div>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input pattern="[a-zA-Z]+" oninvalid="setCustomValidity('Please enter on alphabets only maximum 15 characters. ')" maxlength="15" id="name" type="text" value="" name="name" required>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" oninvalid="setCustomValidity('Please enter on salman@gmail.com format ')" maxlength="15" type="email" value="" name="email">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}" oninvalid="setCustomValidity('Must contain at least one  number and one uppercase and lowercase letter, and at least 8 maximum 15 characters ')" type="password" value="" name="password">
                            </div>

                            <div class="form-group">
                                <label>Password Confirmation</label>
                                <input id="password_confirmation" type="password" value="" name="password_confirmation">
                            </div>

                            <div class="form-group text-center">
                                <input type="submit" class="btn btn-primary" value="Create Account">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <footer id="footer">
				<div class="footer">
					<!-- Footer Top -->
					<div class="footer-top">
						<div class="container">
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="block text">
										<div class="block-content">
											{{-- <a href="index.html" class="logo-footer">
												<img src="{{ asset('frontend') }}/img/logo-2.png" alt="Logo">
											</a> --}}

											<div class="contact">
												<div class="item d-flex">
													<div class="item-left">
														<i class="zmdi zmdi-home"></i>
													</div>
													<div class="item-right">
														<span>123 Suspendis matti, VST District, NY Accums, North American</span>
													</div>
												</div>
												<div class="item d-flex">
													<div class="item-left">
														<i class="zmdi zmdi-phone-in-talk"></i>
													</div>
													<div class="item-right">
														<span>0123-456-78910<br>0987-654-32100</span>
													</div>
												</div>
												<div class="item d-flex">
													<div class="item-left">
														<i class="zmdi zmdi-email"></i>
													</div>
													<div class="item-right">
														<span><a href="mailto:support@domain.com">support@domain.com</a><br><a href="mailto:contact@domain.com">contact@domain.com</a></span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="block instagram">
										<h2 class="block-title">Photo Instagram</h2>

										<div class="block-content">
											<div class="row margin-0">
												<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 padding-0">
													<a href="#">
														<img src="{{ asset('frontend') }}/img/instagram-1.png" alt="Instagram Image">
													</a>
												</div>
												<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 padding-0">
													<a href="#">
														<img src="{{ asset('frontend') }}/img/instagram-2.png" alt="Instagram Image">
													</a>
												</div>
												<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 padding-0">
													<a href="#">
														<img src="{{ asset('frontend') }}/img/instagram-3.png" alt="Instagram Image">
													</a>
												</div>
												<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 padding-0">
													<a href="#">
														<img src="{{ asset('frontend') }}/img/instagram-4.png" alt="Instagram Image">
													</a>
												</div>
												<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 padding-0">
													<a href="#">
														<img src="{{ asset('frontend') }}/img/instagram-5.png" alt="Instagram Image">
													</a>
												</div>
												<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 padding-0">
													<a href="#">
														<img src="{{ asset('frontend') }}/img/instagram-6.png" alt="Instagram Image">
													</a>
												</div>
												<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 padding-0">
													<a href="#">
														<img src="{{ asset('frontend') }}/img/instagram-7.png" alt="Instagram Image">
													</a>
												</div>
												<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 padding-0">
													<a href="#">
														<img src="{{ asset('frontend') }}/img/instagram-8.png" alt="Instagram Image">
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>

								{{-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="block newsletter">
										<h2 class="block-title">Newsletter</h2>

										<div class="block-content">
											<p class="description">Sign up for newsletter to receive special offers and exclusive news about FreshMart products</p>
											<form action="#" method="post">
												<input type="text" placeholder="Enter Your Email">
												<button type="submit" class="btn btn-primary">Subscribe</button>
											</form>
										</div>
									</div>

									<div class="block social">
										<h2 class="block-title">Follow Us</h2>

										<div class="block-content">
											<ul>
												<li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
												<li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
												<li><a href="#"><i class="zmdi zmdi-dribbble"></i></a></li>
												<li><a href="#"><i class="zmdi zmdi-instagram"></i></a></li>
											</ul>
										</div>
									</div>
								</div> --}}
							</div>
						</div>
					</div>

					<!-- Footer Bottom -->
					<div class="footer-bottom">
						<div class="payment-intro">
							<div class="container">
								<div class="row">
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										<div class="item d-flex">
											<div class="item-left">
												<img src="{{ asset('frontend') }}/img/home1-payment-1.png" alt="Payment Intro">
											</div>
											<div class="item-right">
												<h3 class="title">Free Shipping item</h3>
												<div class="content">Proin gravida nibh vel velit auctor aliquet. Aenean lorem quis bibendum auctor</div>
											</div>
										</div>
									</div>

									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										<div class="item d-flex">
											<div class="item-left">
												<img src="{{ asset('frontend') }}/img/home1-payment-2.png" alt="Payment Intro">
											</div>
											<div class="item-right">
												<h3 class="title">Secured Payment</h3>
												<div class="content">Proin gravida nibh vel velit auctor aliquet. Aenean lorem quis bibendum auctor</div>
											</div>
										</div>
									</div>

									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
										<div class="item d-flex">
											<div class="item-left">
												<img src="{{ asset('frontend') }}/img/home1-payment-3.png" alt="Payment Intro">
											</div>
											<div class="item-right">
												<h3 class="title">Money Back Guarantee</h3>
												<div class="content">Proin gravida nibh vel velit auctor aliquet. Aenean lorem quis bibendum auctor</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				{{-- <!-- Copyright -->
				<div class="footer-copyright">
					<div class="container">
						<div class="row">
							<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
								<div class="copyright"><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></div>
							</div>

							<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 align-right">
								<div class="payment">
									<span>Payment Accept</span>
									<img src="{{ asset('frontend') }}/img/payment.png" alt="Payment">
								</div>
							</div>
						</div>
					</div>
				</div> --}}
			</footer>

			<!-- Go Up button -->
			<div class="go-up">
				<a href="#">
					<i class="fa fa-long-arrow-up"></i>
				</a>
			</div>

		</div>

		<!-- Vendor JS -->
		<script src="{{ asset('frontend') }}/libs/jquery/jquery.js"></script>
		<script src="{{ asset('frontend') }}/libs/bootstrap/js/bootstrap.js"></script>
		<script src="{{ asset('frontend') }}/libs/jquery.countdown/jquery.countdown.js"></script>
		<script src="{{ asset('frontend') }}/libs/nivo-slider/js/jquery.nivo.slider.js"></script>
		<script src="{{ asset('frontend') }}/libs/slider-range/js/tmpl.js"></script>
		<script src="{{ asset('frontend') }}/libs/slider-range/js/jquery.dependClass-0.1.js"></script>
		<script src="{{ asset('frontend') }}/libs/slider-range/js/draggable-0.1.js"></script>

		<!-- Template CSS -->
		<script src="js/main.js"></script>
	</body>


</html>



