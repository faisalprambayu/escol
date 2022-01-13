<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class RClassViewController extends Controller
{
    public function index()
    {
        $request = Request::create('api/r_class', 'GET');
        $response = Route::dispatch($request);
        $data = json_decode($response->content(), true)['data'];
        return view('ad_ref_class', compact('data'));
    }
}
