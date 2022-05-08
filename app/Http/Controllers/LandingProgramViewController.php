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

    public function detail($id)
    {
        $program_list = Request::create('api/program', 'GET');
        $response_program = Route::dispatch($program_list);

        $program = Request::create('api/program/'.$id, 'GET');
        $response_programdetail = Route::dispatch($program);

        $data = [
            'program' => json_decode($response_programdetail->content(), true)['data'],
            'list' => json_decode($response_program->content(), true)['data'],
        ];
        // dd($data);
        return view('lan_program_detail', compact('data'));
    }
}
