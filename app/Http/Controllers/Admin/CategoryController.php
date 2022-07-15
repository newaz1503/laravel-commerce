<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id', 'desc')->get();
        return view('admin.category.index', compact('categories'));
    }

    public function create(){
        return view('admin.category.create');
    }
    public function store(Request $request){
        $this->validate($request, [
           'name' => 'required|string|min:2'
        ]);
        $category = new Category();
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('uploads/images/category/',$imageName);
            $category->image = $imageName;
        }
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->description = $request->description;
        $category->status = $request->status == true ? '1' : '0';
        $category->popular = $request->popular == true ? '1' : '0';
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;
        $category->save();
        Toastr::success('Success', 'Category Store Successfully');
        return redirect()->route('admin.category');

    }
    public function edit($id){
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }
    public function update(Request $request, $id){
        $category = Category::findOrFail($id);
        if ($request->hasFile('image') && !empty($request->file('image'))){
            if (File::exists('uploads/images/category/'.$category->image)){
                File::delete('uploads/images/category/'.$category->image);
            }

            $image = $request->file('image');
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('uploads/images/category/',$imageName);
        }else{
            $imageName = $category->image;
        }
        $category->image = $imageName;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->description = $request->description;
        $category->status = $request->status == true ? '1' : '0';
        $category->popular = $request->popular == true ? '1' : '0';
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;
        $category->save();
        Toastr::success('Success', 'Category Updated Successfully');
        return redirect()->route('admin.category');
    }
    public function destroy($id){
        $category = Category::findOrFail($id);
        if ($category->image){
            if (File::exists('uploads/images/category/'.$category->image)){
                File::delete('uploads/images/category/'.$category->image);
            }
        }
        $category->delete();
        Toastr::success('Success', 'Category Deleted Successfully');
        return redirect()->back();
    }

}
