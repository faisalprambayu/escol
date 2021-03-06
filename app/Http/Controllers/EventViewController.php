<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class EventViewController extends Controller
{
    public function index()
    {
        // dd(auth()->check());
        $request = Request::create('api/event', 'GET');
        $response = Route::dispatch($request);
        $data = json_decode($response->content(), true)['data'];
        // dd($data);
        return view('ad_event', compact('data'));
    }
}
