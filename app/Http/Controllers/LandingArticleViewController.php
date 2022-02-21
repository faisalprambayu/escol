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
}
