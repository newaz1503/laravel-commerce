<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller

{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|min:2'
        ]);
        $product = new Product();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/images/product/', $imageName);
            $product->image = $imageName;
        }
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->short_description = $request->short_description;
        $product->description = $request->long_description;
        $product->original_price = $request->original_price;
        $product->selling_price = $request->selling_price;
        $product->quantity = $request->quantity;
        $product->tax = $request->tax;
        $product->status = $request->status == true ? '1' : '0';
        $product->trending = $request->trending == true ? '1' : '0';
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keywords = $request->meta_keywords;
        $product->save();
        Toastr::success('Success', 'Product Store Successfully');
        return redirect()->route('admin.product');

    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|min:2'
        ]);
        $product = Product::findOrFail($id);
        if ($request->hasFile('image')) {
            if (File::exists('uploads/images/product/'.$product->image)){
                File::delete('uploads/images/product/'.$product->image);
            }
            $image = $request->file('image');
            $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/images/product/', $imageName);
            $product->image = $imageName;
        }else{
            $imageName = $product->image;
        }
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->short_description = $request->short_description;
        $product->description = $request->long_description;
        $product->original_price = $request->original_price;
        $product->selling_price = $request->selling_price;
        $product->quantity = $request->quantity;
        $product->tax = $request->tax;
        $product->status = $request->status == true ? '1' : '0';
        $product->trending = $request->trending == true ? '1' : '0';
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keywords = $request->meta_keywords;
        $product->save();
        Toastr::success('Success', 'Product Updated Successfully');
        return redirect()->route('admin.product');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image) {
            if (File::exists('uploads/images/product/' .$product->image)) {
                File::delete('uploads/images/product/' .$product->image);
            }
        }
        $product->delete();
        Toastr::success('Success', 'Product Deleted Successfully');
        return redirect()->back();
    }

}


