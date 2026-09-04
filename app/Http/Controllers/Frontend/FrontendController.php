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
}

