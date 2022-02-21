<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class LandingProgramViewController extends Controller
{
    public function index()
    {
        $program = Request::create('api/program', 'GET');
        $response_program = Route::dispatch($program);

        $data = [
            'program' => json_decode($response_program->content(), true)['data'],
        ];
        // dd($data);
        return view('lan_program', compact('data'));
    }
}
