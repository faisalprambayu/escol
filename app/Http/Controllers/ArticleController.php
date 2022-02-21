<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleCollection;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Models\File;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\ArticleCollection
     */
    public function index(Request $request)
    {
        $articles = Article::orderBy('updated_at', 'DESC')->get();
        // dd($articles);
        return new ArticleCollection($articles);
    }

    /**
     * @param \App\Http\Requests\EventStoreRequest $request
     * @return \App\Http\Resources\EventResource
     */
    public function store(Request $request)
    {
        // dd(time());
        $validator = Validator::make($request->all(), [
            'Name' => ['required'],
            'Date' => ['required'],
            'Description' => ['required'],
            'Image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $atricles = $request->all();
            // dd($event);

            if ($file = $request->file('Image')) {
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move('resource/article', $name);
                // $path = $file->store('public/files');
                // $name = $file->getClientOriginalName();

                //store your file into directory and db
                $save = new Article([
                    'Name' => $request->get('Name'),
                    'Date' => $request->get('Date'),
                    'Description' => $request->get('Description'),
                    'Image' => $name,
                ]);
                $save->save();
            }

            // $response = [
            //     'message' => 'Event Created',
            //     'data' => $event
            // ];

            // return response()->json($response, Response::HTTP_CREATED);
            return redirect('article');
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed' . $e->errorInfo
            ]);
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Event $event
     * @return \App\Http\Resources\EventResource
     */
    public function show(Request $request, Article $article)
    {
        return new ArticleResource($article);
    }

    /**
     * @param \App\Http\Requests\EventUpdateRequest $request
     * @param \App\Models\Event $event
     * @return \App\Http\Resources\EventResource
     */
    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'Name' => ['required'],
            'Date' => ['required'],
            'Description' => ['required'],
            // 'Image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $article = $request->all();
            // dd($package);

            if ($file = $request->file('Image')) {
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move('resource/article', $name);

                //store your file into directory and db
                Article::where('id', $request->get('id'))->update([
                    'Name' => $request->get('Name'),
                    'Date' => $request->get('Date'),
                    'Description' => $request->get('Description'),
                    'Image' => $name,
                ]);
            } else {
                // dd("masuk");
                Article::where('id', $request->get('id'))->update([
                    'Name' => $request->get('Name'),
                    'Date' => $request->get('Date'),
                    'Description' => $request->get('Description'),
                ]);
            }
            // $save->save();
            return redirect('article');
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed' . $e->errorInfo
            ]);
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Article $article)
    {
        $article->delete();
        return redirect('article');
        // return response()->noContent();
    }
}
