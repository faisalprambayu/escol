<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class LandingFriendViewController extends Controller
{
    public function index()
    {
        $friend = Request::create('api/friend', 'GET');
        $response_friend = Route::dispatch($friend);

        $data = [
            'friend' => json_decode($response_friend->content(), true)['data'],
        ];
        // dd($data);
        return view('lan_sahabat', compact('data'));
    }
}
