<?php

namespace App\Http\Controllers;

use App\Models\Reading;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MobileAppController extends Controller
{

    public function login(Request $request)
    {

        $data = json_decode(file_get_contents('php://input'), true);
//        print_r($data);
//        echo $data["operacion"];

        $user = User::where('email', $data['email'])
            ->first();
        if ($user && Hash::check($data['password'], $user->password)){
            auth()->loginUsingId($user->id, true);
            return response(['status' => 1, 'user' => $user], 200);
        }
        else{
            return response(['status' => 0], 401);
        }
    }

    public function getdata(Request $request)
    {
        $data = json_decode(file_get_contents('php://input'), true);

        $lat = $data['lat'];
        $lng = $data['lng'];

        $from = date($data['from']);
        if (array_key_exists('to', $data)){
            $to = date($data['to']);
        }
        else{
            $to = date('Y-m-d H:i:s');
        }


        DB::enableQueryLog(); // Enable query log

        $readings = Reading::whereBetween('lat', [$lat - 100, $lat + 100])
            ->whereBetween('lng', [$lng - 100, $lng + 100])
            ->whereRaw("`created_at` >= STR_TO_DATE('$from', '%Y-%m-%d %H:%i:%s')")
            ->whereRaw("`created_at` <= STR_TO_DATE('$to', '%Y-%m-%d %H:%i:%s')")
//            ->whereRaw("Date(`created_at`) BETWEEN '$from' and '$to ")
//            ->whereRaw('Date(created_at) <= CURDATE()')
//            ->whereRaw('Date(created_at) >= '."'$to'")
//            ->whereDate('created_at', '>=', "'$from'")
//            ->whereDate('created_at', '>=', $to)
//            ->whereBetween('created_at', ["'$from'", "'$to'"])
            ->latest()
            ->get();

        dd(str_replace_array('?', \DB::getQueryLog()[0]['bindings'],
            \DB::getQueryLog()[0]['query']));


        if (count($readings) > 0){
            return response(['status' => 1, 'readings' => $readings], 200);
        }
        else{
            return response(['status' => 0]);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
