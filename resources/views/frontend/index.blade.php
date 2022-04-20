@extends('layouts.frontend_master')

@section('main_content')

    <!-- Slideshow -->
    <div class="section slideshow">
        <div class="container">
            <div class="tiva-slideshow-wrapper">
                <div id="tiva-slideshow" class="nivoSlider">
                        @foreach ($sliders as $slider)
                        <a href="#">
                            <img class="img-responsive" src="{{ asset($slider->image) }}" alt="Slideshow Image">
                        </a>
                        @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Banners -->
    <div class="section banners">
        <div class="container">
            <div class="row margin-10">
                @foreach ($banner as $item)
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 padding-10">
                        <div class="banner-item effect">
                            <a href="#">
                                <img class="img-responsive" src="{{ asset($item->banner) }}" alt="Banner 1">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- 2 Columns -->
    <div class="two-columns">
        <div class="container">
            <div class="row ">
                <!-- Left Column -->
                <div class="col-20p col-md-3 left-column">
                    <!-- Product - Category -->
                    <div class="section product-categories">
                        <div class="block-title">
                            <h2 class="title">Categories</h2>
                        </div>
                        <div class="block-content">
                            @foreach ($categorys as $category)
                            <div class="item">
                                <span class="arrow collapsed" data-toggle="collapse" data-target="#cat{{ $category->id }}" aria-expanded="false" role="button">
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </span>
                                <a class="category-title" href="{{ route('category.product',$category->id) }}">{{ $category->category_name_en }}</a>
                                <div class="sub-category collapse" id="cat{{ $category->id }}" aria-expanded="true" role="main">
                                    @php
                                        $subcategorys = App\Models\Admin\Subcategory::where('category_id',$category->id)->get();
                                    @endphp
                                    @foreach ($subcategorys as $subcategory)
                                        <div class="item">
                                            <a href="{{ route('subcategory.product',$subcategory->id) }}">{{ $subcategory->subcategory_name_en }}</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Product - Flash Deals -->
                    <div class="section products-block nav-color flash-deals layout-4">
                        <div class="block-title">
                            <h2 class="title">Hot Deals</h2>
                        </div>
                        <div class="block-content">
                            <div class="products owl-theme owl-carousel">
                                @foreach ($hot_deals as $hot_deal)
                                    <div class="product-item">
                                        <div class="product-image">
                                            <a href="{{ route('product.details',$hot_deal->id) }}">
                                                <img src="{{ url($hot_deal->product_thambnail) }}" alt="Product Image">
                                            </a>
                                        </div>

                                        <div class="product-countdown" data-date="2018/11/28">
                                        </div>

                                        <div class="product-title">
                                            <a href="#">
                                                {{ $hot_deal->product_name_en }}
                                            </a>
                                        </div>

                        

                                        <div class="product-price">
                                            <span class="sale-price">৳{{ $hot_deal->discount_price }}</span>
                                            <span class="base-price">৳{{ $hot_deal->selling_price }}</span>
                                        </div>

                                        <div class="product-buttons">
                                            <a class="add-to-cart" href="#" data-toggle="modal" data-target="#cartModal" id="{{ $hot_deal->id }}"
                                                onclick="productView(this.id)">
                                                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                            </a>

                                            <a class="add-wishlist" href="#">
                                                <i class="fa fa-heart" aria-hidden="true" id="{{ $hot_deal->id }}"
                                                    onclick="addToWishlist(this.id)"></i>
                                            </a>

                                            <a class="quickview" href="{{ route('product.details',$hot_deal->id) }}">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Payment Intro -->
                    <div class="section payment-intro">
                        <div class="block-content">
                            <div class="item">
                                <img class="img-responsive" src="{{ asset('frontend') }}/img/home2-payment-1.png" alt="Payment Intro">
                                <h3 class="title">Free Shipping item</h3>
                                <div class="content">Proin gravida nibh vel velit auctor aliquet aenean</div>
                            </div>
                            <div class="item">
                                <img class="img-responsive" src="{{ asset('frontend') }}/img/home2-payment-2.png" alt="Payment Intro">
                                <h3 class="title">Secured Payment</h3>
                                <div class="content">Proin gravida nibh vel velit auctor aliquet aenean</div>
                            </div>
                            <div class="item">
                                <img class="img-responsive" src="{{ asset('frontend') }}/img/home2-payment-3.png" alt="Payment Intro">
                                <h3 class="title">money back guarantee</h3>
                                <div class="content">Proin gravida nibh vel velit auctor aliquet aenean</div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Right Column -->
                <div class="col-80p col-md-9 right-column">
                    <!-- Product - Category Tab -->
                    <div class="section products-block category-tab">
                        <div class="block-title">
                            <h2 class="title">Products</h2>
                        </div>

                        <div class="block-content">
                            <!-- Tab Navigation -->
                            <div class="tab-nav">
                                <ul>
                                    <li class="active">
                                        <a data-toggle="tab" href="#featured">
                                            <span>Featured</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#specialDeal">
                                            <span>Special Deals</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <!-- Tab Content -->
                            <div class="tab-content">
                                <!-- New Arrivals -->
                                <div role="tabpanel" class="tab-pane fade in active" id="featured">
                                    <div class="products owl-theme owl-carousel">
                                        @php
                                            $products = App\Models\Admin\Product::where('featured','1')->get();
                                        @endphp
                                        @foreach ($products as $product)
                                        <div class="product-item">
                                            <div class="product-image">
                                                <a href="{{ route('product.details',$product->id) }}">
                                                    <img src="{{ url($product->product_thambnail) }}" alt="Product Image">
                                                </a>
                                            </div>

                                            <div class="product-title">
                                                <a href="{{ route('product.details',$product->id) }}">
                                                    {{ $product->product_name_en }}
                                                </a>
                                            </div>

                                            {{-- <div class="product-rating">
                                                <div class="star on"></div>
                                                <div class="star on"></div>
                                                <div class="star on "></div>
                                                <div class="star on"></div>
                                                <div class="star"></div>
                                            </div> --}}

                                            <div class="product-price">
                                                <span class="sale-price">৳{{ $product->discount_price }}</span>
                                                <span class="base-price">৳{{ $product->selling_price }}</span>
                                            </div>

                                            <div class="product-buttons">
                                                <a class="add-to-cart" href="#" data-toggle="modal" data-target="#cartModal" id="{{ $product->id }}"
                                                    onclick="productView(this.id)">
                                                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                                </a>

                        
                                                <a class="add-wishlist" href="#">
                                                    <i class="fa fa-heart" aria-hidden="true" id="{{ $product->id }}"
                                                        onclick="addToWishlist(this.id)"></i>
                                                </a>

                                                <a class="quickview" href="{{ route('product.details',$product->id) }}">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Best Seller -->
                                <div role="tabpanel" class="tab-pane fade" id="specialDeal">
                                    <div class="products owl-theme owl-carousel">
                                        @php
                                             $products = App\Models\Admin\Product::where('special_deals','1')->get();
                                        @endphp
                                            @foreach ($products as $product)
                                            <div class="product-item">
                                                <div class="product-image">
                                                    <a href="{{ route('product.details',$product->id) }}">
                                                        <img src="{{ url($product->product_thambnail) }}" alt="Product Image">
                                                    </a>
                                                </div>

                                                <div class="product-title">
                                                    <a href="{{ route('product.details',$product->id) }}">
                                                        {{ $product->product_name_en }}
                                                    </a>
                                                </div>

                                                {{-- <div class="product-rating">
                                                    <div class="star on"></div>
                                                    <div class="star on"></div>
                                                    <div class="star on "></div>
                                                    <div class="star on"></div>
                                                    <div class="star"></div>
                                                </div> --}}

                                                <div class="product-price">
                                                    <span class="sale-price">৳{{ $product->discount_price }}</span>
                                                    <span class="base-price">৳{{ $product->selling_price }}</span>
                                                </div>

                                                <div class="product-buttons">
                                                    <a class="add-to-cart" href="#" data-toggle="modal" data-target="#cartModal" id="{{ $product->id }}"
                                                        onclick="productView(this.id)">
                                                        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                                    </a>

                                                    <a class="add-wishlist" href="#">
                                                        <i class="fa fa-heart" aria-hidden="true" id="{{ $product->id }}"
                                                            onclick="addToWishlist(this.id)"></i>
                                                    </a>

                                                    <a class="quickview" href="{{ route('product.details',$product->id) }}">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Newsletter -->
                    <div class="section newsletter">
                        <h2 class="block-title">Newsletter</h2>
                        <div class="block-content">
                            <p class="description">Sign up for newsletter to receive special offers and exclusive news about FreshMart products</p>
                        </div>
                    </div>


                    <!-- Product - Category Double -->
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="section products-block category-double">
                                <div class="block-title">
                                    <h2 class="title">Fruits</h2>
                                </div>

                                <div class="block-content">
                                    <div class="products owl-theme owl-carousel">
                                        @php
                                            $fruits = App\Models\Admin\Product::where('subcategory_id','35')->limit(4)->get();
                                        @endphp
                                        @foreach ($fruits as $fruit)
                                            <div class="product-item">
                                                <div class="product-image">
                                                    <a href="{{ route('product.details',$fruit->id) }}">
                                                        <img src="{{ url($fruit->product_thambnail) }}" alt="Product Image">
                                                    </a>
                                                </div>

                                                <div class="product-title">
                                                    <a href="{{ route('product.details',$fruit->id) }}">
                                                        {{ $fruit->product_name_en }}
                                                    </a>
                                                </div>

                                                <div class="product-price">
                                                    <span class="sale-price">৳{{ $fruit->discount_price }}</span>
                                                    <span class="base-price">৳{{ $fruit->selling_price }}</span>
                                                </div>

                                                <div class="product-buttons">
                                                    <a class="add-to-cart" href="#" data-toggle="modal" data-target="#cartModal" id="{{ $fruit->id }}"
                                                        onclick="productView(this.id)">
                                                        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                                    </a>

                                                    <a class="add-wishlist" href="#">
                                                        <i class="fa fa-heart" aria-hidden="true" id="{{ $fruit->id }}"
                                                            onclick="addToWishlist(this.id)"></i>
                                                    </a>

                                                    <a class="quickview" href="{{ route('product.details',$fruit->id) }}">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="section products-block category-double">
                                <div class="block-title">
                                    <h2 class="title">Honey</h2>
                                </div>

                                @php
                                    $honeys = App\Models\Admin\Product::where('subcategory_id','43')->limit(4)->get();
                                @endphp

                                <div class="block-content">
                                    <div class="products owl-theme owl-carousel">
                                        @foreach ($honeys as $honey)

                                        <div class="product-item">
                                            <div class="product-image">
                                                <a href="{{ route('product.details',$honey->id) }}">
                                                    <img src="{{ url($honey->product_thambnail) }}" alt="Product Image">
                                                </a>
                                            </div>

                                            <div class="product-title">
                                                <a href="{{ route('product.details',$honey->id) }}">
                                                    {{ $honey->product_name_en }}
                                                </a>
                                            </div>

                                            <div class="product-price">
                                                <span class="sale-price">৳{{ $honey->discount_price }}</span>
                                                <span class="base-price">৳{{ $honey->selling_price }}</span>
                                            </div>

                                            <div class="product-buttons">
                                                <a class="add-to-cart" href="#" data-toggle="modal" data-target="#cartModal" id="{{ $honey->id }}"
                                                    onclick="productView(this.id)">
                                                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                                </a>

                                                <a class="add-wishlist" href="#">
                                                    <i class="fa fa-heart" aria-hidden="true" id="{{ $honey->id }}"
                                                        onclick="addToWishlist(this.id)"></i>
                                                </a>

                                                <a class="quickview" href="{{ route('product.details',$honey->id) }}">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Banners -->
                    <div class="section banners-block">
                        <div class="row margin-15">
                            <div class="col-lg-6 col-md-6 col-sm-6 padding-15">
                                <div class="banner-item effect">
                                    <a href="#">
                                        <img class="img-responsive" src="{{ asset('frontend') }}/img/banner/home2-banner-4.png" alt="Banner">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 padding-15">
                                <div class="banner-item effect">
                                    <a href="#">
                                        <img class="img-responsive" src="{{ asset('frontend') }}/img/banner/home2-banner-5.png" alt="Banner">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Product - New Arrivals -->
                    <div class="section products-block new-arrivals layout-3">
                        <div class="block-title">
                            <h2 class="title">New <span>Arrivals</span></h2>
                        </div>

                        <div class="block-content">
                            <div class="products owl-theme owl-carousel">
                                    @php
                                        $recent_products = App\Models\Admin\Product::orderBy('id', 'DESC')->limit(5)->get();
                                    @endphp
                                    @foreach ($recent_products as $recent_product)
                                    <div class="product-item">
                                        <div class="product-image">
                                            <a href="{{ route('product.details',$recent_product->id) }}">
                                                <img src="{{ $recent_product->product_thambnail }}" alt="Product Image">
                                            </a>
                                        </div>

                                        <div class="product-info">
                                            <div class="product-title">
                                                <a href="{{ route('product.details',$recent_product->id) }}">
                                                    {{ $recent_product->product_name_en }}
                                                </a>
                                            </div>

                                            <div class="product-rating">
                                                {{-- <div class="star on"></div>
                                                <div class="star on"></div>
                                                <div class="star on "></div>
                                                <div class="star on"></div>
                                                <div class="star"></div> --}}
                                            </div>

                                            <div class="product-price">
                                                <span class="sale-price">৳{{ $recent_product->discount_price }}</span>
                                                <span class="base-price">৳{{ $recent_product->selling_price }}</span>
                                            </div>

                                            <div class="product-buttons">
                                                <a class="add-to-cart" href="#" data-toggle="modal" data-target="#cartModal" id="{{ $recent_product->id }}"
                                                    onclick="productView(this.id)">
                                                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                                </a>

                                                <a class="add-wishlist" href="#">
                                                    <i class="fa fa-heart" aria-hidden="true" id="{{ $recent_product->id }}"
                                                        onclick="addToWishlist(this.id)"></i>
                                                </a>

                                                <a class="quickview" href="{{ route('product.details',$recent_product->id) }}">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>

                                                {{-- <a class="quickview" href="#">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a> --}}
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Intro -->
    <div class="section intro">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="intro-header">
                        <img src="{{ asset('frontend') }}/img/leaf.png" alt="Partner 1">
                        <h3>Why Choose Us</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="intro-left">
                        <div class="intro-item">
                            <p><img src="{{ asset('frontend') }}/img/intro-icon-1.png" alt="Intro Image"></p>
                            <h4>Always Fresh</h4>
                            <p>At Always Fresh, food is not just fuel.
                                 Simple, good food is a way of life where sharing food with loved ones turns everyday moments
                                 into something special.</p>
                        </div>

                        <div class="intro-item">
                            <p><img src="{{ asset('frontend') }}/img/intro-icon-2.png" alt="Intro Image"></p>
                            <h4>Super Healthy</h4>
                            <p>We subscribe to ecological agrarian methods of farming, abstaining from the use of pesticides and harmful fertilizers,
                                to produce only the freshest food crop that is both nutritious and healthy.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="effect">
                        <a href="#">
                            <img class="intro-image img-responsive" src="{{ asset('frontend') }}/img/intro-2.png" alt="Intro Image">
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="intro-right">
                        <div class="intro-item">
                            <p><img src="{{ asset('frontend') }}/img/intro-icon-3.png" alt="Intro Image"></p>
                            <h4>100% Natural</h4>
                            <p>We collect all the products from our own farm & production field.After Confirming
                            order for everyday, we started to collected product from farm & field directly.There
                            is no middleman options. For all these reasons, it is 100% natural</p>
                        </div>

                        <div class="intro-item">
                            <p><img src="{{ asset('frontend') }}/img/intro-icon-4.png" alt="Intro Image"></p>
                            <h4>Premium Quality</h4>
                            <p>To ensure the freshness & quality of our produce, we ensure that all harvesting and
                                 packaging is done in the morning.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


