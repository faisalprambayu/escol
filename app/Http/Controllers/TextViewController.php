<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class TextViewController extends Controller
{
    public function index()
    {
        $request = Request::create('api/text', 'GET');
        $response = Route::dispatch($request);
        $data = json_decode($response->content(), true)['data'];
        // dd($data);
        return view('ad_text', compact('data'));
    }

    public function landing()
    {
        $request = Request::create('api/text', 'GET');
        $response = Route::dispatch($request);
        $data = json_decode($response->content(), true)['data'];
        // dd($data);
        return view('lan_syarat', compact('data'));
    }

    public function privasi()
    {
        $request = Request::create('api/text', 'GET');
        $response = Route::dispatch($request);
        $data = json_decode($response->content(), true)['data'];
        // dd($data);
        return view('lan_privasi', compact('data'));
    }
}
