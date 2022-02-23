<!DOCTYPE html>
<html lang="zxx">

<head>
		<!-- Basic Page Needs -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Organic E-Commerce</title>

		<meta name="keywords" content="Organic, Fresh Food, Farm Store">
		<meta name="description" content="FreshMart - Organic, Fresh Food, Farm Store HTML Template">
		<meta name="author" content="tivatheme">
        <meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Favicon -->
		<link rel="shortcut icon" href="{{ asset('frontend') }}/img/favicon.png" type="image/png">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Playfair+Display:300,400,700" rel="stylesheet">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('frontend') }}/libs/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="{{ asset('frontend') }}/libs/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{ asset('frontend') }}/libs/font-material/css/material-design-iconic-font.min.css">
		<link rel="stylesheet" href="{{ asset('frontend') }}/libs/nivo-slider/css/nivo-slider.css">
		<link rel="stylesheet" href="{{ asset('frontend') }}/libs/nivo-slider/css/animate.css">
		<link rel="stylesheet" href="{{ asset('frontend') }}/libs/nivo-slider/css/style.css">
		<link rel="stylesheet" href="{{ asset('frontend') }}/libs/owl.carousel/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="{{ asset('frontend') }}/libs/slider-range/css/jslider.css">

		<!-- Template CSS -->
		<link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css">
		<link rel="stylesheet" href="{{ asset('frontend') }}/css/reponsive.css">
        @yield('css')
        <style>
            .modal{
                z-index: 9999;
            }
        </style>
	</head>

	<body class="home home-2">
		<div id="all">
			<!-- Header -->
			<header id="header">
				<!-- Topbar -->
				<div class="topbar">
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
                                            @auth
                                                <div class="item">
                                                    <a href="{{ route('user.profile') }}" title="Log in to your customer account"><i class="fa fa-cog"></i>My Profile</a>
                                                </div>
                                                <div class="item d-flex">
                                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                        <i class="fa fa-cog"></i>
                                                        <form method="POST" action="{{ route('logout') }}">
                                                            @csrf
                                                            <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                                                        onclick="event.preventDefault();
                                                                            this.closest('form').submit();">
                                                                {{ __('Log Out') }}
                                                            </x-jet-responsive-nav-link>
                                                        </form>
                                                    </a>
                                                </div>
                                            @endauth
                                            @guest
                                                <div class="item">
                                                    <a href="{{ url('/login') }}" title="Log in to your customer account"><i class="fa fa-sign-in"></i>Login</a>
                                                </div>
                                                <div class="item">
                                                    <a href="{{ url('/register') }}" title="Register Account"><i class="fa fa-user"></i>Register</a>
                                                </div>
                                            @endguest
                                            @auth
											<div class="item">
												<a href="{{ route('view.wishlist') }}" title="My Wishlists"><i class="fa fa-heart"></i>My Wishlists</a>
											</div>
                                            @endauth
										</div>
									</div>

									<!-- Language -->
									<div class="dropdown language">
										<div class="dropdown-toggle" data-toggle="dropdown">
											<img src="{{ asset('frontend') }}/img/language-en.jpg" alt="Language English">
										</div>
										<div class="dropdown-menu">
											<div class="item">
												<a href="#" title="Language English"><img src="{{ asset('frontend') }}/img/language-en.jpg" alt="Language English"> English</a>
											</div>
											<div class="item">
												<a href="#" title="Language French"><img src="{{ asset('frontend') }}/img/language-fr.jpg" alt="Language French"> French</a>
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
				</div>

				<!-- Header Top -->
				<div class="header-top">
					<div class="container">
						<div class="row margin-0">
							<div class="col-lg-2 col-md-2 col-sm-12 padding-0">
								<!-- Logo -->
								<div class="logo">
									<a href="{{ url('/') }}">
										<img class="img-responsive" src="{{ asset('frontend') }}/img/logo.png" alt="Logo">
									</a>
								</div>

								<span id="toggle-mobile-menu"><i class="zmdi zmdi-menu"></i></span>
							</div>

							<div class="col-lg-7 col-md-7 col-sm-12 padding-0">
								<!-- Main Menu -->
								<div id="main-menu">
									<ul class="menu">
										<li class="dropdown">
											<a href="home-2.html" title="Homepage">Home</a>
											<div class="dropdown-menu">
												<ul>
													<li><a href="index.html" title="Homepage 1">Homepage 1</a></li>
													<li><a href="home-2.html" title="Homepage 2">Homepage 2</a></li>
													<li><a href="home-3.html" title="Homepage 3">Homepage 3</a></li>
													<li><a href="home-4.html" title="Homepage 4">Homepage 4</a></li>
													<li><a href="home-5.html" title="Homepage 5">Homepage 5</a></li>
												</ul>
											</div>
										</li>

										<li class="dropdown">
											<a href="product-grid-left-sidebar.html" title="Product">Product</a>
											<div class="dropdown-menu">
												<ul>
													<li class="has-image">
														<img src="{{ asset('frontend') }}/img/product/product-category-1.png" alt="Product Category Image">
														<a href="product-grid-left-sidebar.html" title="Vegetables">Vegetables</a>
														</li>
													<li class="has-image">
														<img src="{{ asset('frontend') }}/img/product/product-category-2.png" alt="Product Category Image">
														<a href="product-grid-left-sidebar.html" title="Fruits">Fruits</a>
													</li>
													<li class="has-image">
														<img src="{{ asset('frontend') }}/img/product/product-category-3.png" alt="Product Category Image">
														<a href="product-grid-left-sidebar.html" title="Bread">Bread</a>
													</li>
													<li class="has-image">
														<img src="{{ asset('frontend') }}/img/product/product-category-4.png" alt="Product Category Image">
														<a href="product-grid-left-sidebar.html" title="Juices">Juices</a>
													</li>
													<li class="has-image">
														<img src="{{ asset('frontend') }}/img/product/product-category-5.png" alt="Product Category Image">
														<a href="product-grid-left-sidebar.html" title="Tea and coffee">Tea and coffee</a>
													</li>
												</ul>
											</div>
										</li>

										<li>
											<a href="page-about-us.html">About Us</a>
										</li>

										<li>
											<a href="page-contact.html">Contact</a>
										</li>
									</ul>
								</div>
							</div>

							<div class="col-lg-3 col-md-3 col-sm-12 padding-0">
								<!-- Cart -->
								<div class="block-cart dropdown">
									<div class="cart-title">
										<i class="fa fa-shopping-basket"></i>
										<span class="cart-count"><span class="count" id="cartQty"></span></span>
									</div>

									<div class="dropdown-content">
										<div class="cart-content">
											<table>
												<tbody>
                                                    <tr id="miniCart">

                                                    </tr>
													<tr class="total">
														<td>Total:</td>
														<td colspan="2"><span class="sign">$</span><span class="value" id="cartSubTotal"></span></td>
													</tr>

													<tr>
														<td colspan="3">
															<div class="cart-button">
																<a class="btn btn-primary" href="{{ route('view.cart') }}" title="View Cart">View Cart</a>
																<a class="btn btn-primary" href="{{ route('checkout') }}" title="Checkout">Checkout</a>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>

								<!-- Search -->
								<div class="form-search">
									<form action="#" method="get">
										<input type="text" class="form-input" placeholder="Search">
										<button type="submit" class="fa fa-search"></button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>


			<!-- Main Content -->
			<div id="content" class="site-content">

                @yield('main_content')

			</div>


			<!-- Footer -->
			<footer id="footer">
				<div class="footer">
					<div class="container">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 footer-col">
								<div class="block text">
									<div class="block-content">
										<a href="home-2.html" class="logo-footer">
											<img src="{{ asset('frontend') }}/img/logo-2.png" alt="Logo">
										</a>

										<p>
											Lorem ipsum dolor sit amet, consectetur adipisc ing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br>
											Ut enim ad minim veniam, quis nostrud exercita tion ullamco laboris nisi ut aliquip.
										</p>
									</div>
								</div>

								<div class="block social">
									<div class="block-content">
										<ul>
											<li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
											<li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
											<li><a href="#"><i class="zmdi zmdi-dribbble"></i></a></li>
											<li><a href="#"><i class="zmdi zmdi-instagram"></i></a></li>
										</ul>
									</div>
								</div>
							</div>

							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 footer-col">
								<div class="block menu">
									<h2 class="block-title">Information</h2>

									<div class="block-content">
										<ul>
											<li><a href="#">Specials</a></li>
											<li><a href="#">New products</a></li>
											<li><a href="#">Best sellers</a></li>
											<li><a href="#">Terms and conditions</a></li>
											<li><a href="#">Our stores</a></li>
											<li><a href="#">Contact us</a></li>
										</ul>
									</div>
								</div>
							</div>

							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 footer-col">
								<div class="block menu">
									<h2 class="block-title">Your Account</h2>

									<div class="block-content">
										<ul>
											<li><a href="#">My orders</a></li>
											<li><a href="#">My merchandise returns</a></li>
											<li><a href="#">My credit slips</a></li>
											<li><a href="#">My addresses</a></li>
											<li><a href="#">My personal info</a></li>
											<li><a href="#">My vouchers</a></li>
										</ul>
									</div>
								</div>
							</div>

							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 footer-col">
								<div class="block text">
									<h2 class="block-title">Contact Us</h2>

									<div class="block-content">
										<div class="contact">
											<div class="item d-flex">
												<div>
													<i class="zmdi zmdi-home"></i>
												</div>
												<div>
													<span>123 Suspendis matti, VST District, NY Accums, North American</span>
												</div>
											</div>
											<div class="item d-flex">
												<div>
													<i class="zmdi zmdi-phone-in-talk"></i>
												</div>
												<div>
													<span>0123-456-78910<br>0987-654-32100</span>
												</div>
											</div>
											<div class="item d-flex">
												<div>
													<i class="zmdi zmdi-email"></i>
												</div>
												<div>
													<span><a href="mailto:support@domain.com">support@domain.com</a><br><a href="mailto:contact@domain.com">contact@domain.com</a></span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Copyright -->
				<div class="footer-copyright text-center">
					<div class="container">
						<div class="payment">
							<img src="{{ asset('frontend') }}/img/payment.png" alt="Payment">
						</div>

								<div class="copyright"><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></div>
							</div>
				</div>
			</footer>

			<!-- Go Up button -->
			<div class="go-up">
				<a href="#">
					<i class="fa fa-long-arrow-up"></i>
				</a>
			</div>

			<!-- Page Loader -->
			<div id="page-preloader">
				<div class="page-loading">
					<div class="dot"></div>
					<div class="dot"></div>
					<div class="dot"></div>
					<div class="dot"></div>
					<div class="dot"></div>
				</div>
			</div>
		</div>


        @include('frontend.modal')




		<!-- Vendor JS -->
		<script src="{{ asset('frontend') }}/libs/jquery/jquery.js"></script>
		<script src="{{ asset('frontend') }}/libs/bootstrap/js/bootstrap.js"></script>
		<script src="{{ asset('frontend') }}/libs/jquery.countdown/jquery.countdown.js"></script>
		<script src="{{ asset('frontend') }}/libs/nivo-slider/js/jquery.nivo.slider.js"></script>
		<script src="{{ asset('frontend') }}/libs/owl.carousel/owl.carousel.min.js"></script>
		<script src="{{ asset('frontend') }}/libs/slider-range/js/tmpl.js"></script>
		<script src="{{ asset('frontend') }}/libs/slider-range/js/jquery.dependClass-0.1.js"></script>
		<script src="{{ asset('frontend') }}/libs/slider-range/js/draggable-0.1.js"></script>
		<script src="{{ asset('frontend') }}/libs/slider-range/js/jquery.slider.js"></script>
		<script src="{{ asset('frontend') }}/libs/elevatezoom/jquery.elevatezoom.js"></script>

        <script src="{{ asset('frontend') }}/js/sweetalert2@8.js"></script>

		<!-- Template CSS -->
		<script src="{{ asset('frontend') }}/js/main.js"></script>

        <script type="text/javascript" src="{{ asset('frontend') }}/libs/toastr/toastr.min.js"></script>

        <script>
            @if (Session::has('message'))
                var type ="{{ Session::get('alert-type', 'info') }}"
                switch(type){
                case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

                case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

                case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

                case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
                }
            @endif

        </script>

        <script>

                //start product view
                function productView(id) {
                    $.ajax({
                        type: 'GET',
                        url: '/product/view/modal/' + id,
                        dataType: 'json',
                        success: function(data) {
                            $("#pimage").attr("src","");
                            $('#pname').text(data.product.product_name_en);
                            $('#pcode').text(data.product.product_code);
                            $('#pcategory').text(data.product.category.category_name_en);
                            $("#pimage").attr("src",data.product.product_thambnail);
                            $('#product_id').val(id);
                            $('#qty').val(1);
                            //product price
                            if (data.product.discount_price == null) {
                                $('#pprice').text('');
                                $('#oldprice').text('');
                                $('#pprice').text(data.product.selling_price);
                            } else {
                                $('#pprice').text(data.product.discount_price);
                                $('#oldprice').text(data.product.selling_price);
                            }

                            // //stock
                            if (data.product.product_qty > 0) {
                                $('#aviable').text('');
                                $('#stockout').text('');
                                $('#available').text('available');
                            } else {
                                $('#available').text('');
                                $('#stockout').text('');
                                $('#stockout').text('stockout');
                            }

                            //color
                            $('select[name="color"]').empty();
                            $.each(data.color, function(key, value) {
                                $('select[name="color"]').append('<option value="' + value + '">' + value +
                                    '</option>')
                            })
                            //size
                            $('select[name="size"]').empty();
                            $.each(data.size, function(key, value) {
                                $('select[name="size"]').append('<option value="' + value + '">' + value +
                                    '</option>')
                                if (data.size == "") {
                                    $('#sizeArea').hide();
                                } else {
                                    $('#sizeArea').show();
                                }
                            })
                        }
                    })
                }
                //end product view

                //Start add to cart product
                function addToCart() {
                    var product_name = $('#pname').text();
                    var id = $('#product_id').val();
                    var color = $('#color option:selected').text();
                    var size = $('#size option:selected').text();
                    var quantity = $('#qty').val();

                    $.ajax({
                        type: "POST",
                        dataType: 'json',
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            color: color,
                            size: size,
                            quantity: quantity,
                            product_name: product_name
                        },
                        url: "/cart/data/store/" + id,
                        success: function(data) {
                            miniCart();
                            $('#closeModal').click();
                            //  start message
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            })

                            if ($.isEmptyObject(data.error)) {
                                Toast.fire({
                                    type: 'success',
                                    title: data.success
                                })
                            } else {
                                Toast.fire({
                                    type: 'error',
                                    title: data.error
                                })
                            }
                            //  end message
                        }
                    })
                }
                //End add to cart product

                 // getting cart product from at minicart
                function miniCart() {
                    $.ajax({
                        type: 'GET',
                        url: '/product/mini/cart',
                        dataType: 'json',
                        success: function(response) {
                            $('span[id="cartSubTotal"]').text(response.cartTotal);
                            $('#cartQty').text(response.cartQty);
                            var miniCart = ""
                            $.each(response.carts, function(key, value) {
                                miniCart += `<tr>
                                            <td class="product-image">
                                                <a href="product-detail-left-sidebar.html">
                                                    <img src="/${value.options.image}" alt="Product">
                                                </a>
                                            </td>
                                            <td>
                                                <div class="product-name">
                                                    <a href="#">${value.name}</a>
                                                </div>
                                                <div>
                                                    ${value.qty} x <span class="product-price">$${value.price}</span>
                                                </div>
                                            </td>
                                            <td class="action">
                                                <a class="remove" href="#"  id="${value.rowId}" onclick="miniCartRemove(this.id)">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>`
                            });

                            $('#miniCart').html(miniCart);
                        }
                    })
                }
                miniCart();

                 /// mini cart remove start
                function miniCartRemove(rowId) {
                    $.ajax({
                        type: 'GET',
                        url: '/minicart/product-remove/' + rowId,
                        dataType: 'json',
                        success: function(data) {
                            miniCart();
                            //  start message
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            })

                            if ($.isEmptyObject(data.error)) {
                                Toast.fire({
                                    type: 'success',
                                    title: data.success
                                })
                            } else {
                                Toast.fire({
                                    type: 'error',
                                    title: data.error
                                })
                            }
                            //  end message
                        }
                    });
                }
                // mini cart remove end

                function addToWishlist(product_id) {
                    $.ajax({
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    dataType: 'json',
                    url: "/addTo/wishlist/" + product_id,
                    success: function(data) {
                            //  start message
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            })

                            if ($.isEmptyObject(data.error)) {
                                Toast.fire({
                                    type: 'success',
                                    title: data.success
                                })
                            } else {
                                Toast.fire({
                                    type: 'error',
                                    title: data.error
                                })
                            }
                            //  end message
                        }
                    })
                }

                function wishlist() {
                    $.ajax({
                        type: 'GET',
                        url: "/get/wishlist/product",
                        dataType: 'json',
                        success: function(response) {
                            var rows = ""
                            $.each(response, function(key, value) {
                                rows += `<tr>
                                        <td class="product-remove">
                                            <a title="Remove this item" class="remove" href="#" id="${value.id}" onclick="wishlistRemove(this.id)">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#">
                                                <img width="80" alt="Product Image" class="img-responsive" src="/${value.product.product_thambnail}">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" class="product-name">${value.product.product_name_en}</a>
                                        </td>
                                        <td class="text-center">
                                             ${value.product.discount_price == null
                                                ? `$${value.product.selling_price}`
                                                :
                                                `$${value.product.discount_price} <del>$${value.product.selling_price}</del>`
                                            }
                                        </td>
                                        <td class="text-center">
                                            <a class="add-to-cart" href="#" data-toggle="modal" data-target="#cartModal" id="${value.product_id}"
                                                onclick="productView(this.id)">
                                                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>`
                            });

                            $('#wishlist').html(rows);
                        }
                    })
                }
                wishlist();

                function wishlistRemove(id) {
                    $.ajax({
                        type: 'GET',
                        url: "/wishlist/remove/" + id,
                        dataType: 'json',
                        success: function(data) {
                            wishlist();
                            //  start message
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            })

                            if ($.isEmptyObject(data.error)) {
                                Toast.fire({
                                    type: 'success',
                                    title: data.success
                                })
                            } else {
                                Toast.fire({
                                    type: 'error',
                                    title: data.error
                                })
                            }
                            //  end message
                        }
                    });
                }

                function cart() {
                    $.ajax({
                        type: 'GET',
                        url: "/get/cart/product",
                        dataType: 'json',
                        success: function(response) {
                            var rows = ""
                            $.each(response.carts, function(key, value) {
                                rows += ` <tr>
                                    <td class="product-remove">
                                        <a title="Remove this item" class="remove" href="#" id="${value.rowId}" onclick="CartRemove(this.id)">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#">
                                            <img width="80" alt="Product Image" class="img-responsive" src="/${value.options.image}">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="product-name">${value.name} $${value.price}</a>
                                    </td>
                                    <td class="text-center">
                                        ${value.options.color}
                                    </td>
                                    <td class="text-center">
                                        ${value.options.size}
                                    </td>
                                    <td>
                                        <div class="product-quantity">
                                            <div class="qty">
                                                <div class="input-group">
                                                    <input type="text" name="qty" value="${value.qty}" data-min="1">
                                                    <span class="adjust-qty">
                                                        <span class="adjust-btn plus" id="${value.rowId}" onclick="cartIncrement(this.id)">+</span>
                                                        <span class="adjust-btn minus" id="${value.rowId}" onclick="cartDecrement(this.id)">-</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        $${value.subtotal}
                                    </td>
                                </tr>`
                            });
                            rows += `<tr class="cart-total">
                                    <td rowspan="3" colspan="4"></td>
                                    <td colspan="2" class="text-right">Total products</td>
                                    <td colspan="1" class="text-center">${response.cartQty}</td>
                                </tr>
                                <tr class="cart-total">
                                    <td colspan="2" class="text-right">Total shipping</td>
                                    <td colspan="1" class="text-center">$10</td>
                                </tr>
                                <tr class="cart-total">
                                    <td colspan="2" class="total text-right">Total</td>
                                    <td colspan="1" class="total text-center">$${response.cartTotal}</td>
                                </tr>`
                            $('#cartPage').html(rows);
                        }
                    })
                }
                cart();

                function CartRemove(id) {
                    $.ajax({
                        type: 'GET',
                        url: "/cart/remove/" + id,
                        dataType: 'json',
                        success: function(data) {
                            cart();
                            miniCart();
                            // couponCalculation();
                            // $('#couponField').show();
                            // $('#coupon_name').val('');
                            //  start message
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            })

                            if ($.isEmptyObject(data.error)) {
                                Toast.fire({
                                    type: 'success',
                                    title: data.success
                                })
                            } else {
                                Toast.fire({
                                    type: 'error',
                                    title: data.error
                                })
                            }
                            //  end message
                        }
                    });
                }

                function cartIncrement(rowId) {
                    $.ajax({
                        type: 'GET',
                        url: "/cart/increment/" + rowId,
                        dataType: 'json',
                        success: function(data) {
                            // couponCalculation();
                            cart();
                            miniCart();
                            //  start message
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            })

                            if ($.isEmptyObject(data.error)) {
                                Toast.fire({
                                    type: 'success',
                                    title: data.success
                                })
                            } else {
                                Toast.fire({
                                    type: 'error',
                                    title: data.error
                                })
                            }
                            //  end message
                        }
                    });
                }

                function cartDecrement(rowId) {
                    $.ajax({
                        type: 'GET',
                        url: "/cart/decrement/" + rowId,
                        dataType: 'json',
                        success: function(data) {
                            // couponCalculation();
                            cart();
                            miniCart();
                             //  start message
                             const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            })

                            if ($.isEmptyObject(data.error)) {
                                Toast.fire({
                                    type: 'success',
                                    title: data.success
                                })
                            } else {
                                Toast.fire({
                                    type: 'error',
                                    title: data.error
                                })
                            }
                            //  end message
                        }
                    });
                }

        </script>

        @yield('script')
	</body>

</html>
