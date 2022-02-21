<?php

namespace App\Http\Controllers;

use App\Http\Resources\CareerCollection;
use App\Http\Resources\CareerResource;
use App\Models\Career;
use App\Models\File;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class CareerController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\CareerCollection
     */
    public function index(Request $request)
    {
        $careers = Career::orderBy('updated_at', 'DESC')->get();
        // dd($careers);
        return new CareerCollection($careers);
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
            $careers = $request->all();
            // dd($event);

            if ($file = $request->file('Image')) {
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move('resource/career', $name);
                // $path = $file->store('public/files');
                // $name = $file->getClientOriginalName();

                //store your file into directory and db
                $save = new Career([
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
            return redirect('career');
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
    public function show(Request $request, Career $career)
    {
        return new CareerResource($career);
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
            $career = $request->all();
            // dd($package);

            if ($file = $request->file('Image')) {
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move('resource/program', $name);

                //store your file into directory and db
                Career::where('id', $request->get('id'))->update([
                    'Name' => $request->get('Name'),
                    'Date' => $request->get('Date'),
                    'Description' => $request->get('Description'),
                    'Image' => $name,
                ]);
            } else {
                // dd("masuk");
                Career::where('id', $request->get('id'))->update([
                    'Name' => $request->get('Name'),
                    'Date' => $request->get('Date'),
                    'Description' => $request->get('Description'),
                ]);
            }
            // $save->save();
            return redirect('career');
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
    public function destroy(Request $request, Career $career)
    {
        $career->delete();
        return redirect('career');
        // return response()->noContent();
    }
}
