<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class TeamViewController extends Controller
{
    public function index()
    {
        $request = Request::create('api/team', 'GET');
        $response = Route::dispatch($request);
        $data = json_decode($response->content(), true)['data'];
        // dd($data);
        return view('ad_team', compact('data'));
    }
}
