<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\Subcategory;
use Carbon\Carbon;
use Toastr;

class SubcategoryController extends Controller
{
    public function SubCategoryView(){
        $subcategories = Subcategory::latest()->get();
        // dd($subcategories);
        $category = Category::orderBy('category_name_en','ASC')->get();
        return view('backend.subcategory.subcategory_view',compact('category','subcategories'));
    }


    // store data in database
    public function SubCategoryStore(Request $request){

        $request->validate([
            'cat_name_en' => 'required',
            'cat_name_bn' => 'required',
        ]);

        Subcategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->cat_name_en,
            'subcategory_name_bn' => $request->cat_name_bn,
            'created_at' => Carbon::now(),
           ]);

        Toastr::success('SubCategory deleted successfully :)','Success');
        return Redirect()->back();
    }

    // edit subcategory
    public function SubCategoryEdit($subcat_id){
        $subcategory = Subcategory::findOrFail($subcat_id);
        $category = Category::orderBy('category_name_en','ASC')->get();
        return view('backend.subcategory.subcategory_edit',compact('subcategory','category'));
    }

    // //subcategory update
    public function SubCategoryUpdate(Request $request){

        $subcat_id = $request->category_id;

        Subcategory::findOrFail($subcat_id)->Update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->cat_name_en,
            'subcategory_name_bn' => $request->cat_name_bn,
            'updated_at' => Carbon::now(),
           ]);

        Toastr::success('SubCategory updated successfully :)','Success');
        return Redirect()->route('all.subcategory');
    }

    //delet subcategory
    public function SubCategoryDelete($subcat_id){

        Subcategory::findOrFail($subcat_id)->delete();
        Toastr::success('SubCategory updated successfully :)','Success');

        return Redirect()->back();

    }

}
