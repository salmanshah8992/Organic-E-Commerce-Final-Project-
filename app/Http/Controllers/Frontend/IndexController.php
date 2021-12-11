<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Subcategory;
use App\Models\Admin\Category;
use App\Models\Admin\slider;

class IndexController extends Controller
{
    public function index(){
        $categorys = Category::all();
        $sliders = Slider::all();
        return view('frontend.index',compact('sliders','categorys'));
    }
}
