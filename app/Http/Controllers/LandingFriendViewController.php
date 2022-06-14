<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class LandingFriendViewController extends Controller
{
    public function index(Request $request)
    {
        $response_friend = Friend::orderBy('updated_at', 'DESC')->get();

        $response_banner = app('App\Http\Controllers\BannerController')->index($request);

        $data = [
            'friend' => $response_friend,
            'banner' => $response_banner,
        ];
        // dd($data);
        return view('lan_sahabat', compact('data'));
    }

    public function detail($id)
    {
        $friendList = Request::create('api/friend', 'GET');
        $response_friend = Route::dispatch($friendList);

        $friend = Request::create('api/friend/'.$id, 'GET');
        $response_frienddetail = Route::dispatch($friend);

        $data = [
            'friend' => json_decode($response_frienddetail->content(), true)['data'],
            'list' => json_decode($response_friend->content(), true)['data'],
        ];
        // dd($data);
        return view('lan_sahabat_detail', compact('data'));
    }
}
