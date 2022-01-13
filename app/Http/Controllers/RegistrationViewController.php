<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class RegistrationViewController extends Controller
{
    public function index()
    {
        $request = Request::create('api/registration', 'GET');
        $response = Route::dispatch($request);
        $data = json_decode($response->content(), true)['data'];
        return view('ad_registration', compact('data'));
    }
}
