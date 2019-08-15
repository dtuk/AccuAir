<?php

namespace App\Http\Controllers;

use App\Key;
use App\Models\Reading;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keys = Key::where('user_id', auth()->user()->id)
            ->latest()
            ->get();
        return view('api.index', ['keys' => $keys]);
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
        if (auth()->check()){

            $rand_str = Str::random(40);

            $key = new Key;
            $key->user_id = auth()->user()->id;
            $key->key = $rand_str;
            $key->save();

            $key->key = $rand_str.$key->id;
            $key->save();

            return redirect()->route('key.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Key  $key
     * @return \Illuminate\Http\Response
     */
    public function show(Key $key)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Key  $key
     * @return \Illuminate\Http\Response
     */
    public function edit(Key $key)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Key  $key
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Key $key)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Key  $key
     * @return \Illuminate\Http\Response
     */
    public function destroy(Key $key)
    {
        if (auth()->check() && $key->user_id == auth()->user()->id){
            $key->forceDelete();
            return redirect()->route('key.index');
        }
    }

    public function data(Request $request)
    {
        $data = json_decode(file_get_contents('php://input'), true);

        $api_key = $data['key'];

        $key = Key::where('key', $api_key)->first();
        if ($key && $key->used < $key->limit){
            $key->used += 1;
            $key->save();

            $lat = $data['lat'];
            $lng = $data['lng'];

            $from = date($data['from']);
            if (array_key_exists('to', $data)){
                $to = date($data['to']);
            }
            else{
                $to = date('Y-m-d H:i:s');
            }


//        DB::enableQueryLog(); // Enable query log

            $readings = Reading::whereBetween('lat', [$lat - 2, $lat + 2])
                ->whereBetween('lng', [$lng - 2, $lng + 2])
                ->whereRaw("`created_at` >= STR_TO_DATE('$from', '%Y-%m-%d %H:%i:%s')")
                ->whereRaw("`created_at` <= STR_TO_DATE('$to', '%Y-%m-%d %H:%i:%s')")
                ->latest()
                ->paginate(5);

            /*dd(str_replace_array('?', \DB::getQueryLog()[0]['bindings'],
                \DB::getQueryLog()[0]['query']));*/


            if (count($readings) > 0){
                return response(['status' => 1, 'readings' => $readings], 200);
            }
            else{
                return response(['status' => 0]);
            }

        }

        return response(['status' => 0]);


    }
}
