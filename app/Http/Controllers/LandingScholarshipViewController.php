<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class LandingScholarshipViewController extends Controller
{
    public function index()
    {
        $scholarship = Request::create('api/scholarship', 'GET');
        $response_scholarship = Route::dispatch($scholarship);

        $data = [
            'scholarship' => json_decode($response_scholarship->content(), true)['data'],
        ];
        // dd($data);
        return view('lan_beasiswa', compact('data'));
    }

    public function detail($id)
    {
        $scholarshipList = Request::create('api/scholarship', 'GET');
        $response_scholarship = Route::dispatch($scholarshipList);

        $scholarship = Request::create('api/scholarship/'.$id, 'GET');
        $response_scholarshipdetail = Route::dispatch($scholarship);

        $data = [
            'scholarship' => json_decode($response_scholarshipdetail->content(), true)['data'],
            'list' => json_decode($response_scholarship->content(), true)['data'],
        ];
        // dd($data);
        return view('lan_beasiswa_detail', compact('data'));
    }
}
