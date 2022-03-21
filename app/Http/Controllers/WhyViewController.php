<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class WhyViewController extends Controller
{
    public function index()
    {
        $request = Request::create('api/why', 'GET');
        $response_why = Route::dispatch($request);

        $class = Request::create('api/r_icon', 'GET');
        $response_icon = Route::dispatch($class);


        $data = [
            'why' => json_decode($response_why->content(), true)['data'],
            'icon' => json_decode($response_icon->content(), true)['data'],
        ];
        // dd($data);
        return view('ad_why', compact('data'));
    }
}
