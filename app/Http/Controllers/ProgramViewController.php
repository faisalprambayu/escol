<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class ProgramViewController extends Controller
{
    public function index()
    {
        $request = Request::create('api/program', 'GET');
        $response = Route::dispatch($request);
        $data = json_decode($response->content(), true)['data'];
        // dd($data);
        return view('ad_program', compact('data'));
    }
}
