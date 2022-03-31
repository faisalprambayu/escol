<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class UserViewController extends Controller
{
    public function index()
    {
        $request = Request::create('api/user', 'GET');
        $response = Route::dispatch($request);
        $data = json_decode($response->content(), true)['data'];
        // dd($data);
        return view('ad_user', compact('data'));
    }
}
