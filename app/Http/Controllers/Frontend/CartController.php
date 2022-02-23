<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Wishlist;

use App\Models\ShipDistrict;
use App\Models\ShipDivision;
use App\Models\ShipState;
use Carbon\Carbon;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //store cart
    public function addToCart(Request $request,$id){

        // if (Session::has('coupon')) {
        //     Session::forget('coupon');
        // }

        $product = Product::findOrFail($id);

        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                    'options' => [
                        'image' => $product->product_thambnail,
                        'color' => $request->color,
                        'size' => $request->size,
                    ],
                ]);

                return response()->json(['success' => 'Sucessfully Added On Your Cart']);
        }else {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                    'options' => [
                        'image' => $product->product_thambnail,
                        'color' => $request->color,
                        'size' => $request->size,
                    ],
                ]);
                return response()->json(['success' => 'Sucessfully Added On Your Cart']);

        }

    }

    // minicart view
    public function miniCart(){
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json([
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal),
        ]);
    }

    //mini cart remove
    public function miniCartRemove($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Remove From Cart']);
    }

    // add to wishlist
    public function addToWishlist(Request $request,$product_id){
        if (Auth::check()) {
            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();
            if (!$exists) {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json(['success' => 'Sucessfully Added On Your Wishlist']);
            }else {
                return response()->json(['error' => 'The Product Has Already On Your Wishlist']);
            }

        }else {
            return response()->json(['error' => 'At First Login Your Account']);
        }
   }

   public function ViewCartProduct(){
       return view('frontend.view_cart');
   }

   public function GetCartProduct(){
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal),
        ));
   }

    //cart remove product
    public function destory($id){
        Cart::remove($id);
        // if (Session::has('coupon')) {
        //     Session::forget('coupon');
        // }
        return response()->json(['success' => 'Product Remove From Cart']);
    }

    //cart increment
    public function cartIncrement($rowId){

        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);
        return response()->json(['success' => 'product incremented successfully']);
    }

    //cart decrement
    public function cartDecrement($rowId){

        $row = Cart::get($rowId);
        if ($row->qty == 1) {
            return response()->json(['success' => 'not decremented']);
        }else {
            Cart::update($rowId, $row->qty - 1);
            return response()->json(['success' => 'product decremented successfully']);
        }
    }

    //checkout
    public function checkoutCreate(){
        if (Auth::check()) {
            if (Cart::total() > 0) {
                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();
                $divisions = ShipDivision::orderBy('division_name','ASC')->get();
                return view('frontend.checkout',compact('carts','cartQty','cartTotal','divisions'));
            }else {
            $notification=array(
                'message'=>'Shopping Now',
                'alert-type'=>'error'
            );
            return Redirect()->to('/')->with($notification);
            }
        }else {
            $notification=array(
                'message'=>'You Nedd to Login First',
                'alert-type'=>'error'
            );
            return Redirect()->route('login')->with($notification);
    }
}


}
