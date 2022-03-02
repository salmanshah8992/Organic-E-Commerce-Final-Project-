<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Subcategory;
use App\Models\Admin\Category;
use App\Models\Admin\MultiImg;
use App\Models\Admin\slider;
use App\Models\Admin\Product;

class IndexController extends Controller
{
    public function index()
    {
        $categorys = Category::all();
        $sliders = Slider::all();
        $lates_products = Product::orderBy('id', 'DESC')->limit(5)->get();
        $hot_deals = Product::where('hot_deals', '1')->limit(2)->get();
        return view('frontend.index', compact('sliders', 'categorys', 'lates_products', 'hot_deals'));
    }

    // details of a product
    public function ProductDetails($id)
    {
        $product_detail = Product::with('multiImage')->find($id);
        $categorys = Category::all();
        $product_multi = MultiImg::where('product_id', $id)->get();
        return view('frontend.product_details', compact('product_detail', 'categorys', 'product_multi'));
    }

    // view of a product modal using ajax
    public function productViewAjax($id)
    {
        $product = Product::with('category')->findOrFail($id);
        $color = $product->product_color_en;
        $product_color = explode(',', $color);
        $size = $product->product_size_en;
        $produt_size = explode(',', $size);

        return response()->json([
            'product' => $product,
            'color' => $product_color,
            'size' => $produt_size,
        ]);
    }
}
