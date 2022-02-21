<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class LandingCareerViewController extends Controller
{
    public function index()
    {
        $career = Request::create('api/career', 'GET');
        $response_career = Route::dispatch($career);

        $data = [
            'career' => json_decode($response_career->content(), true)['data'],
        ];
        // dd($data);
        return view('lan_karir', compact('data'));
    }
}
