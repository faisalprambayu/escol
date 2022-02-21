<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProgramCollection;
use App\Http\Resources\ProgramResource;
use App\Models\Program;
use App\Models\File;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ProgramController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\ProgramCollection
     */
    public function index(Request $request)
    {
        $programs = Program::orderBy('updated_at', 'DESC')->get();
        // dd($programs);
        return new ProgramCollection($programs);
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
            'Description' => ['required'],
            'Image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $programs = $request->all();
            // dd($event);

            if ($file = $request->file('Image')) {
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move('resource/program', $name);
                // $path = $file->store('public/files');
                // $name = $file->getClientOriginalName();

                //store your file into directory and db
                $save = new Program([
                    'Name' => $request->get('Name'),
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
            return redirect('programs');
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
    public function show(Request $request, Program $program)
    {
        return new ProgramResource($program);
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
            'Description' => ['required'],
            // 'Image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $program = $request->all();
            // dd($package);

            if ($file = $request->file('Image')) {
                $name = time() . '-' . $file->getClientOriginalName();
                $file->move('resource/program', $name);

                //store your file into directory and db
                Program::where('id', $request->get('id'))->update([
                    'Name' => $request->get('Name'),
                    'Description' => $request->get('Description'),
                    'Image' => $name,
                ]);
            } else {
                // dd("masuk");
                Program::where('id', $request->get('id'))->update([
                    'Name' => $request->get('Name'),
                    'Description' => $request->get('Description'),
                ]);
            }
            // $save->save();
            return redirect('programs');
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
    public function destroy(Request $request, Program $program)
    {
        $program->delete();
        return redirect('programs');
        // return response()->noContent();
    }
}
