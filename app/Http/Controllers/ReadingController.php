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
        //
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
    public function store(Request $request)
    {

        $device = Device::findOrFail($request->device_id);

        if (Hash::check($request->auth_code, $device->auth_code)){
            $reading = new Reading;
            $reading->device_id = $request->device_id;
            $reading->location = $request->location;
            $reading->co = $request->co;
            $reading->co2 = $request->co2;
            $reading->tem = $request->tem;
            $reading->humidity = $request->humidity;

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
        //
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
}
