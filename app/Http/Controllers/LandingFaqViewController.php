<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class LandingFaqViewController extends Controller
{
    public function index()
    {
        $faq = Request::create('api/faq', 'GET');
        $response_faq = Route::dispatch($faq);

        $data = [
            'faq' => json_decode($response_faq->content(), true)['data'],
        ];
        // dd($data);
        return view('lan_faq', compact('data'));
    }
}
