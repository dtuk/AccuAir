<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Product;

   
class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {

        return view('stripe');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {


        $total = 0.0;
        foreach (session()->get('cart') as $i => $cart){
            $total = (double) $cart['price'] * (int) $cart['quantity'];
        }


        Stripe\Stripe::setApiKey("sk_test_cQLq5PIwrddJM7RV6drAZKLs00k57KiueJ");
        Stripe\Charge::create ([
                "amount" => $total * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment "
        ]);
  
        Session::flash('success', 'Payment successful!');

        return redirect()->to('/products');    }
}
