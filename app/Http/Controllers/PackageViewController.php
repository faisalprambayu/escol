<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class PackageViewController extends Controller
{
    public function index()
    {
        $request = Request::create('api/package', 'GET');
        $response = Route::dispatch($request);
        $data = json_decode($response->content(), true)['data'];
        // $data = Package::all();
        return view('ad_package', compact('data'));
    }
}
