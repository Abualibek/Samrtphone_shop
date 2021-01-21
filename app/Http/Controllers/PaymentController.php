<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\smartphone_specifications;
use App\Models\buyers;
use Illuminate\Routing\Controller as BaseController;

class PaymentController extends Controller
{
  // public function checkout($id){
  //   $checkout = smartphone_specifications::findOrFail($id);
  //   //return view('checkout', ['checkout' => $checkout]);

  //   $gateway = new \Braintree\Gateway([
  //     'environment' => 'sandbox',
  //     'merchantId' => 'yzgkw3jpxhm3r9js',
  //     'publicKey' => 'g44hbd3v29tp4ndx',
  //     'privateKey' => '83ebb8fd590d8c2c9fbdb2aaa7bf63cd'
  // ]);

  // $paypalToken = $gateway->ClientToken()->generate();

  //   return view('checkout', ['checkout' => $checkout])->with(['paypalToken' => $paypalToken]);

    
  // }
}
