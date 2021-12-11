<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Notifications\Notification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Slider;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Toastr;

class SliderController extends Controller
{
    public function SliderView(){
        $sliders = Slider::latest()->get();
        return view('backend.slider.view_slider',compact('sliders'));
    }

     // slider store
   public function SliderStore(Request $request){

    $request->validate([
        'title_name_en' => 'required',
        'title_name_bn' => 'required',
        'description_name_en' => 'required',
        'description_name_bn' => 'required',
        'slider_image' => 'required',
    ]);

    $image = $request->file('slider_image');

    // dd($image);

    $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(870,370)->save('uploads/slider/'.$name_gen);
    $save_url = 'uploads/slider/'.$name_gen;
        Slider::insert([
            'title_en' => $request->title_name_en,
            'title_bn' => $request->title_name_bn,
            'description_en' => $request->description_name_en,
            'description_bn' => $request->description_name_bn,
            'image' => $save_url,
            'created_at' => Carbon::now(),
        ]);


        Toastr::success('Slider added successfully:)','Success');
        return Redirect()->back();
   }

    // edit slider
    public function SliderEdit($id){
        $slider = Slider::findOrFail($id);
        return view('backend.slider.edit_slider',compact('slider'));
    }

    public function SliderUpdate(Request $request){

        // dd($request->all());

        $id = $request->id;
        $old_img = $request->old_img;

        if ($request->file('image')) {
             unlink($old_img);
             $image = $request->file('image');
             $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
             Image::make($image)->resize(870,370)->save('uploads/slider/'.$name_gen);
             $save_url = 'uploads/slider/'.$name_gen;

             Slider::findOrFail($id)->update([
                'title_en' => $request->title_name_en,
                'title_bn' => $request->title_name_bn,
                'description_en' => $request->description_name_en,
                'description_bn' => $request->description_name_bn,
                'image' => $save_url,
                'updated_at' => Carbon::now(),
             ]);

             return Redirect()->route('sliders')->with($notification);
        }else {
            Slider::findOrFail($id)->update([
                'title_en' => $request->title_name_en,
                'title_bn' => $request->title_name_bn,
                'description_en' => $request->description_name_en,
                'description_bn' => $request->description_name_bn,
                'created_at' => Carbon::now(),
             ]);

             Toastr::success('Slider updated successfully:)','Success');
             return Redirect()->route('all.sliders');
        }
       }

   public function SliderDelete($id){

        $oldimg = Slider::findOrFail($id);
        unlink($oldimg->image);
        Slider::findOrFail($id)->delete();
        Toastr::success('Slider deleted successfully:)','Success');
        return Redirect()->back();

    }
}
