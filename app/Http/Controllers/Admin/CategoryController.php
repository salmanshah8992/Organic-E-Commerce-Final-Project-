<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use Carbon\carbon;
use Toastr;

class CategoryController extends Controller
{
    public function CategoryView(){
        $categorys = Category::all();
        return view('backend.category.view_category',compact('categorys'));
    }

    public function CategoryStore(Request $request){

        $request->validate([
            'cat_name_en' => 'required',
            'cat_name_bn' => 'required',
       ]);
       
        $category = new Category();
        $category->category_name_en = $request->cat_name_en;
        $category->category_name_bn = $request->cat_name_bn;
        $category->save();

        Toastr::success('Category added successfully :)','Success');
        return redirect()->back();
    }

    public function CategoryDelete($id){
        $categorys = Category::find($id)->delete();
        Toastr::success('Category deleted successfully :)','Success');
        return redirect()->back();
    }

    public function CategoryEdit($id){
        $category = Category::find($id);
        return view('backend.category.edit_category',compact('category'));
    }

    public function CategoryUpdate(Request $request){

        $request->validate([
            'cat_name_en' => 'required',
            'cat_name_bn' => 'required',
       ]);

        $cat_id = $request->category_id;

        Category::findOrFail($cat_id)->Update([
            'category_name_en' => $request->cat_name_en,
            'category_name_bn' => $request->cat_name_bn,
            'updated_at' => Carbon::now(),
        ]);
        
        Toastr::success('Category updated successfully :)','Success');
        return Redirect()->route('all.category');
    }
}
