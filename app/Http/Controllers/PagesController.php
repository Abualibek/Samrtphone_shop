<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Smartphones;
use App\Models\smartphone_specifications;
use App\Models\buyers;
use Illuminate\Routing\Controller as BaseController;
use Braintree\Gateway;
use Gloudemans\Shoppingcart\Facades\Cart;



class PagesController extends BaseController
{
  
  public function welcome(){
    $single = smartphone_specifications::all();
    return view('welcome', ['single' => $single]);
    
  }
 
  public function individual($id){
    $individual = smartphone_specifications::findOrFail($id);
      return view('individual', ['individual' => $individual]);
      }
      
    public function about(){
        return view('about');
      }
      
      public function brand(){
        $brand = smartphone_specifications::all();
        return view('brand', ['brand' => $brand]);
      }
      public function special(){
        return view('special');
      }
      
      public function contact(){
        return view('contact');
      }
  
  
      public function storeBuyer(){
        $buyers = new buyers();

        $buyers->firstName = request('firstName');
        $buyers->lastName = request('lastName');
        $buyers->address = request('address');
        $buyers->city = request('city');
        $buyers->postcode = request('postcode');
        $buyers->county = request('county');
        $buyers->region = request('region');
        $buyers->phone = request('phone');
        $buyers->email = request('email');
         
        $buyers->save();
  
        return view('/buyer/index')->with('mssg', 'Thank you for your order!');
      }
    
}
?>