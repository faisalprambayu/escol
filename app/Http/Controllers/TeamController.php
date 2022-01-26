<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamStoreRequest;
use App\Http\Requests\TeamUpdateRequest;
use App\Http\Resources\TeamCollection;
use App\Http\Resources\TeamResource;
use App\Models\Team;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TeamController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\TeamCollection
     */
    public function index(Request $request)
    {
        $teams = Team::orderBy('updated_at', 'DESC')->get();

        return new TeamCollection($teams);
    }

    /**
     * @param \App\Http\Requests\TeamStoreRequest $request
     * @return \App\Http\Resources\TeamResource
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Name' => ['required'],
            'Title' => ['required'],
            'Description' => ['required'],
            'Image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $service = $request->all();
            // dd($service);

            if ($file = $request->file('Image')) {
                $name =  time() . '-' . $file->getClientOriginalName();
                $file->move('resource/team', $name);
                // $path = $file->store('public/files');
                // $name = $file->getClientOriginalName();

                //store your file into directory and db
                $save = new Team([
                    'Name' => $request->get('Name'),
                    'Title' => $request->get('Title'),
                    'Description' => $request->get('Description'),
                    'Image' => $name
                ]);
                $save->save();
            }
            return redirect('team');
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed' . $e->errorInfo
            ]);
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Team $team
     * @return \App\Http\Resources\TeamResource
     */
    public function show(Request $request, Team $team)
    {
        return new TeamResource($team);
    }

    /**
     * @param \App\Http\Requests\TeamUpdateRequest $request
     * @param \App\Models\Team $team
     * @return \App\Http\Resources\TeamResource
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Name' => ['required'],
            'Title' => ['required'],
            'Description' => ['required'],
            // 'Image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $service = $request->all();
            // dd($service);

            if ($file = $request->file('Image')) {
                $name =  time() . '-' . $file->getClientOriginalName();
                $file->move('resource/team', $name);

                //store your file into directory and db
                Team::where('id', $request->get('id'))->update([
                    'Name' => $request->get('Name'),
                    'Title' => $request->get('Title'),
                    'Description' => $request->get('Description'),
                    'Image' => $name
                ]);
            } else {
                Team::where('id', $request->get('id'))->update([
                    'Name' => $request->get('Name'),
                    'Title' => $request->get('Title'),
                    'Description' => $request->get('Description'),
                ]);
            }
            return redirect('team');
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed' . $e->errorInfo
            ]);
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Team $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Team $team)
    {
        $team->delete();
        return redirect('team');
        // return response()->noContent();
    }
}
