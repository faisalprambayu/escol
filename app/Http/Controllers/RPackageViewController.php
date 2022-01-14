<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class RPackageViewController extends Controller
{
    public function index()
    {
        $request = Request::create('api/r_package', 'GET');
        $response = Route::dispatch($request);
        $data = json_decode($response->content(), true)['data'];
        return view('ad_ref_package', compact('data'));
    }
}
