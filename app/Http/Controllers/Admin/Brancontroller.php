<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Brand;
use Carbon\carbon;
use Image;
use Toastr;

class Brancontroller extends Controller
{
    public function BrandView(){
        $brands = Brand::all();
        return view('backend.brand.view_brand',compact('brands'));
    }

     // store brand
   public function BrandAdd(Request $request){

    $request->validate([
         'brand_name_en' => 'required',
         'brand_name_bn' => 'required',
         'brand_slug_en' => 'required',
         'brand_slug_bn' => 'required',
         'brand_image' => 'required',
    ],[
        'brand_name_en.required' => 'input English brand name',
        'brand_name_bn.required' => 'input bangla brand name'
    ]);

    $image = $request->file('brand_image');
    $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(870,370)->save('uploads/brand/'.$name_gen);
    $save_url = 'uploads/brand/'.$name_gen;

         Brand::insert([
             'brand_name_en' => $request->brand_name_en,
             'brand_name_bn' => $request->brand_name_bn,
             'brand_slug_en' => strtolower(str_replace(' ','-',$request->brand_name_en)),
             'brand_slug_bn' => str_replace(' ','-',$request->brand_name_bn),
             'brand_image' => $save_url,
             'created_at' => Carbon::now(),
         ]);

        Toastr::success('Brand added successfully:)','Success');
        return Redirect()->back();

    }

    public function BrandEdit($id){
        $brand = Brand::find($id);
        return view('backend.brand.edit_brand',compact('brand'));
    }

    public function BrandUpdate(Request $request){
        $brand_id = $request->id;
        $old_img = $request->old_img;

        if ($request->file('brand_image')) {
             unlink($old_img);
             $image = $request->file('brand_image');
             $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
             Image::make($image)->resize(166,110)->save('uploads/brand/'.$name_gen);
             $save_url = 'uploads/brand/'.$name_gen;

             Brand::findOrFail($brand_id)->update([
                 'brand_name_en' => $request->brand_name_en,
                 'brand_name_bn' => $request->brand_name_bn,
                 'brand_slug_en' => strtolower(str_replace(' ','-',$request->brand_name_en)),
                 'brand_slug_bn' => str_replace(' ','-',$request->brand_name_bn),
                 'brand_image' => $save_url,
                 'created_at' => Carbon::now(),
             ]);

              Toastr::success('Brand updated successfully:)','Success');
              return Redirect()->route('all.brand');

            }else {
            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_bn' => $request->brand_name_bn,
                'brand_slug_en' => strtolower(str_replace(' ','-',$request->brand_name_en)),
                'brand_slug_bn' => str_replace(' ','-',$request->brand_name_bn),
                'created_at' => Carbon::now(),
            ]);

              Toastr::success('Brand updated successfully:)','Success');
              return Redirect()->route('all.brand');
            }
    }

    public function BrandDelete($brand_id){
        $brand = Brand::findOrFail($brand_id);
        $img = $brand->brand_image;
        unlink($img);
        Brand::findOrFail($brand_id)->delete();
        Toastr::success('Brand deleted successfully:)','Success');
        return Redirect()->back();
    }


}
