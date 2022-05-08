<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class ModalViewController extends Controller
{
    public function index()
    {
        $request = Request::create('api/modal', 'GET');
        $response_modal = Route::dispatch($request);


        $data = json_decode($response_modal->content(), true)['data'];
        // dd($data);
        return view('ad_modal', compact('data'));
    }
}
