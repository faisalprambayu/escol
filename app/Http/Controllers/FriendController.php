<?php

namespace App\Http\Controllers;

use App\Http\Resources\FriendCollection;
use App\Http\Resources\FriendResource;
use App\Models\Friend;
use App\Models\File;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class FriendController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\FriendCollection
     */
    public function index(Request $request)
    {
        $friends = Friend::orderBy('updated_at', 'DESC')->get();
        // dd($friends);
        return new FriendCollection($friends);
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
            'Text' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $friends = $request->all();
            // dd($event);

            if ($file = $request->file('Image')) {
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move('resource/friend', $name);
                // $path = $file->store('public/files');
                // $name = $file->getClientOriginalName();

                //store your file into directory and db
                $save = new Friend([
                    'Name' => $request->get('Name'),
                    'Date' => $request->get('Date'),
                    'Description' => $request->get('Description'),
                    'Image' => $name,
                    'Text' => $request->get('Text'),
                ]);
                $save->save();
            }

            // $response = [
            //     'message' => 'Event Created',
            //     'data' => $event
            // ];

            // return response()->json($response, Response::HTTP_CREATED);
            return redirect('friend');
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
    public function show(Request $request, Friend $friend)
    {
        return new FriendResource($friend);
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
            'Text' => ['required'],
            // 'Image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $friend = $request->all();
            // dd($package);

            if ($file = $request->file('Image')) {
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move('resource/program', $name);

                //store your file into directory and db
                Friend::where('id', $request->get('id'))->update([
                    'Name' => $request->get('Name'),
                    'Date' => $request->get('Date'),
                    'Description' => $request->get('Description'),
                    'Image' => $name,
                    'Text' => $request->get('Text'),
                ]);
            } else {
                // dd("masuk");
                Friend::where('id', $request->get('id'))->update([
                    'Name' => $request->get('Name'),
                    'Date' => $request->get('Date'),
                    'Description' => $request->get('Description'),
                    'Text' => $request->get('Text'),
                ]);
            }
            // $save->save();
            return redirect('friend');
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
    public function destroy(Request $request, Friend $friend)
    {
        $friend->delete();
        return redirect('friend');
        // return response()->noContent();
    }
}
