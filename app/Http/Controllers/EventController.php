<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventStoreRequest;
use App\Http\Requests\EventUpdateRequest;
use App\Http\Resources\EventCollection;
use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Models\File;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class EventController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\EventCollection
     */
    public function index(Request $request)
    {
        // dd(auth());
        $events = Event::orderBy('updated_at', 'DESC')->get();

        return new EventCollection($events);
    }

    /**
     * @param \App\Http\Requests\EventStoreRequest $request
     * @return \App\Http\Resources\EventResource
     */
    public function store(Request $request)
    {
        // dd(time());
        // if ($request->get('_token') == null) {
        //     abort(403);
        // }
        $validator = Validator::make($request->all(), [
            'Name' => ['required'],
            'Image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'Description' => ['required'],
            'EventDate' => ['required'],
            'Link' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $event = $request->all();
            // dd($event);

            if ($file = $request->file('Image')) {
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move('resource/event', $name);
                // $path = $file->store('public/files');
                // $name = $file->getClientOriginalName();

                //store your file into directory and db
                $save = new Event([
                    'Name' => $request->get('Name'),
                    'Image' => $name,
                    'Description' => $request->get('Description'),
                    'EventDate' => $request->get('EventDate'),
                    'Link' => $request->get('Link'),
                ]);
                $save->save();
            }

            // $response = [
            //     'message' => 'Event Created',
            //     'data' => $event
            // ];

            // return response()->json($response, Response::HTTP_CREATED);
            return redirect('event');
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
    public function show(Request $request, Event $event)
    {
        return new EventResource($event);
    }

    /**
     * @param \App\Http\Requests\EventUpdateRequest $request
     * @param \App\Models\Event $event
     * @return \App\Http\Resources\EventResource
     */
    public function update(Request $request)
    {
        // dd($request->session());
        // if ($request->get('_token') == null) {
        //     abort(403);
        // }
        $validator = Validator::make($request->all(), [
            'Name' => ['required'],
            // 'Image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $package = $request->all();
            // dd($package);

            if ($file = $request->file('Image')) {
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move('resource/event', $name);

                //store your file into directory and db
                Event::where('id', $request->get('id'))->update([
                    'Name' => $request->get('Name'),
                    'Image' => $name,
                    'Description' => $request->get('Description'),
                    'EventDate' => $request->get('EventDate'),
                    'Link' => $request->get('Link'),
                ]);
            } else {
                Event::where('id', $request->get('id'))->update([
                    'Name' => $request->get('Name'),
                    'Description' => $request->get('Description'),
                    'EventDate' => $request->get('EventDate'),
                    'Link' => $request->get('Link'),
                ]);
            }
            // $save->save();
            return redirect('event');
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
    public function destroy(Request $request, Event $event)
    {
        $event->delete();
        return redirect('event');
        // return response()->noContent();
    }
}
