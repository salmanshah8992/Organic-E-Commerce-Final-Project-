<?php

namespace App\Http\Controllers;

use App\Models\Admin\Brand;
use App\Models\Banner;
use Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class BannerController extends Controller
{
    public function BannerView(){
        $banners= Banner::all();
        return view('backend.banner.view_banner',compact('banners'));
    }

    public function BannerAdd(Request $request){

        $request->validate([
             'banner' => 'required',
        ]);

        $image = $request->file('banner');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870,370)->save('uploads/banner/'.$name_gen);
        $save_url = 'uploads/banner/'.$name_gen;

             Banner::insert([
                 'banner' => $save_url,
                 'created_at' => Carbon::now(),
             ]);

            Toastr::success('Banner added successfully:)','Success');
            return Redirect()->back();

        }


    public function BannerDelete($brand_id){
        Banner::findOrFail($brand_id)->delete();
        Toastr::success('Banner deleted successfully:)','Success');
        return Redirect()->back();
    }
}
