<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Coupon;
use Carbon\carbon;
use Toastr;

class CouponController extends Controller
{
    public function CouponView(){
        $Coupons = Coupon::all();
        return view('backend.coupon.view_coupon',compact('Coupons'));
    }

    public function CouponAdd(Request $request){
        $request->validate([
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required',
        ]);

        Coupon::insert([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(),
        ]);

        Toastr::success('Coupon added successfully:)','Success');
        return Redirect()->back();
    }

    //edit
    public function CouponEdit($coupon_id){
        $coupon= Coupon::findOrFail($coupon_id);
        return view('backend.coupon.edit_coupon',compact('coupon'));
    }

    //update
    public function CouponUpdate(Request $request){
        $coupon_id = $request->id;
        $request->validate([
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required',
        ]);

        Coupon::findOrFail($coupon_id)->update([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'updated_at' => Carbon::now(),
        ]);

        Toastr::success('Coupon updated successfully:)','Success');
        return Redirect()->route('all.coupon');
    }

    //destroy
    public function CouponDelete($coupon_id){
        Coupon::findOrFail($coupon_id)->delete();
        Toastr::success('Coupon deleted successfully:)','Success');
        return Redirect()->back();
    }
}
