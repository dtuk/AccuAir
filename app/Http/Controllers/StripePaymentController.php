<?php
   
namespace App\Http\Controllers;
   
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Session;
use Stripe\Customer;
use Stripe\Error\Card;
use Stripe\Stripe;
use App\Product;

   
class StripePaymentController extends Controller
{


    /**
     * Store a order.
     *
     * @param Investment $investment
     * @return redirect()
     */
    /*public function postStorePayment()
    {

        return redirect()->route('investment.index')
            ->with('msg', 'Thanks for your deposit');
    }*/


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
        $total *= 100;
        $total = round($total, 2);

        $order = Order::findOrFail($request->input('order_id'));

        return $this->chargeCustomer($total, $request->input('stripeToken'), $order);

        /*
4242 4242 4242 4242

        */
        /*Stripe\Stripe::setApiKey("sk_test_cQLq5PIwrddJM7RV6drAZKLs00k57KiueJ");
        Stripe\Charge::create ([
                "amount" => $total * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment "
        ]);
  
        Session::flash('success', 'Payment successful!');

//        $invoices = auth()->user()->invoices();
//        return view('invoices', ['invoices' => $invoices]);

       return redirect()->to('/products');*/
    }

    /**
     * Charge a Stripe customer.
     *
     * @var Stripe\Customer $customer
     * @param integer $product_id
     * @param integer $product_price
     * @param string $product_name
     * @param string $token
     * @return createStripeCharge()
     */
    public function chargeCustomer($total, $token, Order $order)
    {
        Stripe::setApiKey('sk_test_cQLq5PIwrddJM7RV6drAZKLs00k57KiueJ');
        if (!$this->isStripeCustomer())
        {
            $customer = $this->createStripeCustomer($token);
        }
        else
        {
            $customer = Customer::retrieve(auth()->user()->stripe_id);
        }
        return $this->createStripeCharge($total, $customer, $order);
    }
    /**
     * Create a Stripe charge.
     *
     * @var Stripe\Charge $charge
     * @var Stripe\Error\Card $e
     * @param integer $product_id
     * @param integer $product_price
     * @param string $product_name
     * @param Customer $customer
     * @return postStorePayment()
     */
    public function createStripeCharge($total, $customer, Order $order)
    {

        try {
            $charge = auth()->user()->invoiceFor("Payment  of order: ".$order->id, $total, [
//                "amount" => $total,
                "currency" => "usd",
                "customer" => $customer->id,
                "description" => "Product purchase at: ".date('Y-m-d h:i:s'),
            ]);
            /*$charge = \Stripe\Charge::create(array(
                "amount" => $investment->amount,
                "currency" => "usd",
                "customer" => $customer->id,
                "description" => $investment->description
            ));*/
        } catch(Card $e) {
            Session::flash('error', 'Your credit card was been declined. Please try again or contact us.');
            return redirect()
                ->route('stripe')
                ->with('error', 'Your credit card was been declined. Please try again or contact us.');
        }
        return $this->postStorePayment($order);
    }
    /**
     * Create a new Stripe customer for a given user.
     *
     * @var Customer $customer
     * @param string $token
     * @return Customer $customer
     */
    public function createStripeCustomer($token)
    {

        Stripe::setApiKey('sk_test_cQLq5PIwrddJM7RV6drAZKLs00k57KiueJ');
        $customer = Customer::create([
            'description' => auth()->user()->email,
            'source' => $token
        ]);
        auth()->user()->stripe_id = $customer->id;
        auth()->user()->save();

        // remove cart session

        return $customer;
    }
    /**
     * Check if the Stripe customer exists.
     *
     * @return boolean
     */
    public function isStripeCustomer()
    {
        return auth()->check() && User::where('id', auth()->user()->id)->whereNotNull('stripe_id')->first();
    }


    /**
     * Store a order.
     *
     * @param Investment $investment
     * @return redirect()
     */
    public function postStorePayment(Order $order)
    {

        $order->status = 1;
        $order->save();

        $invoices = auth()->user()->invoices();

        return view('invoices', ['invoices' => $invoices])
            ->with('msg', 'Thanks for the purchase');
    }

}
