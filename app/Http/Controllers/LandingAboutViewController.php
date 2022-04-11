<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class LandingAboutViewController extends Controller
{
    public function index()
    {
        // dd($data);
        return view('lan_tentang');
    }

}
