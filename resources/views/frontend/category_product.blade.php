@extends('layouts.frontend_master')

@section('main_content')

<!-- Main Content -->
<div id="content" class="site-content">
    <!-- Breadcrumb -->
    <div id="breadcrumb">
        <div class="container">
            <h2 class="title">{{ $category->category_name_en }}</h2>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div id="left-column" class="sidebar col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <!-- Block - Product Categories -->
                <div class="section product-categories">
                    <div class="block-title">
                        <h2 class="title">Categories</h2>
                    </div>
                    <div class="block-content">
                        @php
                            $categorys = App\Models\Admin\Category::all();
                        @endphp
                        @foreach ($categorys as $category)
                        <div class="item">
                            <span class="arrow collapsed" data-toggle="collapse" data-target="#cat{{ $category->id }}" aria-expanded="false" role="button">
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </span>
                            <a class="category-title" href=""{{ route('category.product',$category->id) }}">{{ $category->category_name_en }}</a>
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
            </div>

            <!-- Page Content -->
            <div id="center-column" class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="product-category-page">
                    <!-- Nav Bar -->
                    <div class="products-bar">
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="gridlist-toggle" role="tablist">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#products-grid" data-toggle="tab" aria-expanded="true"><i class="fa fa-th-large"></i></a></li>
                                        <li><a href="#products-list" data-toggle="tab" aria-expanded="false"><i class="fa fa-bars"></i></a></li>
                                    </ul>
                                </div>

                                <div class="total-products">There are 12 products</div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <!-- Products Grid -->
                        <div class="tab-pane active" id="products-grid">
                            <div class="products-block">
                                <div class="row">
                                    @foreach ($products as $product)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="product-item">
                                            <div class="product-image">
                                                <a href="product-detail-left-sidebar.html">
                                                    <img class="img-responsive" src="{{ url($product->product_thambnail) }}" alt="Product Image">
                                                </a>
                                            </div>

                                            <div class="product-title">
                                                <a href="{{ route('product.details',$product->id) }}">
                                                    {{ $product->product_name_en }}
                                                </a>
                                            </div>

                                            <div class="product-rating">
                                                <div class="star on"></div>
                                                <div class="star on"></div>
                                                <div class="star on "></div>
                                                <div class="star on"></div>
                                                <div class="star"></div>
                                            </div>

                                            <div class="product-price">
                                                <span class="sale-price">${{ $product->discount_price }}</span>
                                                <span class="base-price">${{ $product->selling_price }}</span>
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

                                                <a class="quickview" href="#">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Products List -->
                        <div class="tab-pane" id="products-list">
                            <div class="products-block layout-5">
                                @foreach ($products as $product)
                                    <div class="product-item">
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="product-image">
                                                    <a href="product-detail-left-sidebar.html">
                                                        <img class="img-responsive" src="{{ url($product->product_thambnail) }}" alt="Product Image">
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                                                <div class="product-info">
                                                    <div class="product-title">
                                                        <a href="{{ route('product.details',$product->id) }}">
                                                            {{ $product->product_name_en }}
                                                        </a>
                                                    </div>

                                                    <div class="product-rating">
                                                        <div class="star on"></div>
                                                        <div class="star on"></div>
                                                        <div class="star on "></div>
                                                        <div class="star on"></div>
                                                        <div class="star"></div>
                                                        <span class="review-count">(3 Reviews)</span>
                                                    </div>

                                                    <div class="product-price">
                                                        <span class="sale-price">${{ $product->discount_price }}</span>
                                                        <span class="base-price">${{ $product->selling_price }}</span>
                                                    </div>

                                                    <div class="product-stock">
                                                        <i class="fa fa-check-square-o" aria-hidden="true"></i>In stock
                                                    </div>

                                                    <div class="product-description">
                                                        {!! $product->long_descp_en !!}
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

                                                        <a class="quickview" href="#">
                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </div>
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
</div>


@endsection
