<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\WebsitePolicy;

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
      $privacyPolicy = WebsitePolicy::select('privacy_policy')->first();
      return view('frontend.privacy-policy',compact('privacyPolicy'));
   }

   public function termsConditions()
   {
      $termsConditions = WebsitePolicy::select('terms_conditions')->first();
      return view('frontend.terms-conditions',compact('termsConditions'));
   }

      public function refundPolicy()
   {
      $refundPolicy = WebsitePolicy::select('refund_policy')->first();
      return view('frontend.refund-policy',compact('refundPolicy'));
   }

      public function paymentPolicy()
   {
      $paymentPolicy = WebsitePolicy::select('payment_policy')->first();
      return view('frontend.payment-policy',compact('paymentPolicy'));
   }

      public function aboutUs()
   {
      $aboutUs = WebsitePolicy::select('about_us')->first();
      return view('frontend.about-us',compact('aboutUs'));
   }

   public function contactUs()
   {
      return view('frontend.contact-us');
   }

   public function contactMessageStore(Request $request)
   {
      $contactMessage = new ContactMessage();

      $contactMessage->name = $request->name;
      $contactMessage->phone = $request->phone;
      $contactMessage->email = $request->email;
      $contactMessage->subject = $request->subject;
      $contactMessage->message = $request->message;

      $contactMessage->save();
      
      toastr()->success('Message is Sent Successfully.');
      return redirect()->back();

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

