<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Package;

class PackageViewController extends Controller
{
    //di sini isi controller pegawai
    public function index()
    {
        // return view('ad_package');
        // dd($request);
        $request = Request::create('api/package', 'GET');
        $response = Route::dispatch($request);
        $data = json_decode($response->content(), true)['data'];
        // $data = Package::all();
        return view('ad_package', compact('data'));
    }
}
