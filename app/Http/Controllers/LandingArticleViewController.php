<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class LandingArticleViewController extends Controller
{
    public function index()
    {
        $response_article = Article::orderBy('updated_at', 'DESC')->get();

        $data = [
            'article' => $response_article,
        ];
        // dd($data);
        return view('lan_artikel', compact('data'));
    }

    public function detail($id)
    {
        $response_article = Article::orderBy('updated_at', 'DESC')->get();

        $response_articledetail = Article::findOrFail($id);

        $data = [
            'article' => $response_articledetail,
            'list' => $response_article,
        ];
        // dd($data);
        return view('lan_artikel_detail', compact('data'));
    }
}
