<?php

namespace App\Http\Controllers;

use App\Models\Admin\Category;
use App\Models\ShipDistrict;
use App\Models\ShipDivision;
use App\Models\ShipState;
use Illuminate\Http\Request;

use Carbon\Carbon;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Admin\Product;
use App\Models\Admin\Subcategory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    //get district with ajax
    public function getDistrictWithAjax($division_id)
    {
        $ship = ShipDistrict::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();
        return json_encode($ship);
    }

    //  get state with ajax
    public function getStateWithAjax($district_id)
    {
        $ship = ShipState::where('district_id', $district_id)->orderBy('state_name', 'ASC')->get();
        return json_encode($ship);
    }

    public function ConfirmOrder(Request $request)
    {
        $request->validate([
            'shipping_name' => 'required|max:191',
            'division_id' => 'required',
            'district_id' => 'required',
            'state_id' => 'required',
            'shipping_email' => 'required | email',
            'shipping_phone' => 'required|numeric',
            'post_code' => 'required',
            'payment_method' => 'required',
        ]);

        $total_amount = Cart::total();

        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_id' => $request->state_id,
            'name' => $request->shipping_name,
            'email' => $request->shipping_email,
            'phone' => $request->shipping_phone,
            'post_code' => $request->post_code,
            'notes' => $request->notes,
            'payment_method' => $request->payment_method,
            'amount' => $total_amount,
            'invoice_no' => 'SPM' . mt_rand(10000000, 99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 0,
            'created_at' => Carbon::now(),
        ]);

        $carts = Cart::content();
        foreach ($carts as $cart) {
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'price' => $cart->price,
                'created_at' => Carbon::now(),
            ]);
        }

        //product stock decrement
        foreach ($carts as $pro) {
            Product::where('id', $pro->id)->decrement('product_qty', $pro->qty);
        }

        Cart::destroy();

        $notification = array(
            'message' => 'Your Order Place Success',
            'alert-type' => 'success'
        );
        return Redirect()->route('user.profile')->with($notification);
    }

    public function UserProfile()
    {
        $orders = Order::with('division', 'district', 'state')->where('user_id',Auth::user()->id)->get();
        $order_phone = Order::where('user_id',Auth::user()->id)->orderBy('id', 'DESC')->first();
        return view('frontend.user_profile', compact('orders','order_phone'));
    }

    public function SubcategoryProduct($id)
    {
        $subcategory = Subcategory::find($id);
        $products = Product::where('subcategory_id', $id)->get();
        $products_count = Product::where('subcategory_id', $id)->count();
        return view('frontend.subcategory_product', compact('products', 'subcategory','products_count'));
    }

    public function CategoryProduct($id)
    {
        $category = Category::find($id);
        $products = Product::where('category_id', $id)->get();
        $products_count = Product::where('category_id', $id)->count();
        return view('frontend.category_product', compact('products', 'category','products_count'));
    }

    public function UserProfileItems($id){
        $ordersItem =OrderItem::where('order_id',$id)->with('products')->get();
        return view('frontend.user_profile_details',compact('ordersItem'));
    }
}
