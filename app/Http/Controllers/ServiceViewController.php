<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class ServiceViewController extends Controller
{
    public function index()
    {
        $request = Request::create('api/service', 'GET');
        $response_service = Route::dispatch($request);
        // $data = json_decode($response->content(), true)['data'];
        // dd($data);

        $class = Request::create('api/r_icon', 'GET');
        $response_icon = Route::dispatch($class);

        // $data = [
        //     'registration' => json_decode($responseRegistration->content(), true)['data'],
        // ];
        $data = [
            'service' => json_decode($response_service->content(), true)['data'],
            'icon' => json_decode($response_icon->content(), true)['data'],
        ];
        // dd($data);

        return view('ad_service', compact('data'));
    }
}
