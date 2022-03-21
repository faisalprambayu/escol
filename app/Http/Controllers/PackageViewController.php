<?php

namespace App\Http\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Carbon;

use Illuminate\Http\Request;
use App\Models\Package;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

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
