@extends('layouts.frontend_master')

@section('main_content')
<div id="content" class="site-content">
    <!-- Breadcrumb -->
    <div id="breadcrumb">
        <div class="container">
            <h2 class="title">Organic Strawberry Fruits</h2>

            <ul class="breadcrumb">
                <li><a href="#" title="Home">Home</a></li>
                <li><a href="#" title="Fruit">Fruit</a></li>
                <li><span>Tomato</span></li>
            </ul>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div id="left-column" class="sidebar col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <!-- Block - Product Categories -->
                <div class="block product-categories">
                    <h3 class="block-title">Categories</h3>

                    <div class="block-content">
                        @foreach ($categorys as $category)
                        <div class="item">
                            <span class="arrow collapsed" data-toggle="collapse" data-target="#cat{{ $category->id }}" aria-expanded="false" role="button">
                                <i class="zmdi zmdi-minus"></i>
                                <i class="zmdi zmdi-plus"></i>
                            </span>

                            <a class="category-title" href="product-grid-left-sidebar.html">{{ $category->category_name_en }}</a>
                            <div class="sub-category collapse" id="cat{{ $category->id }}" aria-expanded="true" role="main">
                                @php
                                    $subcategorys = App\Models\Admin\Subcategory::where('category_id',$category->id)->get();
                                @endphp
                                @foreach ($subcategorys as $subcategory)
                                    <div class="item">
                                        <a href="#">{{ $subcategory->subcategory_name_en }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>


                <!-- Block - Products -->
                <div class="block products-block layout-5">
                    <h3 class="block-title">Special Offer</h3>

                    <div class="block-content">
                        @php
                            $special_offers = App\Models\Admin\Product::where('special_offer','1')->limit(2)->get();
                        @endphp
                        @foreach ($special_offers as $special_offer)
                        <div class="product-item">
                            <div class="row">
                                <div class="col-md-4 col-sm-12 col-xs-12 product-left">
                                    <div class="product-image">
                                        <a href="product-detail-left-sidebar.html">
                                            <img class="img-responsive" src="{{ url($special_offer->product_thambnail) }}" alt="Product Image">
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-8 col-sm-12 col-xs-12 product-right">
                                    <div class="product-info">
                                        <div class="product-title">
                                            <a href="product-detail-left-sidebar.html">
                                                {{ $special_offer->product_name_en }}
                                            </a>
                                        </div>

                                        <div class="product-rating">
                                            <div class="star on"></div>
                                            <div class="star on"></div>
                                            <div class="star on"></div>
                                            <div class="star on"></div>
                                            <div class="star"></div>
                                            <span class="review-count">(3 Reviews)</span>
                                        </div>

                                        <div class="product-price">
                                            <span class="sale-price">${{ $special_offer->discount_price }}</span>
                                            <span class="base-price">${{ $special_offer->selling_price }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Product Tags -->
                <div class="block tags product-tags">
                    <h3 class="block-title">Product Tags</h3>

                    <div class="block-content">
                        @php
                            $tags_en = App\Models\Admin\Product::groupBy('product_tags_en')->select('product_tags_en')->get();
                        @endphp
                        <ul>
                            @foreach ($tags_en as $tag)
                            <li>
                                <a href="#" title="Show products matching tag Hot Trend">{{ str_replace(',',' ',$tag->product_tags_en) }}</a>
                            </li>
                                @endforeach
                        </ul>
                            {{-- {{ url('product/tag/'.$tag->product_tags_en) }} --}}
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <div id="center-column" class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                <div class="product-detail">
                    <div class="products-block layout-5">
                        <div class="product-item">
                            <div class="product-title">
                                {{ $product_detail->product_name_en }}
                            </div>

                            <div class="row">
                                <div class="product-left col-md-5 col-sm-5 col-xs-12">
                                    <div class="product-image horizontal">
                                        <div class="main-image">
                                            <img class="img-responsive" src="{{ url($product_detail->product_thambnail )}}" alt="Product Image">
                                        </div>

                                        <div class="thumb-images owl-theme owl-carousel">
                                            @foreach ($product_multi as $product_mul)
                                              <img class="img-responsive" src="{{ url($product_mul->photo_name)}}" alt="Product Image">
                                            @endforeach
                                        </div>

                                    </div>
                                </div>

                                <div class="product-right col-md-7 col-sm-7 col-xs-12">
                                    <div class="product-info">
                                        <div class="product-price">
                                            <span class="sale-price">${{ $product_detail->discount_price }}</span>
                                            <span class="base-price">${{ $product_detail->selling_price }}</span>
                                        </div>

                                        <div class="product-stock">
                                            <span class="availability">Availability :</span><i class="fa fa-check-square-o" aria-hidden="true"></i>In stock
                                        </div>

                                        <div class="product-short-description">
                                            {!! $product_detail->long_descp_en !!}
                                        </div>

                                        <div class="product-variants border-bottom">
                                            @if ($product_detail->product_size_en == null)

                                            @else
                                            <div class="product-variants-item">
                                                <span class="control-label">Size :</span>
                                                <select>
                                                    <option value="1" title="S">S</option>
                                                    <option value="2" title="M">M</option>
                                                    <option value="3" title="L">L</option>
                                                    <option value="4" title="One size">One size</option>
                                                </select>
                                            </div>
                                            @endif

                                            <div class="product-variants-item">
                                                <span class="control-label">Color :</span>

                                                <ul>
                                                    <li>
                                                        <input class="input-color" type="radio" value="1">
                                                        <span class="color" style="background-color: #E84C3D"></span>
                                                    </li>
                                                    <li>
                                                        <input class="input-color" type="radio" value="2">
                                                        <span class="color" style="background-color: #5D9CEC"></span>
                                                    </li>
                                                    <li>
                                                        <input class="input-color" type="radio" value="3">
                                                        <span class="color" style="background-color: #A0D468"></span>
                                                    </li>
                                                    <li>
                                                        <input class="input-color" type="radio" value="4">
                                                        <span class="color" style="background-color: #F1C40F"></span>
                                                    </li>
                                                    <li>
                                                        <input class="input-color" type="radio" value="5">
                                                        <span class="color" style="background-color: #964B00"></span>
                                                    </li>
                                                    <li>
                                                        <input class="input-color" type="radio" value="6">
                                                        <span class="color" style="background-color: #FCCACD"></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="product-add-to-cart border-bottom">
                                            <div class="product-quantity">
                                                <span class="control-label">QTY :</span>
                                                <div class="qty">
                                                    <div class="input-group">
                                                        <input type="text" name="qty" value="1" data-min="1">
                                                        <span class="adjust-qty">
                                                            <span class="adjust-btn plus">+</span>
                                                            <span class="adjust-btn minus">-</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="product-buttons">
                                                <a class="add-to-cart" href="#">
                                                    <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                                    <span>Add To Cart</span>
                                                </a>

                                                <a class="add-wishlist" href="#">
                                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                                </a>
                                            </div>
                                        </div>

                                        {{-- <div class="product-share border-bottom">
                                            <div class="item">
                                                <a href="#"><i class="zmdi zmdi-share" aria-hidden="true"></i><span class="text">Share</span></a>
                                            </div>
                                            <div class="item">
                                                <a href="#"><i class="zmdi zmdi-email" aria-hidden="true"></i><span class="text">Send to a friend</span></a>
                                            </div>
                                            <div class="item">
                                                <a href="#"><i class="zmdi zmdi-print" aria-hidden="true"></i><span class="text">Print</span></a>
                                            </div>
                                        </div>

                                        <div class="product-review border-bottom">
                                            <div class="item">
                                                <div class="product-quantity">
                                                    <span class="control-label">Review :</span>
                                                    <div class="product-rating">
                                                        <div class="star on"></div>
                                                        <div class="star on"></div>
                                                        <div class="star on"></div>
                                                        <div class="star on"></div>
                                                        <div class="star"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="item">
                                                <a href="#"><i class="zmdi zmdi-comments" aria-hidden="true"></i><span class="text">Read Reviews (3)</span></a>
                                            </div>

                                            <div class="item">
                                                <a href="#"><i class="zmdi zmdi-edit" aria-hidden="true"></i><span class="text">Write a review</span></a>
                                            </div>
                                        </div> --}}

                                        <div class="product-extra">
                                            {{-- <div class="item">
                                                <span class="control-label">Review :</span><span class="control-label">E-02154</span>
                                            </div> --}}
                                            @php
                                                $category = App\Models\Admin\Product::find($product_detail->id);
                                                $cat_name = App\Models\Admin\Category::where('id',$category->category_id)->first();
                                            @endphp
                                            <div class="item">
                                                <span class="control-label">Category :</span>
                                                <a href="#" title="Vegetables">{{  $cat_name->category_name_en }}</a>
                                            </div>
                                            <div class="item">
                                                <span class="control-label">Tags :</span>
                                                <a href="#" title="tag">{{  $product_detail->product_tags_en }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-tab">
                                <!-- Tab Navigation -->
                                <div class="tab-nav">
                                    <ul>
                                        <li class="active">
                                            <a data-toggle="tab" href="#description">
                                                <span>Description</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#additional-information">
                                                <span>Additional Information</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#review">
                                                <span>Review</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Tab Content -->
                                <div class="tab-content">
                                    <!-- Description -->
                                    <div role="tabpanel" class="tab-pane fade in active" id="description">
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>
                                    </div>

                                    <!-- Product Tag -->
                                    <div role="tabpanel" class="tab-pane fade" id="additional-information">
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>
                                    </div>

                                    <!-- Review -->
                                    <div role="tabpanel" class="tab-pane fade" id="review">
                                        <div class="reviews">
                                            <div class="comments-list">
                                                <div class="item d-flex">
                                                    <div class="comment-left">
                                                        <div class="avatar">
                                                            <img src="img/avatar.jpg" alt="" width="70" height="70">
                                                        </div>
                                                        <div class="product-rating">
                                                            <div class="star on"></div>
                                                            <div class="star on"></div>
                                                            <div class="star on"></div>
                                                            <div class="star on"></div>
                                                            <div class="star on"></div>
                                                        </div>
                                                    </div>
                                                    <div class="comment-body">
                                                        <div class="comment-meta">
                                                            <span class="author">Peter</span> - <span class="time">June 02, 2018</span>
                                                        </div>
                                                        <div class="comment-content">Look at the sunset, life is amazing, life is beautiful, life is what you make it. To succeed you must believe. When you believe, you will succeed. In life there will be road blocks but we will over come it. Celebrate success right, the only way, apple. The ladies always say Khaled you smell good, I use no cologne. Cocoa butter is the key. </div>
                                                    </div>
                                                </div>

                                                <div class="item d-flex">
                                                    <div class="comment-left">
                                                        <div class="avatar">
                                                            <img src="img/avatar.jpg" alt="" width="70" height="70">
                                                        </div>
                                                        <div class="product-rating">
                                                            <div class="star on"></div>
                                                            <div class="star on"></div>
                                                            <div class="star on"></div>
                                                            <div class="star on"></div>
                                                            <div class="star"></div>
                                                        </div>
                                                    </div>
                                                    <div class="comment-body">
                                                        <div class="comment-meta">
                                                            <span class="author">Merry</span> - <span class="time">June 17, 2018</span>
                                                        </div>
                                                        <div class="comment-content">Look at the sunset, life is amazing, life is beautiful, life is what you make it. To succeed you must believe. When you believe, you will succeed. In life there will be road blocks but we will over come it. Celebrate success right, the only way, apple. The ladies always say Khaled you smell good, I use no cologne. Cocoa butter is the key. </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="review-form">
                                                <h4 class="title">Write a review</h4>

                                                <form action="#" method="post" class="form-validate">
                                                    <div class="form-group">
                                                        <div class="text">Your Rating</div>
                                                        <div class="product-rating">
                                                            <div class="star"></div>
                                                            <div class="star"></div>
                                                            <div class="star"></div>
                                                            <div class="star"></div>
                                                            <div class="star"></div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="text">You review<sup class="required">*</sup></div>
                                                        <textarea id="comment" name="comment" cols="45" rows="6" aria-required="true"></textarea>
                                                    </div>

                                                    <div class="form-group">
                                                        <button class="btn btn-primary">Send your review</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Related Products -->
                <div class="products-block related-products">
                    <div class="block-title">
                        <h2 class="title">Related <span>Products</span></h2>
                        @php
                           $category = App\Models\Admin\Product::find($product_detail->id);
                           $related_products = App\Models\Admin\Product::where('category_id',$category->category_id)->get();
                        @endphp
                    </div>

                    <div class="block-content">
                        <div class="products owl-theme owl-carousel">
                            @foreach ($related_products as $related_product)
                            <div class="product-item">
                                <div class="product-image">
                                    <a href="{{ route('product.details',$related_product->id) }}">
                                        <img src="{{ url($related_product->product_thambnail) }}" alt="Product Image">
                                    </a>
                                </div>

                                <div class="product-title">
                                    <a href="{{ route('product.details',$related_product->id) }}">
                                        {{ $related_product->product_name_en }}
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
                                    <span class="sale-price">${{ $related_product->discount_price }}</span>
                                    <span class="base-price">${{ $related_product->selling_price }}</span>
                                </div>

                                <div class="product-buttons">
                                    <a class="add-to-cart" href="#">
                                        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                    </a>

                                    <a class="add-wishlist" href="#">
                                        <i class="fa fa-heart" aria-hidden="true"></i>
                                    </a>

                                    <a class="quickview" href="#">
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
    </div>
</div>

@endsection
