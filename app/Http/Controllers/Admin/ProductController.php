<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\MultiImg;
use App\Models\Admin\Category;
use App\Models\Admin\Brand;
use App\Models\Admin\Subcategory;
// use Intervention\Image\Facades\Image;
use Image;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProductController extends Controller
{
    //
    public function ProductAdd()
    {
        $categories = Category::latest()->get();
        $brands = Brand::all();
        $subcats = Subcategory::latest()->get();
        return view('backend.product.add_product', compact('categories', 'brands', 'subcats'));
    }

    /// store product
    public function ProductStore(Request $request)
    {
        // validation
        $request->validate([
            'brand_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'product_name_en' => 'required',
            'product_qty'  => 'required',
        ]);

        //  img upload and save
        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(600, 600)->save('uploads/products/thambnail/' . $name_gen);
        $save_url = 'uploads/products/thambnail/' . $name_gen;

        $product_id =  Product::insertGetId([
            'user_id' => Auth::id(),
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_name_bn' => $request->product_name_bn,
            'product_slug_bn' => str_replace(' ', '-', $request->product_name_bn),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_bn' => $request->product_tags_bn,
            'product_size_en' => $request->product_size_en,
            'product_size_bn' => $request->product_size_bn,
            'product_color_en' => $request->product_color_en,
            'product_color_bn' => $request->product_color_bn,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_bn' => $request->short_descp_bn,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_bn' => $request->long_descp_bn,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'product_thambnail' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(),


        ]);

        //////////////////// Multiple image uplod start /////////////////////////////////

        $images = $request->file('multi_img');
        foreach ($images as $img) {
            //  $make_name=hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            //  Image::make($img)->resize(917,1000)->save('uploads/products/multi-image/'.$make_name);
            //  $uplodPath = 'uploads/products/multi-image/'.$make_name;
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(600, 600)->save('uploads/products/multi-image/' . $make_name);
            $uplodPath = 'uploads/products/multi-image/' . $make_name;

            MultiImg::insert([
                'product_id' => $product_id,
                'photo_name' => $uplodPath,
                'created_at' => Carbon::now(),
            ]);
        }
        //////////////////// Multiple image uplod End /////////////////////////////////


        $notification = array(
            'message' => 'Product Added Success',
            'alert-type' => 'success'
        );
        return Redirect()->route('view.product')->with($notification);
    }

    // manage product
    public function ProductView()
    {
        $products = Product::latest()->get();
        return view('backend.product.view_product', compact('products'));
    }

    // edit product
    public function ProductEdit($product_id)
    {
        $product = Product::findOrFail($product_id);
        //  dd($request-> $product->id);
        $categories = Category::latest()->get();
        $Subcategories = Subcategory::latest()->get();
        $brands = Brand::latest()->get();
        $multiImgs = MultiImg::where('product_id', $product_id)->latest()->get();
        return view('backend.product.edit_product', compact('product', 'categories', 'brands', 'multiImgs', 'Subcategories'));
    }

    // product update without image
    public function ProductUpdate(Request $request)
    {
        //  dd($request->all());
        // validation
        $request->validate([
            'brand_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'product_name_en' => 'required',
            'product_qty'  => 'required',
        ]);
        $product_id = $request->product_id;

        Product::findOrFail($product_id)->update([
            'user_id' => Auth::id(),
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_slug_en' => strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_name_bn' => $request->product_name_bn,
            'product_slug_bn' => str_replace(' ', '-', $request->product_name_bn),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_bn' => $request->product_tags_bn,
            'product_size_en' => $request->product_size_en,
            'product_size_bn' => $request->product_size_bn,
            'product_color_en' => $request->product_color_en,
            'product_color_bn' => $request->product_color_bn,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_bn' => $request->short_descp_bn,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_bn' => $request->long_descp_bn,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Update Success',
            'alert-type' => 'success'
        );
        return Redirect()->route('view.product')->with($notification);
    }


    /////////////// product main thambnail update ////////////////////
    public function thambnailUpdate(Request $request)
    {
        $pro_id = $request->product_id;
        //  dd($request->$pro_id);
        $oldImage = $request->old_img;
        unlink($oldImage);

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(600, 600)->save('uploads/products/thambnail/' . $name_gen);
        $save_url = 'uploads/products/thambnail/' . $name_gen;

        Product::findOrFail($pro_id)->update([
            'product_thambnail' => $save_url,
            'updated_at' => Carbon::now(),

        ]);


        $notification = array(
            'message' => 'Product Thambnail Update Success',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    /// multiple image update =============================

    public function multiImagUpdate(Request $request)
    {
        $imgs = $request->multiImg;
        foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(600, 600)->save('uploads/products/multi-image/' . $make_name);
            $uplodPath = 'uploads/products/multi-image/' . $make_name;

            MultiImg::where('id', $id)->update([
                'photo_name' => $uplodPath,
                'updated_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Product Image Update Success',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    ////////////////////// Multi Image Delete ////////////////
    public function multiImageDelete($id)
    {
        $oldimg = MultiImg::findOrFail($id);
        unlink($oldimg->photo_name);
        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Image Dlete Success',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    /////////////// product active and inactiv

    public function inactive($id)
    {
        Product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Product Inactivated',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function active($id)
    {
        Product::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Product Activated',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    // delete product
    public function ProductDelete($product_id)
    {
        $product = Product::findOrFail($product_id);
        unlink($product->product_thambnail);
        Product::findOrFail($product_id)->delete();
        $images = MultiImg::where('product_id', $product_id)->get();
        foreach ($images as $img) {
            unlink($img->photo_name);
            MultiImg::where('product_id', $product_id)->delete();
        }

        $notification = array(
            'message' => 'Product Deleted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
