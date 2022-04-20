<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\Brancontroller;
use App\Http\Controllers\Admin\Couponcontroller;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ShippingAreaController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CheckoutController;
use App\Models\Admin\Product;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [IndexController::class, 'index']);


// Admin Login View
Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});


// Admin View
Route::middleware(['auth.admin:admin', 'verified'])->get('/admin/dashboard', function () {
    return view('backend.home');
})->name('dashboard');


Route::post('/logout', [AdminController::class, 'destroy'])->name('logout');

Route::post('/admin/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth.admin:admin')->name('admin.logout');

// Route::post('/admin/logout', [AdminController::class, 'destroy'])->middleware('auth:admin')->name('admin.logout');

Route::get('/dashboard', [IndexController::class, 'index'])->middleware(['auth:sanctum,web', 'verified']);

// routes for brand
Route::prefix('banner/')->group(function () {
    Route::get('show', [BannerController::class, 'BannerView'])->name('all.banner');
    Route::post('add', [BannerController::class, 'BannerAdd'])->name('add.banner');
    Route::get('delete/{id}', [BannerController::class, 'BannerDelete'])->name('delete.banner');
});
// routes for brand
Route::prefix('brand/')->group(function () {
    Route::get('show', [Brancontroller::class, 'BrandView'])->name('all.brand');
    Route::post('add', [Brancontroller::class, 'BrandAdd'])->name('add.brand');
    Route::get('edit/{id}', [Brancontroller::class, 'BrandEdit'])->name('edit.brand');
    Route::post('update', [Brancontroller::class, 'BrandUpdate'])->name('update.brand');
    Route::get('delete/{id}', [Brancontroller::class, 'BrandDelete'])->name('delete.brand');
});

// category routes
Route::get('category/show', [CategoryController::Class, 'CategoryView'])->name('all.category');
Route::post('category/store', [CategoryController::Class, 'CategoryStore'])->name('add.category');
Route::get('category/edit/{id}', [CategoryController::Class, 'CategoryEdit'])->name('edit.category');
Route::post('category/update', [CategoryController::class, 'CategoryUpdate'])->name('update.category');
Route::get('category/delete/{id}', [CategoryController::Class, 'CategoryDelete'])->name('delete.category');

//sub category routes
Route::get('subcategory/show', [SubcategoryController::Class, 'SubCategoryView'])->name('all.subcategory');
Route::post('subcategory/store', [SubcategoryController::Class, 'SubCategoryStore'])->name('add.subcategory');
Route::get('subcategory/edit/{id}', [SubcategoryController::Class, 'SubCategoryEdit'])->name('edit.subcategory');
Route::post('subcategory/update', [SubcategoryController::class, 'SubCategoryUpdate'])->name('update.subcategory');
Route::get('subcategory/delete/{id}', [SubcategoryController::Class, 'SubCategoryDelete'])->name('delete.subcategory');

//sub category routes
Route::get('slider/show', [SliderController::Class, 'SliderView'])->name('all.sliders');
Route::post('slider/store', [SliderController::Class, 'SliderStore'])->name('store.slider');
Route::get('slider/edit/{id}', [SliderController::Class, 'SliderEdit'])->name('edit.slider');
Route::post('slider/update', [SliderController::class, 'SliderUpdate'])->name('update.slider');
Route::get('slider/delete/{id}', [SliderController::Class, 'SliderDelete'])->name('delete.slider');

// routes for coupon
Route::prefix('coupon/')->group(function () {
    Route::get('show', [Couponcontroller::class, 'CouponView'])->name('all.coupon');
    Route::post('add', [Couponcontroller::class, 'CouponAdd'])->name('add.coupon');
    Route::get('edit/{id}', [Couponcontroller::class, 'CouponEdit'])->name('edit.coupon');
    Route::post('update', [Couponcontroller::class, 'CouponUpdate'])->name('update.coupon');
    Route::get('delete/{id}', [Couponcontroller::class, 'CouponDelete'])->name('delete.coupon');
});

// routes for product
Route::prefix('product/')->group(function () {
    Route::get('view', [ProductController::class, 'ProductView'])->name('view.product');
    Route::get('add', [ProductController::class, 'ProductAdd'])->name('add.product');
    Route::post('store', [ProductController::class, 'ProductStore'])->name('store-product');
    Route::get('edit/{product_id}', [ProductController::class, 'ProductEdit'])->name('edit.product');
    Route::post('update', [ProductController::class, 'ProductUpdate'])->name('update.product');
    Route::get('delete/{product_id}', [ProductController::class, 'ProductDelete'])->name('delete.product');
    Route::post('thambnail/update', [ProductController::class, 'thambnailUpdate'])->name('update-product-thambnail');
    Route::post('multi-image/update', [ProductController::class, 'multiImagUpdate'])->name('update-product-image');
    Route::get('multiimg/delete/{id}', [ProductController::class, 'multiImageDelete']);
    Route::get('product-inactive/{id}', [ProductController::class, 'inactive'])->name('product.deactive');
    Route::get('product-active/{id}', [ProductController::class, 'active'])->name('product.active');
});


//shipping area
//division
Route::get('division', [ShippingAreaController::class, 'createDivision'])->name('division');
Route::post('division/store', [ShippingAreaController::class, 'divisionStore'])->name('division-store');
Route::get('division-edit/{id}', [ShippingAreaController::class, 'divisionEdit']);
Route::post('division/update', [ShippingAreaController::class, 'divisionUpdate'])->name('division-update');
Route::get('division-delete/{id}', [ShippingAreaController::class, 'divisionDestroy']);
//district
Route::get('district', [ShippingAreaController::class, 'districtCreate'])->name('district');
Route::post('district/store', [ShippingAreaController::class, 'districtStore'])->name('district-store');
Route::get('district-edit/{id}', [ShippingAreaController::class, 'districtEdit']);
Route::post('district/update', [ShippingAreaController::class, 'districtUpdate'])->name('district-update');
Route::get('district-delete/{id}', [ShippingAreaController::class, 'districtDestroy']);
//state
Route::get('state', [ShippingAreaController::class, 'stateCreate'])->name('state');
Route::get('district-get/ajax/{division_id}', [ShippingAreaController::class, 'getDistrictAjax']);
Route::post('state/store', [ShippingAreaController::class, 'stateStore'])->name('state-store');
Route::get('state-edit/{id}', [ShippingAreaController::class, 'stateEdit']);
Route::post('state/update', [ShippingAreaController::class, 'stateUpdate'])->name('state-update');
Route::get('state-delete/{id}', [ShippingAreaController::class, 'stateDestroy']);


Route::get('product/details/{id}', [IndexController::class, 'ProductDetails'])->name('product.details');


// code for frontend cart
Route::get('product/view/modal/{id}', [IndexController::class, 'productViewAjax']);
// add to cart
Route::post('cart/data/store/{id}', [CartController::class, 'addToCart']);
//mini cart
Route::get('product/mini/cart', [CartController::class, 'miniCart']);
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'miniCartRemove']);

// wishlist routes
Route::post('addTo/wishlist/{product_id}', [CartController::class, 'addToWishlist']);
Route::get('view/wishlist', [WishlistController::class, 'ViewWishlist'])->name('view.wishlist');
Route::get('get/wishlist/product', [WishlistController::class, 'GetWishlist']);
Route::get('/wishlist/remove/{id}', [WishlistController::class, 'DestoryWishlist']);

// cart page routes
Route::get('view/cart/product', [CartController::class, 'ViewCartProduct'])->name('view.cart');
Route::get('get/cart/product', [CartController::class, 'GetCartProduct']);
Route::get('cart/remove/{id}', [CartController::class, 'destory']);
Route::get('/cart/increment/{id}', [CartController::class, 'cartIncrement']);
Route::get('/cart/decrement/{id}', [CartController::class, 'cartDecrement']);


//checkout
Route::get('user/checkout', [CartController::class, 'checkoutCreate'])->name('checkout');
Route::get('district-get/ajax/{division_id}', [CheckoutController::class, 'getDistrictWithAjax']);
Route::get('state-get/ajax/{district_id}', [CheckoutController::class, 'getStateWithAjax']);
Route::post('/order/confirm', [CheckoutController::class, 'ConfirmOrder'])->name('checkout.store');

Route::get('user/profile/view', [CheckoutController::class, 'UserProfile'])->name('user.profile');
Route::get('user/profile/order/items/{id}', [CheckoutController::class, 'UserProfileItems'])->name('user.profile.order.items');
Route::get('subcatgory/wise/product/{id}', [CheckoutController::class, 'SubcategoryProduct'])->name('subcategory.product');
Route::get('category/wise/product/{id}', [CheckoutController::class, 'CategoryProduct'])->name('category.product');


Route::get('pending-orders',[OrderController::class,'pendingOrder'])->name('pending-orders');
Route::get('cancel/order/{id}',[OrderController::class,'cancelDeliver'])->name('order.cancel');
Route::get('orders-view/{id}',[OrderController::class,'viewOrders']);
Route::get('processing-orders',[OrderController::class,'processingOrder'])->name('processing-orders');
Route::get('delivered-orders',[OrderController::class,'deliveredOrders'])->name('delivered-orders');
Route::get('cancel-orders',[OrderController::class,'cancelOrders'])->name('cancel-orders');
Route::get('confirm/order/{id}',[OrderController::class,'orderCOnfirm'])->name('order.confirm');
Route::get('deliver/order/{id}',[OrderController::class,'orderDeliver'])->name('order.deliver');

// pie chart
Route::get('/get/pie', [AdminController::class, 'pieChart']);
// for DoughnutChartOne
Route::get('/get/donut', [AdminController::class, 'DoughnutChartOne']);
//for BarChart
Route::get('/get/bar', [AdminController::class, 'barChart']);
//for line
Route::get('/get/line', [AdminController::class, 'lineChart']);

// about us
Route::get('/about/us', [IndexController::class, 'AboutUs'])->name('about.us');
Route::get('/contact/us', [IndexController::class, 'ContactUs'])->name('contact.us');
