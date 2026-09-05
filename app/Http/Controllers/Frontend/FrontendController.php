<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
   public function index()
   {
    return view ('frontend.index');
   }

   public function productDetails()
   {
    return view ('frontend.product-details');
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

