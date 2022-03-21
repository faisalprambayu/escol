<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class RIconViewController extends Controller
{
    public function index()
    {
        $request = Request::create('api/r_icon', 'GET');
        $response = Route::dispatch($request);
        // dd($response);
        $data = json_decode($response->content(), true)['data'];
        // dd($data);
        return view('ad_ref_icon', compact('data'));
    }
}
