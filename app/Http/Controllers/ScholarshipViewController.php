<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class ScholarshipViewController extends Controller
{
    public function index()
    {
        $request = Request::create('api/scholarship', 'GET');
        $response = Route::dispatch($request);
        $data = json_decode($response->content(), true)['data'];
        // dd($data);
        return view('ad_scholarship', compact('data'));
    }
}
