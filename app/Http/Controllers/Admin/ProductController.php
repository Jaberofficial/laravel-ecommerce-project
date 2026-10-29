<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\GalleryImage;
use App\Models\Product;
use App\Models\Size;
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
            'gallery_image' => 'required|max:2048',
            

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


    //Add Colors..

    if(isset($request->color_name) && $request->color_name[0] != null)
    {
        foreach($request->color_name as $singleColor)
            {
                $color = new Color();

                $color->product_id = $product->id;
                $color->color_name = $singleColor;

                $color->save();
            }
    }
//Add Sizes..
    if(isset($request->size_name) && $request->size_name[0] != null)
    {
        foreach($request->size_name as $singleSize)
            {
                $size = new Size();

                $size->product_id = $product->id;
                $size->size_name = $singleSize;

                $size->save();
            }
    }

    //Gallery Images...


    if(isset($request->gallery_image))
    {
        foreach($request->gallery_image as $singleImage)
            {
                $galleryImage = new GalleryImage();

                $galleryImage->product_id = $product->id;
                
            $imageName = rand().'.'.$singleImage->getClientOriginalExtension(); //7348937.jpg
            $singleImage->move('admin/galleryImage', $imageName);

            $galleryImage->image = url('admin/galleryImage/'.$imageName); //http://127.0.0.1:8000/admin/category/7348937.jpg

            $galleryImage->save();

            }

    }

    toastr()->success('Product Created Successfully');
    return redirect()->back();
    }

    public function list()
    {
        $products = Product::orderBy('id', 'desc')->with('category', 'subcategory')->paginate(50);
       
        return view('admin.product.list', compact('products'));
    }

    public function changeStatus($id)
    {
        $product = Product::find($id);

        if($product->status == 'active')
            {
                $product->status = 'inactive';
            }
            else
                 {
                $product->status = 'active';
            }

            $product->save();
            return redirect()->back();
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->with('color', 'size', 'galleryImage')->first();
       
        $categories = Category::orderBy('name', 'asc')->get();
        $subcategories = SubCategory::orderBy('name', 'asc')->get();
        return view('admin.product.edit', compact('categories', 'subcategories', 'product'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku_code' => 'nullable|unique:products,sku_code,'.$id,
            'cat_id' => 'required|integer',
            'subcat_id' => 'nullable|integer',
            'buying_price' => 'required',
            'regular_price' => 'required',
            'qty' => 'required|integer',
            'product_type' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'image|max:2048',
            'gallery_image' => '|max:2048',
            

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

        'image.max' => 'Image size cannot exceed 2 MB.',
        ]);

        $product = Product::find($id);
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
                    if($product->image && file_exists('admin/product/'.basename($product->image)))
    {
unlink('admin/product/'.basename($product->image));
 }
            $image = $request->file('image');
            $imageName = rand().'.'.$image->getClientOriginalExtension(); //7348937.jpg
            $image->move('admin/product', $imageName);

            $product->image = url('admin/product/'.$imageName); //http://127.0.0.1:8000/admin/category/7348937.jpg
    }

    $product->save();


  
// Add Colors..
if (isset($request->color_name)) {

    $colors = array_filter($request->color_name, function ($colorName) {
        return $colorName !== null && trim($colorName) !== '';
    });

    Color::where('product_id', $id)->delete();

    foreach ($colors as $singleColor) {

        $color = new Color();

        $color->product_id = $product->id;
        $color->color_name = trim($singleColor);

        $color->save();
    }
}
// Add Sizes..
if (isset($request->size_name)) {

    Size::where('product_id', $id)->delete();

    foreach ($request->size_name as $singleSize) {

        if ($singleSize != null && trim($singleSize) != '') {

            $size = new Size();

            $size->product_id = $product->id;
            $size->size_name = trim($singleSize);

            $size->save();
        }
    }
}
    //Gallery Images...


    if(isset($request->gallery_image))
    {
        $oldImages =  GalleryImage::where('product_id', $id)->get();
        foreach($oldImages as $singleOldImage)
            {
                if ($singleOldImage->image && file_exists('admin/galleryImage/' . basename($singleOldImage->image))) {
                    unlink('admin/galleryImage/' . basename($singleOldImage->image));
                }
                 $singleOldImage->delete();
            }
        foreach($request->gallery_image as $singleImage)
            {
                $galleryImage = new GalleryImage();

                $galleryImage->product_id = $product->id;
                
            $imageName = rand().'.'.$singleImage->getClientOriginalExtension(); //7348937.jpg
            $singleImage->move('admin/galleryImage', $imageName);

            $galleryImage->image = url('admin/galleryImage/'.$imageName); //http://127.0.0.1:8000/admin/category/7348937.jpg

            $galleryImage->save();

            }

    }

    toastr()->success('Product Updated Successfully');
    return redirect()->back();
    
    }

    public function delete($id)
    {
        $product = Product::find($id);

        Color::where('product_id', $id)->delete();
         Size::where('product_id', $id)->delete();


         $oldImages =  GalleryImage::where('product_id', $id)->get();
        foreach($oldImages as $singleOldImage)
            {
                if ($singleOldImage->image && file_exists('admin/galleryImage/' . basename($singleOldImage->image))) {
                    unlink('admin/galleryImage/' . basename($singleOldImage->image));
                }
                 


    }

    GalleryImage::where('product_id', $id)->delete();

    if($product->image && file_exists('admin/product/'.basename($product->image)))
    {
unlink('admin/product/'.basename($product->image));
 }

 $product->delete();
     toastr()->success('Product Deleted Successfully');
    return redirect()->back();

}

}
