<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Validator;
use DB;

class OrderController extends Controller
{
    public function post()
    {
        return view('customer');

    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'name' => 'required',
            'address' => 'required',
            'number' => 'required',



        ]);

        $order = new Order;
        $order->user_id = auth()->user()->id;
        $order->name = $request->name;
        $order->address = $request->address;
        $order->number = $request->number;

        $order->save();
        return redirect()->to('/stripe');


    }

    public function view(Order $order) {
//      $users = Order::get();
//      return view('admin.allorder', compact('$users'));
//        $users = DB::table('orders');
//
//        return view('admin.allorder ',['users'=>$users]);
    }

}
