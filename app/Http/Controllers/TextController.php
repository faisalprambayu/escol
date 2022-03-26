<?php

namespace App\Http\Controllers;

use App\Http\Resources\TextCollection;
use App\Http\Resources\TextResource;
use App\Models\Text;
use App\Models\File;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class TextController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\TextCollection
     */
    public function index(Request $request)
    {
        if ($request->path() == "text" || $request->path() == "syarat") {
            $texts = Text::where('filter','text')->orderBy('updated_at', 'DESC')->get();
        }else if($request->path() == "privacy" || $request->path() == "privasi"){
            $texts = Text::where('filter','privacy')->orderBy('updated_at', 'DESC')->get();
        }
        // dd($texts);
        return new TextCollection($texts);
    }

    /**
     * @param \App\Http\Requests\EventStoreRequest $request
     * @return \App\Http\Resources\EventResource
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'Text' => ['required'],
            // 'Filter' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $text = $request->all();

            $save = new Text([
                'Text' => $request->get('Text'),
                'Filter' => $request->get('Filter'),
            ]);
            $save->save();

            // $response = [
            //     'message' => 'Event Created',
            //     'data' => $event
            // ];

            // return response()->json($response, Response::HTTP_CREATED);
            return redirect('text');
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
    public function show(Request $request, Text $text)
    {
        return new TextResource($text);
    }

    /**
     * @param \App\Http\Requests\EventUpdateRequest $request
     * @param \App\Models\Event $event
     * @return \App\Http\Resources\EventResource
     */
    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'Text' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $text = $request->all();

            Text::where('id', $request->get('id'))->update([
                'Text' => $request->get('Text'),
            ]);
            $referer = str_replace($request->server()["HTTP_ORIGIN"],"",$request->server()["HTTP_REFERER"]);

            if ($referer == "/text") {
                return redirect('text');
            }else if($referer == "/privacy"){
                return redirect('privacy');
            }
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
    public function destroy(Request $request, Text $text)
    {
        $text->delete();
        return redirect('text');
    }
}
