<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;


class FrontendController extends Controller
{
   public function index()
   {
    $hotProducts = Product::where('status', 'active')->where('product_type', 'hot')->paginate(20);
    $newProducts = Product::where('status', 'active')->where('product_type', 'new')->paginate(20);
    $regulartProducts = Product::where('status', 'active')->where('product_type', 'regular')->paginate(20);
    $discountProducts = Product::where('status', 'active')->where('product_type', 'discount')->paginate(20);
   $homeCategories = Category::get();
    return view ('frontend.index', compact('hotProducts', 'newProducts', 'regulartProducts','discountProducts', 'homeCategories' ));
   }

   public function productDetails($id)
   {
      $product = Product::with('color', 'size', 'galleryImage', 'review')->where('id', $id)->first();
      $detailsPageCategory = Category::get();
    return view ('frontend.product-details', compact('product', 'detailsPageCategory'));
   }
   public function shopProducts()
   {
      return view('frontend.shop');
   }

   public function privacyPolicy()
   {
      return view('frontend.privacy-policy');
   }

   public function termsConditions()
   {
      return view('frontend.terms-conditions');
   }

      public function refundPolicy()
   {
      return view('frontend.refund-policy');
   }

      public function paymentPolicy()
   {
      return view('frontend.payment-policy');
   }

      public function aboutUs()
   {
      return view('frontend.about-us');
   }

   public function contactUs()
   {
      return view('frontend.contact-us');
   }

   public function viewCart()
   {
      return view('frontend.view-cart');
   }

   public function checkOut()
   {
      return view('frontend.checkout');
   }

   public function orderConfirmation()
   {
      return view('frontend.thankyou');
   }

   public function categoryProduct()
   {
      return view('frontend.category-product');
   }
   public function subCategoryProduct()
   {
      return view('frontend.sub-category-product');
   }

   public function typeProducts()
   {
      return view('frontend.type-products');
   }
}

