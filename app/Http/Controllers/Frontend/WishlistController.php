<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Wishlist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function ViewWishlist()
    {
        return view('frontend.view_wishlist');
    }

    // get all product from wishlist table
    public function GetWishlist()
    {
        $wishlist = Wishlist::with('product')->where('user_id', Auth::id())->latest()->get();
        return response()->json($wishlist);
    }

    // remove wishlist
    public function DestoryWishlist($id)
    {
        Wishlist::where('user_id', Auth::id())->where('id', $id)->delete();
        return response()->json(['success' => 'Sucessfully Product Remove']);
    }
}
