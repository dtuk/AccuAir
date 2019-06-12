<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Reading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ReadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $arr_ip = geoip()->getLocation('123.231.124.214');
        dd($arr_ip);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function test(Request $request)
    {
        $a = $request->a;
        $b = $request->b;
    }

    public function store(Request $request)
    {

//        return $request->field1;
        $device = Device::findOrFail($request->di); // di = device_id

        if (Hash::check($request->ac, $device->auth_code)){ //ac = auth_code
            $reading = new Reading;
            $reading->device_id = $request->di;
            $reading->location = $request->loc;
            $reading->co = $request->co;
            $reading->co2 = $request->co2;
            $reading->tem = $request->tem;
            $reading->humidity = $request->hm; // hm = humidity

            $reading->save();
            if ($reading->id){
                return response(['status' => 1]);
            }
            else{
                return response(['status' => 0]);
            }

        }

        else{
            return response(["status" => 0], 401);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reading  $reading
     * @return \Illuminate\Http\Response
     */
    public function show(Reading $reading)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reading  $reading
     * @return \Illuminate\Http\Response
     */
    public function edit(Reading $reading)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reading  $reading
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reading $reading)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reading  $reading
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reading $reading)
    {
        //
    }

    public function report(Request $request)
    {
        $readings = Reading::where('device_id', "=", $request->device_id)
            ->where('location', $request->location)
            ->get();
        return view('sensor', ['readings' => $readings]);
    }
}
