<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Reading;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        $device_count = Device::count();

        $co_avg = Reading::avg('co');
        $co2_avg = Reading::avg('co2');
        $tem_avg = Reading::avg('tem');
        $hm_avg = Reading::avg('humidity');
        return view('home', [
            'co_avg' => $co_avg,
            'co2_avg' => $co2_avg,
            'tem_avg' => $tem_avg,
            'hm_avg' => $hm_avg
        ]);
    }

    public function getGraphical()
    {
        return view('reports.getgraphical');
    }

    public function graphical(Request $request)
    {
        $lat = (int) $request->input('lat');
        $lng = (int) $request->input('lng');

        $readings = Reading::whereBetween('lat', [$lat-0.0001, $lat+1])
            ->whereBetween('lng', [$lng-0.0001, $lng+1])
            ->get();

        return view('reports.graphical', ['readings' => $readings]);

    }

    public function getTextual()
    {
        return view('reports.gettexual');
    }

    public function textual(Request $request)
    {

        $lat = (int) $request->input('lat');
        $lng = (int) $request->input('lng');

        $readings = Reading::whereBetween('lat', [$lat-0.0001, $lat+1])
            ->whereBetween('lng', [$lng-0.0001, $lng+1])
            ->get();

        return view('reports.textual', ['readings' => $readings]);

    }



}
