<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class LandingArticleViewController extends Controller
{
    public function index()
    {
        $article = Request::create('api/article', 'GET');
        $response_article = Route::dispatch($article);

        $data = [
            'article' => json_decode($response_article->content(), true)['data'],
        ];
        // dd($data);
        return view('lan_artikel', compact('data'));
    }

    public function detail($id)
    {
        $articleList = Request::create('api/article', 'GET');
        $response_article = Route::dispatch($articleList);

        $article = Request::create('api/article/'.$id, 'GET');
        $response_articledetail = Route::dispatch($article);

        $data = [
            'article' => json_decode($response_articledetail->content(), true)['data'],
            'list' => json_decode($response_article->content(), true)['data'],
        ];
        // dd($data);
        return view('lan_artikel_detail', compact('data'));
    }
}
