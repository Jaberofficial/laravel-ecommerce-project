<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $subcategories = SubCategory::orderBy('name', 'asc')->get();
        return view('admin.product.create',compact('categories', 'subcategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku_code' => 'nullable|unique:products,sku_code',
            'cat_id' => 'required|integer',
            'subcat_id' => 'nullable|integer',
            'buying_price' => 'required',
            'regular_price' => 'required',
            'qty' => 'required|integer',
            'product_type' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|max:2048',
            

        ],[
             'name.required' => 'Product name is required.',
        'name.max' => 'Product name cannot exceed 255 characters.',

        'sku_code.unique' => 'This SKU code already exists.',

        'cat_id.required' => 'Please select a category.',
        'cat_id.integer' => 'Please select a valid category.',

        'subcat_id.integer' => 'Please select a valid subcategory.',

        'buying_price.required' => 'Buying price is required.',
        'buying_price.numeric' => 'Buying price must be a number.',

        'regular_price.required' => 'Regular price is required.',
        'regular_price.numeric' => 'Regular price must be a number.',

        'qty.required' => 'Quantity is required.',
        'qty.integer' => 'Quantity must be a whole number.',

        'product_type.required' => 'Product type is required.',
        'product_type.string' => 'Product type must be valid.',
        'product_type.max' => 'Product type cannot exceed 255 characters.',

        'description.required' => 'Product description is required.',
        'description.string' => 'Product description must be valid.',

        'image.required' => 'Please upload a product image.',
        'image.image' => 'The file must be an image.',
        'image.max' => 'Image size cannot exceed 2 MB.',
        ]);


        $product = new Product();

        $product->name = $request->name;
        $product->slug = Str::slug( $request->name);
        $product->sku_code = $request->sku_code;
        $product->cat_id = $request->cat_id;
        $product->subcat_id = $request->subcat_id;
        $product->buying_price = $request->buying_price;
        $product->regular_price = $request->regular_price;
        $product->discount_price = $request->discount_price;
        $product->qty = $request->qty;
        $product->product_type = $request->product_type;
        $product->description = $request->description;
        $product->product_policy = $request->product_policy;

                if (isset($request->image)){
            $image = $request->file('image');
            $imageName = rand().'.'.$image->getClientOriginalExtension(); //7348937.jpg
            $image->move('admin/product', $imageName);

            $product->image = url('admin/product/'.$imageName); //http://127.0.0.1:8000/admin/category/7348937.jpg
    }

    $product->save();

    toastr()->success('Product Created Successfully');
    return redirect()->back();
    }
}
