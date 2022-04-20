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

            .A{

                margin-left:41px;
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
										<i class="fa fa-envelope" aria-hidden="true"></i>Email: organicecommerce@gmail.com
									</div>
									<div class="skype">
										<i class="fa fa-skype" aria-hidden="true"></i>Skype: organicecommerce
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
                                                    <a href="{{ route('user.profile') }}" title="Log in to your customer account"><i class="fa fa-cog"></i>My Order</a>
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
									</div>

									<!-- Currency -->
									<div class="dropdown currency">
										<div class="dropdown-toggle" data-toggle="dropdown">
											BD
										</div>
										<div class="dropdown-menu">
											<div class="item">
												<a href="#" title="USD">BD</a>
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
											<a href="{{ url('/') }}" title="Homepage">Home</a>
										</li>

										<li class="dropdown">
											<a href="#" title="Product">Product</a>
											<div class="dropdown-menu">
												<ul>
                                                    @php
                                                        $categorys = App\Models\Admin\Category::all();
                                                    @endphp
                                                    @foreach ($categorys as $item)
													<li class="has-image">
														<a href="{{ route('category.product',$item->id) }}" title="{{ $item->category_name_en }}">{{ $item->category_name_en }}</a>
													</li>
                                                    @endforeach
												</ul>
											</div>
										</li>

										<li>
											<a href="{{ route('about.us') }}">About Us</a>
										</li>

										<li>
											<a href="{{ route('contact.us') }}">Contact</a>
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
														<td colspan="2"><span class="sign">৳</span><span class="value" id="cartSubTotal"></span></td>
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
								{{-- <div class="form-search">
									<form action="#" method="get">
										<input type="text" class="form-input" placeholder="Search">
										<button type="submit" class="fa fa-search"></button>
									</form>
								</div> --}}
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
                                            <img class="img-responsive" src="http://127.0.0.1:8000/frontend/img/logo.png" alt="Logo">
										</a>

										{{-- <p>
											Lorem ipsum dolor sit amet, consectetur adipisc ing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br>
											Ut enim ad minim veniam, quis nostrud exercita tion ullamco laboris nisi ut aliquip.
										</p> --}}
									</div>
								</div>

								<div class="block social">
									<div class="block-content">
										<ul class="A">
											<li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
											<li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
											<li><a href="#"><i class="zmdi zmdi-whatsapp"></i></a></li>
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
											<li><a href="#">Terms and conditions</a></li>
                                            <li>
                                                <a href="{{ route('about.us') }}">About Us</a>
                                            </li>
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
                                            {{-- <a href="{{ route('user.profile') }}">My Order</a> --}}
											<li><a href="{{ route('view.wishlist') }}">My Wishlists</a></li>

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
													<span>Salman Mansion (9th floor),Mogbazar ,
                                                        New Eskaton ,Romna Dhaka-1217 </span>
												</div>
											</div>
											<div class="item d-flex">
												<div>
													<i class="zmdi zmdi-phone-in-talk"></i>
												</div>
												<div>
													<span>0191-471-6755<br>0152-141-5098</span>
												</div>
											</div>
											<div class="item d-flex">
												<div>
													<i class="zmdi zmdi-email"></i>
												</div>
												<div>
													<span><a href="mailto:support@domain.com">support@organicecommerce.com</a><br><a href="mailto:contact@organicecommerce.com">contact@organicecommerce.com</a></span>
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
							<img src="{{ asset('frontend') }}/img/paymentss.png" alt="Payment">
						</div>

								<div class="copyright"><a>Organic E-commerce</a></div>
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
                            console.log(data.product.discount_price);
                            //product price
                            if (data.product.discount_price == null) {
                                $('#oldprice').text('');
                                $('#pprice').text(data.product.selling_price);
                            } else {
                                $('#oldprice').text('');
                                $('#pprice').text(data.product.discount_price);
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
                            product_name:product_name
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
                                                    ${value.qty} x <span class="product-price">৳${value.price}</span>
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
                                        <a href="#" class="product-name">${value.name} ৳${value.price}</a>
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
                                        ৳${value.subtotal}
                                    </td>
                                </tr>`
                            });
                            rows += `<tr class="cart-total">
                                    <td rowspan="3" colspan="4"></td>
                                    <td colspan="2" class="text-right">Total products</td>
                                    <td colspan="1" class="text-center">${response.cartQty}</td>
                                </tr>
                                <tr class="cart-total">
                                    <td colspan="2" class="total text-right">Total</td>
                                    <td colspan="1" class="total text-center">৳${response.cartTotal}</td>
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
