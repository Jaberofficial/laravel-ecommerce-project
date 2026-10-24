<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
   public function dashboard()
    {
        return view('customer.customer-dashboard');
    }
    public function customerLogout()
    {
        Auth::logout();
        return redirect('/customer/login');
    }

    public function customerProfileView()
    {
        $authUser = Auth::user();
        return view('customer.profile.profile-view', compact('authUser'));
    }

    public function customerProfileUpdate(Request $request)
    {
         $authUserId = Auth::user()->id;
         $authUser = User::find($authUserId);
         
         $authUser->name = $request->name;
         $authUser->phone = $request->phone;

         if(isset($request->image)){

          if($authUser->image && file_exists('customer/profile/'.basename($authUser->image)))
    {
unlink('customer/profile/'.basename($authUser->image));
 }

            $image = $request->file('image');
            $imageName = rand().'.'.$image->getClientOriginalExtension();$image->move('customer/profile',$imageName);

            $authUser->image = url('customer/profile/'.$imageName);

         }

         $authUser->save();

         toastr()->success('Profile Updated Successfully.');
         return redirect()->back();

    }

    public function customerCredentialView()
    {
        $authUser = Auth::user();
        return view('customer.profile.credential-view', compact('authUser'));
    }

    public function customerCredentialUpdate(Request $request)
    {
       $authUserId = Auth::user()->id;

        $authUser = User::find($authUserId);

        if(isset($request->email))
            {
                $authUser->email = $request->email;
            }

            if(isset($request->old_password) && isset($request->password))
                {
                    if(Hash::check($request->old_password, $authUser->password))
                        {
                            $authUser->password = Hash::make($request->password);

                        }
                        else
                        {
                            toastr()->error("Old Password Doesn't Match");
                            return redirect()->back();

                        }
                }

                $authUser->save();
                Auth::logout();

                toastr()->success("Credential Updated Successfully");

                return redirect()->back();
    }
}
